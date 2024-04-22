<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::check()) {
        return view('home');
    } else {
        return redirect(route('login'))->with('login_needed', 'true');
    }
})->name('home');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register-submit');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginSubmit'])->name('login-submit');


Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/logout-submit', [UserController::class, 'logoutSubmit'])->name('logout-submit');
