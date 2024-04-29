<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add a book | National Library</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstraplocal.css')}}">
    @include('components.corecss')
</head>
<body class="container">
@include('components.header')
<div class="page w-50 mx-auto my-5">
    <h1 class="mb-5">Add book</h1>
    <form action="{{ route('books.update', ['book'=>$book->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Book Title:</label>
            <input value="{{ $book->title }}" name="title" type="text"
                   class="form-control @error('title') is-invalid @enderror" id="title">
            <div id="titleHelp" class="form-text text-danger">@error('title') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                      id="description">{{ $book->description }}</textarea>
            <div id="descriptionHelp" class="form-text text-danger">@error('description') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="rating" class="form-label">Rating:</label>
            <input value="{{ $book->rating }}" name="rating" type="number"
                   class="form-control @error('rating') is-invalid @enderror" id="rating" max="5">
            <div id="ratingHelp" class="form-text text-danger">@error('rating') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="author_name" class="form-label">Author Name:</label>
            <input value="{{ $book->author_name }}" name="author_name" type="text"
                   class="form-control @error('author_name') is-invalid @enderror" id="author_name">
            <div id="authorNameHelp" class="form-text text-danger">@error('author_name') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="pages" class="form-label">Pages:</label>
            <input value="{{ $book->pages }}" name="pages" type="number"
                   class="form-control @error('pages') is-invalid @enderror" id="pages">
            <div id="pagesHelp" class="form-text text-danger">@error('pages') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="language" class="form-label">Language:</label>
            <select name="language" id="language" class="form-control @error('language') is-invalid @enderror">
                <option value="">Select Language</option>
                <option value="English" {{ $book->language == 'English' ? 'selected' : '' }}>English</option>
                <option value="Spanish" {{ $book->language == 'Spanish' ? 'selected' : '' }}>Spanish</option>
                <option value="French" {{ $book->language == 'French' ? 'selected' : '' }}>French</option>
                <option value="German" {{ $book->language == 'German' ? 'selected' : '' }}>German</option>
                <option value="Chinese" {{ $book->language == 'Chinese' ? 'selected' : '' }}>Chinese</option>
            </select>
            <div id="languageHelp" class="form-text text-danger">@error('language') {{ $message }} @enderror</div>
        </div>


        <div class="mb-3">
            <label for="ISBN" class="form-label">ISBN:</label>
            <input value="{{ $book->ISBN }}" name="ISBN" type="text"
                   class="form-control @error('ISBN') is-invalid @enderror" id="ISBN">
            <div id="ISBNHelp" class="form-text text-danger">@error('ISBN') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="publish_date" class="form-label">Publish Date:</label>
            <input value="{{ $book->publish_date }}" name="publish_date" type="date"
                   class="form-control @error('publish_date') is-invalid @enderror" id="publish_date">
            <div id="publishDateHelp"
                 class="form-text text-danger">@error('publish_date') {{ $message }} @enderror</div>
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre:</label>
            <select name="genre" id="genre" class="form-control @error('genre') is-invalid @enderror">
                <option value="biography" {{ $book->genre == 'biography' ? 'selected' : '' }}>Biography</option>
                <option value="fiction" {{ $book->genre == 'fiction' ? 'selected' : '' }}>Fiction</option>
                <option value="non-fiction" {{ $book->genre == 'non-fiction' ? 'selected' : '' }}>Non-Fiction</option>
                <option value="science-fiction" {{ $book->genre == 'science-fiction' ? 'selected' : '' }}>Science
                    Fiction
                </option>
                <option value="fantasy" {{ $book->genre == 'fantasy' ? 'selected' : '' }}>Fantasy</option>
            </select>
            <div id="genreHelp" class="form-text text-danger">@error('genre') {{ $message }} @enderror</div>
        </div>


        <div class="mb-3">
            <label for="type" class="form-label">Type:</label>
            <select name="type" id="type"
                    class="form-control @error('type') is-invalid @enderror">
                <option value="paperback" {{ $book->type == 'paperback' ? 'selected' : '' }}>Paperback</option>
                <option value="hard" {{ $book->type == 'hard' ? 'selected' : '' }}>Hard</option>
                <option value="kindle" {{ $book->type == 'kindle' ? 'selected' : '' }}>Kindle</option>
            </select>
            <div id="typeHelp" class="form-text text-danger">@error('type') {{ $message }} @enderror</div>
        </div>


        <div class="mb-3">
            <label for="book_cover" class="form-label">Book Cover:</label>
            <input name="book_cover" type="file" id="book_cover"
                   class="form-control @error('book_cover') is-invalid @enderror">
            <div id="bookCoverHelp" class="form-text text-danger">@error('book_cover') {{ $message }} @enderror</div>
        </div>


        <button type="submit" class="btn btn-warning">Update Book</button>
    </form>
</div>
@include('components.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
