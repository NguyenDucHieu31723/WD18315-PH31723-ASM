@extends('admin.layouts.master-layout')
@section('title')
    @parent
    Show Products
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page_title_box d-flex align-items-center justify-content-between">
                <div class="page_title_left">
                    <h3 class="f_s_30 f_w_700 text_white">Product Details</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="white_card position-relative mb_20">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <img src="{{ asset($product->image) }}" alt class="mx-auto d-block sm_w_100" height="300" />
                        </div>

                        <div class="col-lg-6 align-self-center">
                            <div class="single-pro-detail">
                                <p class="mb-1">Name:</p>

                                <h3 class="pro-title">{{ $product->name }}</h3>
                                <div class="custom-border mb-3"></div>
                                <h6 class="text-muted font_s_13 mt-2 mb-1">Description :</h6>
                                <ul class="list-unstyled pro-features border-0">
                                    <li>{{ $product->description }}</li>
                                </ul>
                                <h6 class="text-muted font_s_13 mt-2 mb-1">Category :</h6>
                                <ul class="list-unstyled pro-features border-0">
                                    <li>{{ $product->category->name }}</li>
                                </ul>
                                <h6 class="text-muted font_s_13 mt-2 mb-1">Created At :</h6>
                                <ul class="list-unstyled pro-features border-0">
                                    <li>{{ $product->created_at }}</li>
                                </ul>
                                <h6 class="text-muted font_s_13 mt-2 mb-1">Updated At :</h6>
                                <ul class="list-unstyled pro-features border-0">
                                    <li>{{ $product->updated_at }}</li>
                                </ul>

                                <div class="quantity mt-3">
                                    <a href="{{ route('admin.products.listProducts') }}"
                                        class="btn green_bg text-white px-4 d-inline-block ">
                                        <i class="fa fa-arrow-left me-2"></i>
                                        Back to list
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
