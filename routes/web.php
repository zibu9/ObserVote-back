<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\ObserverController;
use App\Http\Controllers\SuperAdminController;

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
        Route::get('editer-candidat/{id}', [SuperAdminController::class, 'edit'])->name('candidat.edit');
        Route::post('/candidat', [SuperadminController::class, 'storeCandidat'])->name('candidat.store');
        Route::put('/observer/{id}', [SuperAdminController::class, 'updateCandidat'])->name('candidat.update');
        Route::get('candidat/create', [SuperAdminController::class, 'createCandidat'])->name('candidat.create');
        Route::get('listes-des-candidats', [SuperAdminController::class, 'index'])->name('candidat.index');
        Route::get('candidat/{id}', [SuperAdminController::class, 'show'])->name('candidat.show');
    });
    Route::middleware(['admin'])->group(function () {
        Route::get('editer-observer/{id}', [CandidatController::class, 'edit'])->name('observer.edit');
        Route::post('/observer', [CandidatController::class, 'storeObserver'])->name('observer.store');
        Route::put('/observer/{id}', [CandidatController::class, 'updateObserver'])->name('observer.update');
        Route::get('observer/create', [CandidatController::class, 'createObserver'])->name('observer.create');
        Route::get('listes-des-observers', [CandidatController::class, 'index'])->name('observer.index');
        Route::get('observer/{id}', [CandidatController::class, 'show'])->name('observer.show');
        Route::get('nos-resultats', [CandidatController::class, 'results'])->name('admin.results');
        Route::get('resultats-details', [CandidatController::class, 'details'])->name('admin.details');
        Route::get('/change-password', [CandidatController::class, 'showChangePasswordForm'])->name('change-password');
    });

    Route::middleware(['observer'])->group(function () {
        Route::get('envoyer-resultats', [ObserverController::class, 'createResult'])->name('result.create');
        Route::get('resultats-envoyer', [ObserverController::class, 'index'])->name('result.index');
    });
});

