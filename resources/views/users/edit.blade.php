@extends('layout.app')
@section('title', 'add user')
@section('content')
    <h1 class="title">update users</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <label>name:</label>
        <input type="text" name="name" placeholder="user name" value="{{ $user->name }}" class="form-control">
        <label>email:</label>
        <input type="text" name="email" placeholder="your email" value="{{ $user->email }}" class="form-control">
        <label>password:</label>
        <input type="password" name="password" placeholder=" update password"  class="form-control">
        <label>Confirm Password:</label> 
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control" required>
        <input type="submit" class="btn btn-info" value="send">
    </form>

@endsection
