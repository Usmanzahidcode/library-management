<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\isLoggedIn;
use App\Http\Middleware\isntLoggedOut;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){return view('home',['user'=> Auth::user()]);})->name('home')->middleware(isLoggedIn::class);

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register-submit');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'loginSubmit'])->name('login-submit');

Route::get('/logout-submit', [UserController::class, 'logoutSubmit'])->name('logout-submit');
