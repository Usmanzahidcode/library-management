<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
    @include('components.corecss')

    <title>Manage Books | National Library</title>
</head>
<body class="container">
@include('components.header')
<div class="page mt-5 px-3">
    <h1 class="title">Manage books</h1>
    <p class="body-text">Edit books and do action on the book records! </p>

    <div class="pagination my-5">
        {{ $books->links() }}
    </div>

    <table class="table table-striped">
        <thead class="table-primary">
        <tr>
            <th>
                ID
            </th>
            <th>
                Title
            </th>
            <th>
                ISBN
            </th>
            <th>
                Author
            </th>
            <th>
                Genre
            </th>
            <th>
                Rating
            </th>
            <th>
                Actions
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <th>
                    {{ $book->id }}
                </th>
                <th class="d-flex">
                    <img class="me-3 d-block rounded" src="{{ asset('storage/covers/' . $book->book_cover) }}" alt=""
                         width="60">
                    {{ $book->title }}
                </th>
                <th>
                    {{ $book->ISBN }}
                </th>
                <th>
                    {{ $book->author_name }}
                </th>
                <th>
                    {{ $book->genre }}
                </th>
                <th>
                    @for($i = 1; $i <= $book->rating; $i++)
                        ⭐
                    @endfor
                </th>
                <th>
                    <form method="post" action="{{ route('books.destroy', ['book'=>$book->id]) }}">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('books.show', ['book'=>$book->id]) }}" class="btn btn-sm btn-primary">View</a>
                        <a href="{{ route('books.edit', ['book'=>$book->id])}}" class="btn btn-sm btn-warning">Edit</a>
                        <button type="submit" class="btn btn-sm btn-danger mt-2">Delete</button>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $books->links() }}

</div>

@include('components.footer')

</body>
</html>
