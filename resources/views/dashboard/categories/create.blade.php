@extends('dashboard.layouts.main')
@section('container')

<div class="d-flex justify flex-wrap flex-md-nowrap align-items-center py-2 mb-3 border-bottom">
	<h1 class="h2">Create new Category</h1>
</div>

<div class="col-lg-8">
	<form method="post" action="/dashboard/categories" class="mb-5">								
		@csrf
		<div class="mb-3 form-group">
		  <label for="name" class="form-label">Category Name</label>
		  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
			@error('name')	
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror		
		</div>
		<div class="mb-3 form-group">
			<label for="slug" class="form-label">Slug</label>
			<input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
			@error('slug')	
				<div class="invalid-feedback">
					{{ $message }}
				</div>
			@enderror
		</div>

		<button type="submit" class="btn btn-primary">Create New Category</button>
	  </form>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');

  name.addEventListener('change', function() {
	fetch('/dashboard/category/checkSlug?name=' + name.value)
	  .then(response => response.json())
	  .then(data => slug.value = data.slug)
  });
 
</script>

@endsection