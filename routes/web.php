<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isLoggedIn;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['user' => Auth::user(), 'books' => Book::take(10)->get()]);
})->name('home');

Route::get('/manage-users', [UserController::class, 'manageUsers'])->name('users.manage')->middleware(isAdmin::class);
Route::delete('/delete-user/{user}', [UserController::class, 'removeUser'])->name('users.delete')->middleware(isAdmin::class);

Route::get('/manage/books', function () {
    return view('manage-books', ['books' => Book::simplePaginate(10)]);
})->name('manage.books')->middleware(isAdmin::class);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register-submit');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginSubmit'])->name('login-submit');
Route::get('/logout-submit', [UserController::class, 'logoutSubmit'])->name('logout-submit');

Route::post('/add-book/{book}', [UserController::class, 'addFavouriteBook'])->middleware(isLoggedIn::class)->name('favbooks.add');
Route::delete('/remove-book/{book}', [UserController::class, 'removeFavouriteBook'])->middleware(isLoggedIn::class)->name('favbooks.remove');
Route::get('/favourite-books', [UserController::class, 'favouriteBooks'])->middleware(isLoggedIn::class)->name('favbooks.index');


Route::resource('books', BookController::class);

// Middlewares for book routes:

Route::group(['middleware' => isAdmin::class], function () {
    Route::get('books/create', [BookController::class, 'create'])->name('books.create');
    Route::put('books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
});


