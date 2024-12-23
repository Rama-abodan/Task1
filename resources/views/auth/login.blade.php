@extends('layout.app')
@section('title', 'login')
@section('content')
    <div class="container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h1>Login</h1>
            <label for="email">Email:</label>
            <input type="email" placeholder="enter your email" name="email" class="form-control" required>
            <label for="password">Password:</label>
            <input type="password" placeholder="enter your password" name="password" class="form-control" required>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password"  placeholder="confirm your password" name="password_confirmation"  class="form-control" required>
            <input type="submit" value="login"  class="btn btn-info">
        </form>
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                invalid email or password
            </div>
        @endif
    </div>

@endsection
