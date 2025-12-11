<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return 'Halaman About';
});

Route::get('/user/{name}', function ($name) {
    return 'Halo, ' .$name;
});

Route::get('/profile', function () {
    $data = [
        'name' => 'Rakha',
        'age' => 18
    ];
    // return view('profile', $data);
    return view('profile', compact('data'));
});

Route::get('/contact', [ContactController::class, 'index']);

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    Route::resource('categories', CategoryController::class);
});

Route::get('/', [BookController::class, 'welcome'])->name('welcome');
Route::get('/books/user/{id}', [BookController::class, 'showuser'])->name('books.showuser');