@extends('client.layouts.master-layouts')
@section('title-main')
    @parent
    Shop
@endsection
@section('title')
    Shop
@endsection
@section('content')
    @include('client.layouts.banner')
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">



                        @foreach ($product as $item)
                            <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                                <div class="product">
                                    <a href="{{ route('detail', $item->product_id) }}" class="img-prod"><img class="img-fluid"
                                            src="{{ asset($item->image) }}" alt="Colorlib Template">
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 pb-4 px-3">
                                        <div class="d-flex">
                                            <div class="cat">
                                                <span>{{ $item->category->name }}</span>
                                            </div>

                                        </div>
                                        <h3><a href="#">{{ $item->name }}</a></h3>
                                        <div class="pricing">
                                            <p class="price"><span>${{ $item->price }}</span></p>
                                        </div>
                                        <p class="bottom-area d-flex px-3">
                                            <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                                        class="ion-ios-add ml-1"></i></span></a>
                                            <a href="#" class="buy-now text-center py-2">Buy now<span><i
                                                        class="ion-ios-cart ml-1"></i></span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="row mt-5">
                        <div class="col text-center">
                            {{ $product->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2">
                    <div class="sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading">Categories</h2>
                            <div class="fancy-collapse-panel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel-heading" role="tab" id="headingFour">
                                        <h4 class="panel-title">
                                            @foreach ($categories as $item)
                                                <a class="collapsed"
                                                    href="{{route('productInCategory',$item->name)}}">{{ $item->name }}
                                                </a>
                                            @endforeach
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('client.layouts.follow-us')
@endsection
