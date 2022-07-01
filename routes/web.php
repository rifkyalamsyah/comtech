<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Auth::routes();

// home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pesan/{id}', [PesanController::class, 'index']);

// pesan barang
Route::post('pesan/{id}', [PesanController::class, 'pesan']);

// Check out
Route::get('check-out', [PesanController::class, 'check_out']);
Route::delete('check-out/{id}', [PesanController::class, 'delete']);

// Konfirmasi check out
Route::get('konfirmasi-check-out', [PesanController::class, 'konfirmasi']);

// Profile
Route::get('profile', [ProfileController::class, 'index']);
// update profile
Route::post('profile', [ProfileController::class, 'update']);

// history
Route::get('history', [HistoryController::class, 'index']);
// detail history
Route::get('history/{id}', [HistoryController::class, 'detail']);
