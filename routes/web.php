<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\pamController;
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
Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda.index');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/show/{berita}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/review', [ReviewController::class, 'input'])->name(name: 'review.input');
Route::post('/review/input', [ReviewController::class, 'stores'])->name('review.stores');
Route::get('/foto', [GaleriController::class, 'foto'])->name('galeri.foto');
Route::get('/vidio', [GaleriController::class, 'vidio'])->name('galeri.vidio');

Route::middleware(['auth'])->group(function () {
    Route::resource('berandas',BerandaController ::class);
    Route::resource('profile',ProfileController ::class);
    Route::resource('beritas',BeritaController ::class);
    Route::resource('kategori_berita',KategoriBeritaController ::class);
    Route::resource('reviews',ReviewController ::class);
    Route::resource('user',UserController ::class);
    Route::resource('galeris',GaleriController ::class);
    Route::resource('profile',ProfileController ::class);
    Route::resource('activity', ActivityController ::class);
    Route::resource('pam',pamController::class);
    Route::post('/profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/change-password/{user}', [ProfileController::class, 'changePassword'])->name('profile.change-password');
});
