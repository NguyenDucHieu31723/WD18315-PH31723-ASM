@extends('auth.layouts.default')
@section('title')
    Login
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('auth.login') }}" method="POST">
        @csrf
        <div class="field email">
            <div class="input-area">
                <input type="text" placeholder="Email Address" name="email" value="{{ old('email') }}">
                <i class="icon fas fa-envelope"></i>
            </div>
            @error('email')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="field password">
            <div class="input-area">
                <input type="password" placeholder="Password" name="password">
                <i class="icon fas fa-lock"></i>
            </div>
            @error('password')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="pass-txt"><a href="{{ route('auth.showFormForgotpass') }}">Forgot password?</a></div>
        <input type="submit" value="Login">
    </form>
    <div class="sign-txt">Not yet member? <a href="{{ route('auth.showFormRegister') }}">Signup now</a></div>
@endsection
