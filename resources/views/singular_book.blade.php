<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
    @include('components.corecss')

    <title>{{ $book->title }} | National Library</title>
</head>
<body class="container">
@include('components.header')
<div class="page my-auto px-3 d-flex align-items-center gap-3 px-5 mt-5 mb-5">

    <img src="{{ asset('storage/covers/' . $book->book_cover) }}" alt="" width="300">

    <div class="vertical-divider"></div>
    <div class="book-info d-flex flex-column gap-3">
        <h1 class="title">{{ $book->title }}</h1>
        <i>Publish-Date: {{ $book->publish_date }}</i>
        <p>{{ $book->description }}</p>
        <p>
            <strong>Rating:</strong>
            @for($i = 1; $i <= $book->rating; $i++)
                ⭐
                {{-- &#9733;--}}
            @endfor
        </p>
        <p><strong>Author:</strong> {{ $book->author_name }}</p>
        <p><strong>Pages:</strong> {{ $book->pages }}</p>
        <p><strong>Language:</strong> {{ $book->language }}</p>
        <p><strong>ISBN:</strong> {{ $book->ISBN }}</p>
        <p><strong>Genre:</strong> {{ $book->genre }}</p>
        <p><strong>Type:</strong> {{ $book->type }}</p>
        @if(!Auth::check())
            ---
        @elseif(Auth::user()->role == 2)
            <form action="{{ route('favbooks.add', ['book'=>$book->id]) }}" method="post">
                @csrf
                <div class="d-flex align-items-center gap-3">
                    <input type="text" name="note" id="note" placeholder="Add note for favorite!" class="form-control">
                    <button type="submit" class="btn btn-primary">Favourite</button>
                </div>
            </form>
        @elseif(Auth::user()->role == 1)
            <a href="{{ route('books.edit', ['book'=>$book->id]) }}" class="btn btn-warning">Edit Book</a>
            <a href="#" class="btn btn-danger">Delete Book</a>
        @endif
    </div>

</div>

@include('components.footer')

</body>
</html>
