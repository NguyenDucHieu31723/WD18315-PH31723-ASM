@extends('admin.layouts.master-layout')
@section('title')
    @parent
    Search
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
                    <h2 class="m-0">Danh sách tìm kiếm</h2>
                </div>
            </div>
            @if ($products->isEmpty() && $users->isEmpty())
            <div class=" text-center mb-5 mt-5">
                <h4 class="text-danger">Không tìm thấy sản phẩm!</h4>
            </div>
        @endif
        </div>

        @if ($products->isNotEmpty())
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="mb-4">Sản phẩm</h2>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name </th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <th scope="row"> <a
                                                href="{{ route('admin.products.showProducts', $item->product_id) }}"
                                                class="question_content">{{ $item->product_id }}</a></th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="" width="100px"
                                                height="100px">
                                        </td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td style="gap:15px">
                                            <a href="{{ route('admin.products.editProducts', $item->product_id) }}"
                                                class="info_btn mb-2">Edit</a>
                                            <a href="{{ route('admin.products.showProducts', $item->product_id) }}"
                                                class="status_btn mb-2">Show</a>
                                            <form action="{{ route('admin.products.destroyProducts', $item->product_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="danger_btn"
                                                    onclick="return confirm('Bạn có chắc xóa không?')"
                                                    type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
        {{-- @if ($categories->isNotEmpty())
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="mb-4">Danh mục</h2>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table table-hover">
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
                                @foreach ($categories as $cat)
                                    <tr>
                                        <th scope="row"> <a
                                                href="{{ route('admin.categories.showCategories', $cat->category_id) }}"
                                                class="question_content">{{ $cat->category_id }}</a></th>
                                        <td>{{ $cat->name }}</td>
                                        <td><img src="{{ asset($cat->image) }}" alt="" width="100px"
                                                height="100px">
                                        </td>
                                        <td>{{ $cat->description }}</td>
                                        <td>{{ $cat->created_at }}</td>
                                        <td>{{ $cat->updated_at }}</td>
                                        <td style="gap:15px">

                                            <a href="{{ route('admin.categories.editCategories', $cat->category_id) }}"
                                                class="info_btn mb-2">Edit</a>
                                            <a href="{{ route('admin.categories.showCategories', $cat->category_id) }}"
                                                class="status_btn mb-2">Show</a>
                                            <form
                                                action="{{ route('admin.categories.destroyCategories', $cat->category_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="danger_btn"
                                                    onclick="return confirm('Bạn có chắc xóa không?')"
                                                    type="submit">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif --}}
        @if ($users->isNotEmpty())
            <div class="white_card_body">
                <div class="QA_section">
                    <div class="box_header m-0">
                        <div class="main-title">
                            <h2 class="mb-4">Người dùng</h2>
                        </div>
                    </div>
                    <div class="QA_table mb_30">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <th scope="row"> <a href="{{ route('admin.users.showUsers', $item->user_id) }}"
                                                class="question_content">{{ $item->user_id }}</a></th>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><img src="{{ asset($item->image) }}" alt="" width="100px"
                                                height="100px">
                                        </td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>
                                            @if ($item->role === '1')
                                                <span class="badge bg-success">Admin</span>
                                            @else
                                                <span class="badge bg-info">User</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td style="gap:15px">

                                            <a href="{{ route('admin.users.editUsers', $item->user_id) }}"
                                                class="info_btn mb-2">Edit</a>
                                            <a href="{{ route('admin.users.showUsers', $item->user_id) }}"
                                                class="status_btn mb-2">Show</a>
                                            <form action="{{ route('admin.users.destroyUsers', $item->user_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="danger_btn"
                                                    onclick="return confirm('Bạn có chắc xóa không?')"
                                                    type="submit">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
