<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
    @include('components.corecss')

    <title>Home | National Library</title>
</head>
<body class="container">
@include('components.header')
<div class="page mt-5 px-3">
    <h1 class="title">Welcome to the National Library Of Pakistan!</h1>
    <p class="body-text">A place where you can find you next read. Here are our top pics for you!</p>
    <div class="books-grid d-flex gap-5 flex-wrap align-items-start my-5">
        @foreach($books as $book)
            <div class="book-card d-flex flex-column bg-body-secondary col-2">
                <img src="{{asset('storage/covers/' . $book->book_cover)}}" alt="">
                <div class="book-info d-flex flex-column gap-2 p-2 mt-3">
                    <h4 class="title">{{$book->title}}</h4>
                    <p class="text-secondary">{{$book->author_name}}</p>
                    <a href="{{route('books.show',['book'=>$book->id])}}" class="btn btn-primary">View Details!</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('components.footer')

</body>
</html>
