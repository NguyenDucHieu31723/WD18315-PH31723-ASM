@extends('admin.layouts.master-layout')
@section('title')
    @parent
    Add Products
@endsection
@section('content')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h2 class="m-0">Thêm mới sản phẩm</h2>
                </div>
            </div>
        </div>
        <div class="white_card_body">
            <form action="{{ route('admin.products.storeProducts') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter name" name="name" value="{{ old('name') }}">
                    <div class="mt-2">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="mb-3">
                    <label class="form-label" for="exampleInputPassword1">Category</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category">
                        @foreach ($category as $item)
                            <option value="{{ $item->category_id }}"> {{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div class="mt-2">
                        @error('category')
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
                    <label class="form-label" for="exampleInputEmail1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ old('description') }}</textarea>
                    <div class="mt-2">
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="exampleInputEmail1">Price</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="price" value="{{ old('price') }}">
                    <div class="mt-2">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('admin.products.listProducts') }}" class="btn btn-success"><i
                        class="fas fa-arrow-left me-2"></i>
                    Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
