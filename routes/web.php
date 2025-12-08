<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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