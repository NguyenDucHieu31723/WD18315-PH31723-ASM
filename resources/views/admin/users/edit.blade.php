@extends('admin.layouts.master-layout')
@section('title')
    @parent
    Edit Users
@endsection
@section('content')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h2 class="m-0">Cập nhật người dùng</h2>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <form action="{{ route('admin.users.updateUsers', $user->user_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter name" name="full_name" value="{{ $user->full_name }}">
                    <div class="mt-2">
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" value="{{ $user->email }}" placeholder="Enter email">
                    <div class="mt-2">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="image">
                    <img src="{{ asset($user->image) }}" alt="" class="mt-3" srcset="" width="100px"
                        height="100px">
                    <div class="mt-2">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="phone" placeholder="Enter phone" value="{{ $user->phone }}">
                    <div class="mt-2">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="address" value="{{ $user->address }}" placeholder="Enter address">
                    <div class="mt-2">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option value="{{$user->role = "0"}}"  @if ($user->role === "0") selected @endif>User</option>
                        <option value="{{$user->role = "1"}}" @if ($user->role === "1") selected @endif>Admin</option>
                    </select>
                    <div class="mt-2">
                        @error('role')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <a href="{{ route('admin.users.listUsers') }}" class="btn btn-success"><i
                        class="fas fa-arrow-left me-2"></i>
                    Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
