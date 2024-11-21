@extends('layout.app')

@section('title', 'Edit Post')

@section('content')
    <div class="container">
        <h1>Update Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="post title"
                    required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" placeholder="post description" required>{{ $post->description }}</textarea>
            </div>

            <div>
                <label for="image">Image:</label>
                <input type="file" name="image">
                @if ($post->image)
                    <div>
                        <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" width="100">
                    </div>
                @endif
            </div>

            <input type="submit" class="btn btn-danger" value="Update Post">
        </form>
    </div>
@endsection
