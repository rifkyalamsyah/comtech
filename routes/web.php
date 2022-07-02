<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\A_DashboardController;
use App\Http\Controllers\A_BarangController;

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

//Admin area -----------------------------------------------------------------------------

// Dashboard
Route::get('admin/dashboard', [A_DashboardController::class, 'index']);

//Barang
Route::get('admin/tambah-barang', [A_BarangController::class, 'create'])->name('barang');
Route::post('admin/tambah-barang', [A_BarangController::class, 'store']);
Route::get('admin/barang', [A_BarangController::class, 'list'])->name('barang');
Route::get('admin/barang/{id}', [A_BarangController::class, 'edit'])->name('edit_barang');
Route::post('admin/barang/{id}', [A_BarangController::class, 'update']);
Route::delete('admin/barang/{id}', [A_BarangController::class, 'delete']);
