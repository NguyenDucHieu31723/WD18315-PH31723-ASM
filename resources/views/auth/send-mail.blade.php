@extends('auth.layouts.default')
@section('title')
    Send Mail
@endsection
@section('content')
    <form id="registerForm" action="{{ route('auth.checkForgotPass') }}" method="POST" novalidate>
        @csrf
        @if (session('message'))
            <div class="alert alert-success mt-3" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @if (session('message-error'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('message-error') }}
            </div>
        @endif
        <div class="field email">
            <div class="input-area">
                <input type="text" placeholder="Email Address" name="email" value="{{ old('email') }}">
                <i class="icon fas fa-envelope"></i>
            </div>
            @error('email')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="pass-txt"><a href="{{ route('auth.showFormLogin') }}">Login?</a></div>

        <input type="submit" value="Send">

    </form>
@endsection
