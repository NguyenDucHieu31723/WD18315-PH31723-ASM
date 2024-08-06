@extends('admin.layouts.master-layout')
@section('title')
    @parent
    Add Users
@endsection
@section('content')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h2 class="m-0">Thêm mới người dùng</h2>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <form action="{{ route('admin.users.storeUsers') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter name" name="full_name" value="{{ old('full_name') }}">
                    <div class="mt-2">
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="email" value="{{ old('email') }}" placeholder="Enter email">
                    <div class="mt-2">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="password" placeholder="Enter password">
                    <div class="mt-2">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Confirm Password</label>
                    <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="confirm-password" placeholder="Enter Confirm Password">
                    <div class="mt-2">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Image</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="image">
                    <div class="mt-2">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Phone</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="phone" value="{{ old('phone') }}" placeholder="Enter phone">
                    <div class="mt-2">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="address" value="{{ old('address') }}" placeholder="Enter address">
                    <div class="mt-2">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Role</label>
                    <select class="form-select" aria-label="Default select example" name="role">
                        <option value="0" {{ old('role') == 0 ? 'selected' : '' }}>User</option>
                        <option value="1" {{ old('role') == 1 ? 'selected' : '' }}>Admin</option>
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
