@extends('auth.layouts.default')
@section('title')
    Register
@endsection
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
    <form action="{{ route('auth.register') }}" method="POST">
        @csrf
        <div class="field email">
            <div class="input-area">
                <input type="text" placeholder="Full name..." name="full_name" value="{{ old('full_name') }}">
                <i class="icon fas fa-user"></i>
            </div>
            @error('full_name')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="field email">
            <div class="input-area">
                <input type="text" placeholder="Email..." name="email" value="{{ old('email') }}">
                <i class="icon fas fa-envelope"></i>
            </div>
            @error('email')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="field password">
            <div class="input-area">
                <input type="password" placeholder="Password..." name="password" value="{{ old('password') }}">
                <i class="icon fas fa-lock"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
            </div>
            @error('password')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="field password">
            <div class="input-area">
                <input type="password" placeholder="Password confirm..." name="confirmPassword"  value="{{ old('confirmPassword') }}">
                <i class="icon fas fa-lock"></i>
                <i class="error error-icon fas fa-exclamation-circle"></i>
            </div>
            @error('confirmPassword')
                <span class="text-danger"> {{ $message }}</span>
            @enderror
        </div>
        <div class="pass-txt mt-4"><a href="{{ route('auth.showFormLogin') }}">Back</a></div>
        <input type="submit" value="Register">
    </form>
@endsection
