@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-2 mb-3 border-bottom">
    <h1 class="h2">User Profile</h1>
</div>

<div class="col-lg-6">
	<form method="post" action="/dashboard/users/{{ $user->username }}" class="mb-5" enctype="multipart/form-data">
		@method('put')
		@csrf
    <div class="mb-3 form-group">
        @if ($user->photo)
        <img src="{{ asset('storage/' . $user->photo) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block img-fluid rounded-circle" style="max-height: 300px; max-width: 200px;">
        @else
        <img class="img-preview img-fluid mb-3 col-sm-5 img-fluid rounded-float" style="max-height: 300px; max-width: 200px;">
        @endif
        <div class="custom-file">
            <input type="hidden" name="oldPhoto" value="{{ $user->photo }}">
		    <input class="form-control custom-file-input @error('photo') is-invalid @enderror" type="file" id="photo" name="photo" onchange="previewImage()">
            <label for="photo" class="form-label custom-file-label">Photo Profile</label>
        </div>
		@error('photo')	
			<div class="invalid-feedback">
				{{ $message }}
		@enderror
    </div>
    <div class="mb-3 form-group">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid 
        @enderror" id="username" name="username" value="{{ $user->username }}">
        @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid
        @enderror" id="name" name="name" value="{{ $user->name }}" required>
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <label for="phone" class="form-label">Phone Number</label>
        <input type="number" class="form-control @error('phone') is-invalid
        @enderror" id="phone" name="phone" value="{{ $user->phone }}" required>
        @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <label for="gender" class="form-label">Gender</label>
        <select name="gender" class="form-select form-control custom-select @error('gender') is-invalid @enderror" id="gender" required>
            <option value="" disabled selected>>Select your gender</option>
            <option value="male" {{ old('gender', $user->gender) == 'male' ? 'selected' : '' }}>male</option>
            <option value="female" {{ old('gender', $user->gender) == 'female' ? 'selected' : '' }}>female</option>
        </select>
        @error('gender')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 mt-3 form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid 
        @enderror" id="email" name="email" value="{{ $user->email }}">
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        <small class="form-text text-muted">Leave blank if you don't want to change the password.</small>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm New Password</label>
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <button type="submit" class="btn btn-primary" onclick="return validatePasswords()">Update Profile</button>
  </form>
</div>

<form action="/dashboard/users/{{ auth()->user()->username }}"
    method="post" class="d-inline">
    @method('delete')
    @csrf
    <button class="btn btn-danger text-dark border-0" onclick="return confirm('Are you sure?')">
      <i class="fa fa-ban" aria-hidden="true"></i>
      Delete Account
    </button>
  <a class="nav-link text-dark gap-1" href="/dashboard/users/{{ auth()->user()->username }}" >
  </a>
</form>

@push('scripts')
<!-- password validation and profile image preview -->
<script src="{{ asset('js/profile.js') }}"></script>

<!-- bs-custom-file-input -->
<script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<!-- InputMask -->
<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>

<script src="{{ asset('AdminLTE/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
@endpush

@endsection
