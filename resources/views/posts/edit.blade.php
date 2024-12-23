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
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="post title" required>
            </div>

            <div>
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" placeholder="post description" required>{{ $post->description }}</textarea>
            </div>

            <div>
                <label for="images">Input Images</label>
                <input type="file" name="images[]" id="images" multiple>
                <div>
                    @foreach(json_decode($post->images, true) as $key => $image)
                        <input type="checkbox" name="existing_images[]" value="{{ $image }}" class="check" >
                        <img src="/images/posts/{{ $image }}" alt="" style="width: 300px ;">
                    @endforeach
                </div>
            </div>

            <input type="submit" class="btn btn-info" value="Update Post">
        </form>
    </div>
@endsection
