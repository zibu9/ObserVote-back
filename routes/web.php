<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/register', function () {
    abort(404);
})->name('register');

Route::post('/register', function () {
    abort(404);
})->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', function () {
        return view('home');
    });
});

