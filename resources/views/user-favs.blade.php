<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Favorites! | National Library</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
    @include('components.corecss')
    <style>
        .note {
            padding: 10px;
            border-left: 4px solid orange;
            background-color: #f6dda5;
        }
    </style>
</head>
<body class="container">
@include('components.header')
<div class="page mx-auto my-3 w-75">
    <h1 class="mt-5">My favourite books</h1>
    <div class="books-list w-100 d-flex flex-column">
        @if($books->isEmpty())
            <p>No Favourite Books 😢</p>
        @else
            <p class="mb-3">Here are your favorite books list: </p>
        @endif

        @foreach($books->reverse() as $book)
            @if($book->pivot->note != null)
                <div class="note mb-3">{{ $book->pivot->note }}</div>
            @endif
            <div class="card mb-5 rounded-3">
                <div class="d-flex flex-fill">
                    <img class="rounded-start-3" src="{{ asset('storage/covers/' . $book->book_cover) }}" alt=""
                         width="100">
                    <div class="card-body d-flex flex-column gap-2">
                        <div>
                            <h4 class="card-title">{{ $book->title }}</h4>
                            <i>{{ $book->author_name }}</i>
                        </div>
                        <div>
                            <p class="card-text">Genre: {{ $book->genre }}</p>
                            <p class="card-text mb-1">Added on: {{ $book->pivot->created_at }}</p>
                            <form action="{{ route('favbooks.remove', ['book'=>$book->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('books.show', ['book'=>$book->id]) }}"
                                   class="btn btn-primary">View</a>
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@include('components.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
