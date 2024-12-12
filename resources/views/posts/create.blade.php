@extends('layout.app')
@section('title', 'add post')
@section('content')
    <h1 class="title">add new post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="post title" class="form-control">
        <textarea name="description" placeholder="post description" class="form-control"></textarea>
        <input type="file" name="images[]" multiple>
        <input type="submit" class="btn btn-info" value="send">
    </form>

@endsection
