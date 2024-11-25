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

                
                <input type="file" name="image" id="image" style="display: none">
                <label for="image">
                        <img src="/images/posts/{{ $post->image }}" alt="" width="100" >
                </label>
            

            <input type="submit" class="btn btn-danger" value="Update Post">
        </form>
    </div>
@endsection
