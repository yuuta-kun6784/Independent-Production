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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'itemIndex']);
    Route::get('/itemAdd', [App\Http\Controllers\ItemController::class, 'itemAdd']);
    Route::post('/itemAdd', [App\Http\Controllers\ItemController::class, 'itemAdd']);
});

Route::prefix('types')->group(function () {
    Route::get('/', [App\Http\Controllers\TypeController::class, 'typeIndex']);
    Route::get('/typeAdd', [App\Http\Controllers\TypeController::class, 'typeAdd']);
    Route::post('/typeAdd', [App\Http\Controllers\TypeController::class, 'typeAdd']);
    Route::get('/typeEdit/{id}', [App\Http\Controllers\TypeController::class, 'typeEdit']);
    Route::post('/typeEdit/{id}', [App\Http\Controllers\TypeController::class, 'typeEdit']);
    Route::post('/typeDelete', [App\Http\Controllers\TypeController::class, 'typeDelete']);
});
