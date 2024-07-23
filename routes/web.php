<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\chambreController;
use App\Http\Controllers\HotelController;
use App\Models\Hotels;
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
    return view('welcome');
});

// Route::get('/login',[AuthController::class, 'login'])
//     ->name('auth.login');
// Route::post('/login',[AuthController::class, 'dologin']);

Route::prefix('/hotel')->name('hotel.')->controller(HotelController::class)->group(function () {
    Route::get('/', 'index')
        ->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{hotel}/edit', 'edit')->name('edit');
    Route::post('/{hotel}/edit', 'update');
    Route::get('/{hotel}/delete', 'delete')->name('delete');
});
