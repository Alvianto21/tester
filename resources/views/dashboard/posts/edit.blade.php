@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify flex-wrap flex-md-nowrap align-items-center py-2 mb-3 border-bottom">
	<h1 class="h2">Edit post</h1>
</div>

<div class="col-lg-8">
	<form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data">
		@method('put')								
		@csrf
		<div class="mb-3 form-group">
		  <label for="title" class="form-label">Title</label>
		  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">
			@error('title')	
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror		
		</div>
		<div class="mb-3 form-group">
			<label for="slug" class="form-label">Slug</label>
			<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}">
			@error('slug')	
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>
		<div class="mb-3 form-group">
			<label for="category" class="form-label">Category</label>
			<select class="form-select custom-select @error('category_id') is-invalid @enderror" name="category_id">
				@foreach ($categories as $category)
					@if (old('category_id', $post->category_id) == $category->id)
						<option value="{{ $category->id }}" selected>{{ $category->name }}</option>
					@else
						<option value="{{ $category->id }}">{{ $category->name }}</option>	
					@endif
				@endforeach
			</select>
			@error('category_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
		</div>
		<div class="mb-3 form-group">
			@if ($post->image)
				<img src="{{ asset('storage/' . $post->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
			@else
				<img class="img-preview img-fluid mb-3 col-sm-5">
			@endif
			<div class="custom-file">
				<input type="hidden" name="oldImage" value="{{ $post->image }}">
				<input class="form-control custom-file-input @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
				<label for="image" name="image" class="form-label custom-file-label">Post image</label>
			</div>
			@error('image')	
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		  </div>
		<div class="mb-3 form-group">
			<label for="body" class="form-label">Body</label>
			@error('body')	
				<p class="text-danger">{{ $message }}</p>
			@enderror	
			<input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
			<trix-editor input="body"></trix-editor>
		</div>

		<button type="submit" class="btn btn-primary">Update post</button>
	  </form>
</div>

@push('styles')
<!-- trix editor -->
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">

<style>
	trix-toolbar [data-trix-button-group="file-tools"] {
		display: none;
	}
</style>
@endpush

@push('scripts')
<!-- automatic slug and image preview -->
<script src="{{ asset('/js/posts.js') }}"></script>

<!-- trix editor -->
<script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>

<!-- bs-custom-file-input -->
<script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endpush

@endsection