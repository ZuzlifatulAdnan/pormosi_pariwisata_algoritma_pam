<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
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
Route::redirect('/', 'beranda');
Route::get('/beranda', [BerandaController::class, 'index']);
Route::get('/berita', [BeritaController::class, 'index']);
Route::get('/review', [ReviewController::class, 'index']);
Route::get('/review/input', [ReviewController::class, 'create']);
Route::get('/galeri', [BerandaController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    Route::resource('profile',ProfileController ::class);
    Route::resource('berita',BeritaController ::class);
    Route::resource('kategori_berita',KategoriBeritaController ::class);
    Route::resource('review',ReviewController ::class);
    Route::resource('user',UserController ::class);
    Route::resource('galeri',GaleriController ::class);
    Route::resource('profile',ProfileController ::class);
    Route::post('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/change-password/{user}', [ProfileController::class, 'changePassword'])->name('profile.change-password');
});
