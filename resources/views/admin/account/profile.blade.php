@extends('admin.layouts.master-layout')
@section('title')
    @parent
    Profile User
@endsection
@section('content')
<div class="col-md-12">
    <div class="white_box mb_30">
        <div class="box_header ">
            <div class="main-title">
                <h3 class="mb-0">My profile</h3>
            </div>
        </div>
        <div class="pCard_card">
            <div class="pCard_up">
                <div class="pCard_text">
                    <h2>{{$profile->full_name}}</h2>
                    <p>UI/UX Designer &amp; UI Developer</p>
                </div>
                <div class="pCard_add"><i class="fa fa-plus"></i></div>
            </div>
            <div class="pCard_down">
                <div>
                    <p>Address</p>
                    <p>{{$profile->address}}</p>
                </div>
                <div>
                    <p>Phone</p>
                    <p>{{$profile->phone}}</p>
                </div>
                <div>
                    <p>Email</p>
                    <p>{{$profile->email}}</p>
                </div>
            </div>
            <div class="pCard_back">
                <p>See My Latest Work Here</p>
                <a href="#"><i class="fab fa-twitter fa-2x fa-fw"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-behance fa-2x fa-fw"></i></a> <br>
                <a href="#"><i class="fab fa-codepen fa-2x fa-fw"></i></a>
                <a href="#"><i class="fab fa-dribbble fa-2x fa-fw"></i></a>
                <a href="#"><i class="fab fa-instagram fa-2x fa-fw"></i></a>
                <p>Follow Me!</p>
            </div>
        </div>
    </div>
</div>
@endsection
