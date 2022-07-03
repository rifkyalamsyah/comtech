<?php

use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\A_DashboardController;
use App\Http\Controllers\A_BarangController;
use App\Http\Controllers\A_PenggunaController;
use App\Http\Controllers\A_ProfileController;

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

//logout
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
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

//profile
Route::get('admin/profile', [A_ProfileController::class, 'index']);
Route::post('admin/profile', [A_ProfileController::class, 'update']);

// Dashboard
Route::get('admin/dashboard', [A_DashboardController::class, 'index'])->name('adminDashboard')->middleware('isAdmin');


//Pengguna (Admin)
Route::get('admin/list-admin', [A_PenggunaController::class, 'admin'])->name('admin');;
Route::get('admin/tambah-admin', [A_PenggunaController::class, 'tambah_admin'])->name('admin');
Route::post('admin/tambah-admin', [A_PenggunaController::class, 'add_admin'])->name('admin');
Route::get('admin/list-admin/{id}', [A_PenggunaController::class, 'edit_admin'])->name('admin');
Route::post('admin/list-admin/{id}', [A_PenggunaController::class, 'update_admin']);
Route::delete('admin/list-admin/{id}', [A_PenggunaController::class, 'delete_admin']);

//Pengguna (Member)
Route::get('admin/list-member', [A_PenggunaController::class, 'member'])->name('member');
Route::delete('admin/list-member/{id}', [A_PenggunaController::class, 'delete_member']);


//Barang
Route::get('admin/tambah-barang', [A_BarangController::class, 'create'])->name('barang');
Route::post('admin/tambah-barang', [A_BarangController::class, 'store']);
Route::get('admin/barang', [A_BarangController::class, 'list'])->name('barang');
Route::get('admin/barang/{id}', [A_BarangController::class, 'edit']);
Route::post('admin/barang/{id}', [A_BarangController::class, 'update']);
Route::delete('admin/barang/{id}', [A_BarangController::class, 'delete']);
