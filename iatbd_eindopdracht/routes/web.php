<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::middleware(['auth','admin'])->group(function() {
    Route::get('/block', [\App\Http\Controllers\UserController::class, 'showBlock']);
    Route::post('/blocked', [\App\Http\Controllers\UserController::class, 'block']);
});

Route::middleware(['auth','1'])->group(function() {
    return redirect('login');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/', [\App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy']);
    Route::get('/items', [\App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/item/{id}', [\App\Http\Controllers\ItemController::class, 'show']);
    Route::post('/items', [\App\Http\Controllers\ItemController::class, 'store']);
    Route::get('/mijnprofiel', [\App\Http\Controllers\ItemController::class, 'mijnprofiel']);
    Route::get('/create', [\App\Http\Controllers\ItemController::class, 'create']);
    Route::get('/geleenditem/{id}', [\App\Http\Controllers\ItemController::class, 'lenen']);
    Route::get('/review/{userId}&{itemId}', [\App\Http\Controllers\ReviewController::class, 'review']);
    Route::post('/items/{userId}&{itemId}', [\App\Http\Controllers\ReviewController::class, 'storeReview']);
});

require __DIR__.'/auth.php';
