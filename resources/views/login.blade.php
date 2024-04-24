<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rev 9 Website</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
    @include('components.corecss')
</head>
<body class="container">


@include('components.header')


<div class="page w-50 mx-auto">@php
    @endphp
    <h1 class="mb-5">Login</h1>
    @if(session('login_needed') !== null)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Login required!</strong> You must login before accessing the previous page!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('registration_success') !== null)
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registration Successful!</strong> You may login using the credential now!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if(session('login_error') !== null)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>LogIn Error!</strong> Login failed please try again after a few moments.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="{{route('login-submit')}}" method="post">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input value="{{old('email')}}" type="email" class="form-control @error('email') is-invalid @enderror"
                   id="email" aria-describedby="emailHelp" name="email">

            <div id="emailHelp" class="form-text text-danger">@error('email') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input value="{{old('password')}}" type="password"
                   class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            <div id="emailHelp" class="form-text text-danger">@error('password') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>

        <a class="btn btn-secondary" href="{{route('register')}}">Register</a>
    </form>
</div>
@include('components.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
