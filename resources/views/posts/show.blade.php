@extends('layout.app')
@section('title', 'show post')
@section('content')
    <div class="cardshow">
    <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
              <div class="col-md-4">
                    @php $images = is_string($post->images) ? json_decode($post->images, true) : $post->images;
                        
                    @endphp 
                    @if(is_array($images)) 
                    @foreach ($images as $image) 
                    <img src="/images/posts/{{ $image }}" class="card-img-top" alt="" style="width: 100%; height: auto;">
                    @endforeach 
                    @endif
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">title: {{ $post->title }}</h5>
                  <p class="card-text">description: {{ $post->description }}</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated: {{ $post->updated_at->format('Y-m-d H:i') }}</small></p>
                  <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to home page</a>
                </div>
              </div>
            </div>
          </div>

        </div>
@endsection
