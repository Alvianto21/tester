@extends('dashboard.layouts.main')
@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h2 class="mb=3">{{ $post->title }}</h2>
            
			<a href="/dashboard/posts" class="btn btn-info"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to all your posts</a>
			<a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="fa fa-pencil-square" aria-hidden="true"></i> edit this post</a>
            @if(is_object($post))
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
            @else
                <form action="/dashboard/posts/invalid-post" method="post" class="d-inline">
            @endif
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa fa-ban" aria-hidden="true"></i>delete this post</button>
              </form>

            @if ($post->image)
              <div style="max-height: 400; overflow:hidden; margin-top: 5px; width: 300px;">    
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
              </div>
            @else
                <img src="https://picsum.photos/1200/400" alt="picsum random images" class="img-fluid">
            @endif

            <article class="my-3 fs-5">    
                {!! $post->body !!}
            </article>

            <a href="/dashboard/posts" class="d-block mt-3">Back</a>
            
			<footer class="my-3">
            
				<a href="https://dev.to/whollyapi/get-random-images-api-for-free-from-lorem-picsum-1ffi" class="text-decoration-none text-dark">&copy; Photos provided by Lorem picsum</a>

            </footer>
        </div>
    </div>
</div>

@endsection