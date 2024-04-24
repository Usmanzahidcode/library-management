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
<div class="page w-50 mx-auto">
    <h1 class="mb-5">Register</h1>
    <form action="{{ route('register-submit') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name: </label>
            <input value="{{old('name')}}" name="name" type="text"
                   class="form-control @error('name') is-invalid @enderror" id="name">
            <div id="emailHelp" class="form-text text-danger">@error('name') {{ $message }} @enderror</div>

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input value="{{old('email')}}" name="email" type="email"
                   class="form-control @error('email') is-invalid @enderror" id="email"
                   aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text text-danger">@error('email') {{ $message }} @enderror</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input value="{{old('password')}}" name="password" type="password"
                   class="form-control @error('password') is-invalid @enderror" id="password">
            <div id="emailHelp" class="form-text text-danger">@error('password') {{ $message }} @enderror</div>

        </div>


        <div class="mb-3">
            <label for="profile_pic" class="form-label">Profile Picture</label>
            <input name="profile_pic" type="file"
                   class="form-control @error('profile_pic') is-invalid @enderror">
            <div id="dpHelp" class="form-text text-danger">@error('profile_pic') {{ $message }} @enderror</div>

        </div>

        {{--            <div class="mb-3 form-check">--}}
        {{--                <input type="checkbox" class="form-check-input" id="remember">--}}
        {{--                <label class="form-check-label" for="remember">Remember me</label>--}}
        {{--            </div>--}}
        <button type="submit" class="btn btn-primary">Register</button>
        <a class="btn btn-secondary" href="{{route('login')}}">Login</a>
    </form>
</div>
@include('components.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
