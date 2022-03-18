@extends('template.main')
@section('container')
<div class="container">
    <div class="d-flex justify-content-center ">
        <h1 class="h2">Create New User</h1>
    </div>
    
    <div class="col-sm-12 d-flex justify-content-center">
        <form method="POST" action="/users" class="mb-sm-5">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"  name="name" required value="{{ old('name') }}">
              @error('name')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"  name="email" required value="{{ old('email') }}">
              @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"  name="password" required value="{{ old('password') }}">
              @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="role" class="form-label">Role</label>
              <select class="form-select" name="role" id="role">
                  <option value="user" selected>User</option>  
                  <option value="management">Management</option>  
                  <option value="admin">Admin</option>  
              </select>
            </div>
    
    
            <button type="submit" class="btn btn-primary">Create User</button>
        </form>
    </div>
    
</div>
@endsection
