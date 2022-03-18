@extends('template.main')
@section('container')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center mt-3">Please registrasi</h1>
                <form method="post" action="/register">
                    @csrf
                    <div class="form-floating">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Masukkan nama kamoe" required>
                        <label for="name">Name</label>
                        @error('name')
                            <div class="invalid-feedback text-dark">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="email" class="form-control" id="email @error('email') is-invalid @enderror" placeholder="Masukkan email kamoe" name="email" required>
                        <label for="email">Email</label>
                        @error('email')
                            <div class="invalid-feedback text-dark">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password kamoe" name="password" required>
                        <label for="password">Password</label>
                        @error('password')
                            <div class="invalid-feedback text-dark">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <small class="text-center d-block mt-sm-3">Have account? <a href="/login">Login now</a></small>
            </main>
        </div>
    </div>
</div>

@endsection