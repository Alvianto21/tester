@extends('layouts\main')
@section('container')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h2 class="mb=3">{{ $posts->title }}</h2>
            <p>By 
                @if ($posts->author)
                    <a href="/posts?author={{ $posts->author->username }}" class="text-decoration-none">{{ $posts->author->name }}</a>
                @else
                    Unknown Author
                @endif
                in <a href="/posts?category={{ $posts->category->slug }}" class="text-decoration-none">{{  $posts->category->name }}</a>
            </p>
            @if ($posts->image)
            <div style="max-height: 400; overflow:hidden; width: 300px;">    
                <img src="{{ asset('storage/' . $posts->image) }}" alt="{{ $posts->category->name }}" class="img-fluid mx-auto p-2">
            </div>
          @else
              <img src="https://picsum.photos/1200/400" alt="picsum random images" class="img-fluid">
          @endif            <article class="my-3 fs-5">    
                {!! $posts->body !!}
            </article>
            <a href="/posts" class="d-block mt-3">Back</a>
            <footer class="my-3">
            <a href="https://dev.to/whollyapi/get-random-images-api-for-free-from-lorem-picsum-1ffi" class="text-decoration-none text-dark">&copy; Photos provided by Lorem picsum</a>
            </footer>
        </div>
    </div>
</div>
@endsection
