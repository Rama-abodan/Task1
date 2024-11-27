@extends('layout.app')
@section('title', 'show post')
@section('content')

        <h1>title:{{ $post->title }}</h1>
        <h1>description:{{ $post->description }}</h1>
        <img src="/images/posts/{{ $post->image }}" alt="">
        <p>add at: {{ $post->created_at }}</p>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to home page</a>
        


@endsection
