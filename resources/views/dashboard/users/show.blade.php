@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2 mb-3 border-bottom">
    <h1 class="h2">User Profile</h1>
</div>

@if (session()->has('success'))
		<div class="alert alert-warning alert-dismissible" role="alert">          
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
      <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>        
      {{ session('success') }}
		</div>
@endif

<div class="col-lg-6">
	@if ($user->photo)
		<div class="my-3">
			<img src="{{ asset('storage/' . $user->photo) }}" alt="{{ $user->name }}" class="img-fluid" style="max-height: 300px; max-width: 200px;">
		</div>
	@else
		<img src="https://ui-avatars.com/api/?name={{ $user->name }}&color=7F9CF5&background=EBF4FF" alt="{{ $user->name }}" class="img-fluid rounded-circle" style="max-height: 300px; max-width: 200px;">
	@endif
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" readonly>
    </div>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" readonly>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" readonly>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <input type="text" class="form-control" id="gender" name="gender" value="{{ $user->gender }}" readonly>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" readonly>
    </div>
</div>
@endsection
