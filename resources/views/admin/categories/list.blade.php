@extends('admin.layouts.master-layout')
@section('title')
    @parent
    List Categories
@endsection
@push('styles')
    <style>
        .info_btn {
            display: inline-block;
            padding: 2px 15px;
            font-size: 11px;
            font-weight: 300;
            color: #fff !important;
            background: #239eba;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            text-transform: capitalize;
            white-space: nowrap;
            min-width: 70px;
            text-align: center
        }

        .danger_btn {
            display: inline-block;
            padding: 2px 15px;
            font-size: 11px;
            font-weight: 300;
            color: #fff !important;
            background: #da4242;
            -webkit-border-radius: 30px;
            -moz-border-radius: 30px;
            border-radius: 30px;
            border: none;
            text-transform: capitalize;
            white-space: nowrap;
            min-width: 70px;
            text-align: center
        }
    </style>
@endpush
@section('content')
    <div class="white_card card_height_100 mb_30">
        <div class="white_card_header">
            <div class="box_header m-0">
                <div class="main-title">
                    <h2 class="m-0">Danh sách danh mục</h2>
                </div>
            </div>
            @if (session('message'))
                <div class="alert alert-success mt-5 w-50" role="alert">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="white_card_body">
            <div class="QA_section">
                <div class="white_box_tittle list_header">
                    <h4>Category</h4>
                    <div class="box_right d-flex lms_block">
                        <a href="{{ route('admin.categories.addCategories') }}" class="btn btn-primary">+ Add</a>
                    </div>
                </div>
                
                <div class="QA_table mb_30">
                    <table class="table table-hover  text-center">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name </th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listCat as $cat)
                                <tr>
                                    <th scope="row"> <a
                                            href="{{ route('admin.categories.showCategories', $cat->category_id) }}"
                                            class="question_content">{{ $cat->category_id }}</a></th>
                                    <td>{{ $cat->name }}</td>
                                    <td><img src="{{ asset($cat->image) }}" alt="" width="100px" height="100px">
                                    </td>
                                    <td>{{ $cat->description }}</td>
                                    <td>{{ $cat->created_at }}</td>
                                    <td>{{ $cat->updated_at }}</td>
                                    <td style="gap:15px">

                                        <a href="{{ route('admin.categories.editCategories', $cat->category_id) }}"
                                            class="info_btn mb-2">Edit</a>
                                        <a href="{{ route('admin.categories.showCategories', $cat->category_id) }}"
                                            class="status_btn mb-2">Show</a>
                                        <form action="{{ route('admin.categories.destroyCategories', $cat->category_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="danger_btn" onclick="return confirm('Bạn có chắc xóa không?')"
                                                type="submit">Delete</button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                {{ $listCat->links() }}
            </div>
        </div>
    </div>
@endsection
