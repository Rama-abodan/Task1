@extends('layout.app')
@section('title', 'add user')
@section('content')
    <h1 class="title">add new users</h1>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>name:</label>
        <input type="text" name="name" placeholder="user name" class="form-control">
        <label>email:</label>
        <input type="text" name="email" placeholder="your email" class="form-control">
        <label>password:</label>
        <input type="password" name="password" placeholder="your password" class="form-control">
        <label>Confirm Password:</label> 
        <input type="password" name="password_confirmation" placeholder="Confirm Your Password" class="form-control" required>
        <input type="submit" class="btn btn-info" value="send">
    </form>

@endsection
