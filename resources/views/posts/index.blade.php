@extends('layout.app')

@section('title', 'posts')

@section('content')
    <div class="fath">
        <a href="{{ route('posts.create') }}"><input type="button" value="add new post" class="btn btn-success"></a>
        <div class="container">
            @forelse ($posts as $post)
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col">
                            <div class="card">
                                <img src="/images/posts/{{ $post->image }}" class="card-img-top" alt=""
                                    style="width: 100%; height: auto;">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $post->title }}</h3>
                                    <p class="card-text">{{ $post->description }}</p>
                                    <a href="{{ route('posts.show', $post->id) }}" class="acl">read more than</a>
                                    <div class="d-flex justify-content-between">
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="delete">
                                        </form>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="editBtn">
                                            <input type="button" class="btn btn-warning" value="Update">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            @empty
                <h1>there is any post</h1>
            @endforelse
        </div>
    </div>
@endsection
