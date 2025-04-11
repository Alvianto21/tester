@extends('layouts\main')

@section('container')

<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-registration w-100 m-auto">
      <h1 class="h3 mb-3 fw-normal text-center mt-4 mb-4">Register</h1>
        <form action="/register" method="post">
          @csrf      
          <div class="form-floating">
            <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}" required>
            <label for="name">Name</label>
            @error('name')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" value="{{ old('username') }}" required>
            <label for="usernamename">Username</label>
            @error('username')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <select name="gender" class="form-select form-control @error('gender') is-invalid @enderror" id="gender" required>
              <option value="" disabled selected>>Select your gender</option>
              <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>male</option>
              <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>female</option>
            </select>
            @error('gender')
              <div class="invalid-feedback d-block">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}" required>
            <label for="email">Email address</label>
            @error('email')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phone') }}" required>
            <label for="phone">Phone Number</label>
            @error('phone')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required>
            <label for="password">Password</label>
            @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
            @enderror
          </div>
          <button class="btn btn-primary w-100 py-2 mt-3" type="submit">Login</button>
        </form>
        <small class="d-block text-center mt-3">
          Have account? <a href="/login">Login</a>
        </small>
      </main>
  </div>
</div>

@endsection