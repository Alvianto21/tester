@extends('layouts\main')
@section('container')

    @if (session()->has('success'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">          
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>        
        </div>
    @endif

    <h1>Halaman Home</h1>

    <div class="card mb-3"">
        @if ($posts[0]->image)
          <div style="max-height: 400; overflow:hidden; width: 300px;">    
              <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}" class="img-fluid">
          </div>
        @else
        <img src="https://picsum.photos/1500/400" class="card-img-top" alt="pigsum random image">
        @endif
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none text-dark"> {{ $posts[0]->title }}</a> </h3>
            <p>
                <small class="text-muted">
                    By 
                    @if ($posts[0]->author)
                        <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a>
                    @else
                        Unknown Author
                    @endif
                    in <a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none">{{  $posts[0]->category->name }}</a> {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text"> {{ $posts[0]->excerpt }} </p>
            <a href="/post/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read more</a>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="position-absolute bg-dark p-3-2"><a href="/posts?category={{ $posts[0]->category->slug }}" class="text-decoration-none text-white">{{  $post->category->name }}</a></div>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid" alt="{{ $post->category->name }}">
                        @else
                            <img src="https://picsum.photos/500/500?random {{ $post }}" class="card-img-top" alt="picsum random images">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/post/{{ $post->slug }}" class="text-decoration-none text-dark"> {{ $post->title }}</a>
                            </h5>
                            <p>By 
                                @if ($post->author)
                                    <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
                                @else
                                    Unknown Author
                                @endif
                                {{ $post->created_at->diffForHumans() }} 
                            </p>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
