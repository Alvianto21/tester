@extends('layouts/main')

@section('container')
<h1 class="mb-5"> Post Categories</h1>
<div class="container">
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <a href="/posts?category={{ $category->slug }}">
                    <div class="card text-bg-dark">
                        <img src="https://picsum.photos/500/500?random {{ $category }}" class="card-img" alt="picsum random images">
                        <div class="card-img-overlay d-flex align-items-center p-0">
                            <h5 class="card-title text-center flex-fill p-4 fs-3 text-white" style="background-color: rgba(0,0,0,0.7)">{{ $category->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
<footer class="my-3">
    <a href="https://dev.to/whollyapi/get-random-images-api-for-free-from-lorem-picsum-1ffi" class="text-decoration-none text-dark">&copy; Photos provided by Lorem picsum</a>
</footer>
   
@endsection