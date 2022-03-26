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
    Route::get('/item', [\App\Http\Controllers\ItemController::class, 'index']);
});

Route::get('/movie/{id}', function () {
    Route::get('/item/{id}', [\App\Http\Controllers\ItemController::class, 'show']);
});


