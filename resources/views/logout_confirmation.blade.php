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
<div class="page w-50 mx-auto d-flex flex-column gap-5 align-items-center">
    @if(isset($no_user))
        <h3 class="m-0">You are not logged In, in the first place!</h3>
        <a class="btn btn-primary px-3 rounded-5" href="{{route('login')}}">Login</a>
    @else
        <h3 class="m-0">Are you sure about logging out!</h3>
        <a href="{{ route('logout-submit') }}" class="btn btn-danger">Confirm Logout!</a>
    @endif

</div>

@include('components.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
