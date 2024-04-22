<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
    @include('components.corecss')

    <title>Home page</title>
</head>
<body class="container">
@include('components.header')
<div class="text-center">
    <h1>This is the homepage</h1>
    <p>This page shows the general info about the site and is the face of the website!</p>
</div>
@include('components.footer')
</body>
</html>
