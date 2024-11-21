@extends('layout.app')
@section('title', 'show post')
@section('content')
    <div class="container">
        <img src="/images/posts/{{ $post->image }}" alt="">
        <h1>{{ $post->title }}</h1>
        <br><br>
        <p>{{ $post->description }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to home page</a>
    </div>


@endsection
