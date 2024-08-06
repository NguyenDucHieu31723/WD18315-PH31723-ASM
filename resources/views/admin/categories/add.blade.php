@extends('admin.layouts.master-layout')
@section('title')
    @parent
    Add Categories
@endsection
@section('content')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h2 class="m-0">Thêm mới danh mục</h2>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <form action="{{ route('admin.categories.storeCategories') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Name </label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Enter name..." value="{{ old('name') }}">
                    @error('name')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" id="exampleInputPassword1" name="image">
                    @error('image')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputPassword1">Description</label>
                    <textarea class="form-control" id="exampleInputPassword1" name="description" value="{{ old('description') }}"> </textarea>
                    @error('description')
                        <span class="text-danger"> {{ $message }}</span>
                    @enderror
                </div>
                <a href="{{route('admin.categories.listCategories')}}" class="btn btn-success"><i class="fas fa-arrow-left me-2"></i>
                    Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
