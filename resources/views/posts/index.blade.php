@extends('layout.app')

@section('title', 'posts')

@section('content')
<nav class="navbar">
    <div class="nav-left">
        <a href="{{ route('posts.create') }}" class="nav-link">Add New Post</a>

        @if(auth()->user()->is_admin)
        <a href="{{ route('users.index') }}" class="nav-link">Add New Users</a>
        @endif
    </div>

    <div class="nav-right">
        <form action="{{ route("logout") }}" method="POST" class="logout-form">
            @csrf
            <input type="submit" value="Logout" class="btn btn-success logout-btn">
        </form>
    </div>
</nav>

<div class="fath">
    <div class="container">
        @forelse ($posts as $post)
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="card">
                    @php $images = is_string($post->images) ? json_decode($post->images, true) : $post->images; @endphp
                    @if(is_array($images))
                    @foreach ($images as $image)
                    <img src="/images/posts/{{ $image }}" class="card-img-top" alt="" style="width: 100%; height: auto;">
                    @endforeach
                    @else
                    <p>Error: Images data is not in array format</p>
                    @endif
                    <div class="card-body">
                        <h3 class="card-title">{{ $post->title }}</h3>
                        <p class="card-text">{{ $post->description }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="acl">Read more</a><br>
                        
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-outline-danger" value="Delete">
                        </form>
                        
                        <a href="{{ route('posts.edit', $post->id) }}">
                            <input type="button" class="btn btn-outline-warning" value="Update">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h1>There are no posts</h1>
        @endforelse
    </div>
</div>

@endsection
