@extends('template.main')
@section('container')
<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    
    @if (session()->has('loginerror'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginerror') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="email @error('email') is-invalid @enderror" class="form-control" id="email" placeholder="name@example.com" name="email">
                        <label for="email">Email address</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                        <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                        <label for="floatingPassword">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="text-center d-block mt-sm-3">Not Registered? <a href="/register">Register Now</a></small>
            </main>
        </div>
    </div>
</div>
@endsection
