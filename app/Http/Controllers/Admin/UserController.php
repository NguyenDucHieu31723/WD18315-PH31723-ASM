<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function listUsers()
    {
        $users = User::orderBy('user_id', 'desc')->paginate(5);
        return view('admin.users.list', compact('users'));
    }
    public function addUsers()
    {
        return view('admin.users.add');
    }
    public function storeUsers(Request $request)
    {
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => $request->password,
            'address' => $request->address,
            'phone' => $request->phone,
            'role' => $request->role,
        ];
        $user = User::create($data);
        $linkImage = "";
        if ($request->hasFile('image')) { // Kiểm tra xem có file ảnh không
            $image = $request->file('image'); // Nếu có thì lấy file ảnh từ request
            $newNameImage = time() . '.' . $image->getClientOriginalExtension();
            $linkPublic = 'image-users/';
            $image->move(public_path($linkPublic), $newNameImage);

            $linkImage = $linkPublic . $newNameImage;
            $user->update(['image' => $linkImage]);
        }
        ;
        return redirect()->route('admin.users.listUsers')->with([
            'message' => "Thêm mới người dùng thành công"
        ]);

    }
    public function editUsers(Request $request)
    {
        $user = User::find($request->user_id);
        return view('admin.users.edit', compact('user'));
    }
    public function showUsers(Request $request)
    {
        $user = User::find($request->user_id);
        return view('admin.users.show', compact('user'));
    }
    public function updateUsers(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();
        $linkImage = $user->image;
        if ($request->hasFile('image')) {
            File::delete(public_path($user->image));
            $image = $request->file('image');
            $newNameImage = time() . "." . $image->getClientOriginalExtension();
            $linkPublic = 'image-users/';
            $image->move(public_path($linkPublic), $newNameImage);

            $linkImage = $linkPublic . $newNameImage;
        }
        $data = [
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'image' => $linkImage,
            'address' => $request->address,
            'role' => $request->role,
        ];
        User::where('user_id', $request->user_id)->update($data);
        return redirect()->route('admin.users.listUsers')->with([
            'message' => "Cập nhật người dùng thành công!"
        ]);
    }
    public function destroyUsers(Request $request)
    {
        $user = User::where('user_id', $request->user_id)->first();
        if ($user->image != null && $user->image != '') {
            File::delete(public_path($user->image));
        }
        User::where('user_id', $request->user_id)->delete();
        return redirect()->route('admin.users.listUsers')->with([
            'message' => 'Xóa người dùng thành công'
        ]);
    }
}
