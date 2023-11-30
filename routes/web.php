<?php

use App\Http\Controllers\SuperAdminController;
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
})->name('home');

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
    Route::middleware(['superadmin'])->group(function () {
        Route::get('candidat/create', [SuperAdminController::class, 'createCandidat'])->name('candidat.create');
        Route::get('listes-des-candidats', [SuperAdminController::class, 'index'])->name('candidat.index');
        Route::post('/candidats', [SuperadminController::class, 'storeCandidat'])->name('candidat.store');
    });
});

