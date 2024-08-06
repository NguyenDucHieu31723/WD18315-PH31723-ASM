@extends('auth.layouts.default')
@section('title')
    Update Password
@endsection
@section('content')
    <form id="loginForm" action="" method="POST" novalidate>
        @csrf
        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Password</label>
            <input type="email" class="form-control" id="email" name="password" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Confirm Password</label>
            <input type="email" class="form-control" id="email" name="confirm_password" required>
        </div>
        <!-- Submit Button -->
        <div class="mb-3 text-center">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
@endsection
