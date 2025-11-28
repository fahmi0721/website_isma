<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
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

use App\Http\Controllers\FrontController;
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/aspek-hukum', [FrontController::class, 'aspek_hukum'])->name('aspek_hukum');
Route::get('/pemegang-saham', [FrontController::class, 'pemegang_saham'])->name('pemegang_saham');
Route::get('/bisnis-proses', [FrontController::class, 'bisnis_proses'])->name('bisnis_proses');
Route::get('/sebaran-tenaga-kerja', [FrontController::class, 'sebaran_tk'])->name('sebaran_tk');
Route::get('/mitra', [FrontController::class, 'mitra'])->name('mitra');
Route::get('/sertifikat', [FrontController::class, 'sertifikat'])->name('sertifikat');
Route::get('/pembelajaran', [FrontController::class, 'pembelajaran'])->name('pembelajaran');
Route::get('/berita', [FrontController::class, 'berita'])->name('berita');
Route::get('/berita_detail', [FrontController::class, 'berita_detail'])->name('berita_detail');

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaturanUmumController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\GiatController;
use App\Http\Controllers\KontakController;
Route::prefix('admin-isma')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/setting', [PengaturanUmumController::class, 'index'])->name('setting');
        Route::post('/setting/save', [PengaturanUmumController::class, 'store'])->name('setting.save');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/berita', [BeritaController::class, 'index'])->name('admin.berita');
        Route::get('/berita/add', [BeritaController::class, 'create'])->name('admin.berita.create');
        Route::post('/berita/save', [BeritaController::class, 'store'])->name('admin.berita.save');
        Route::post('/berita/upload', [BeritaController::class, 'upload'])->name('admin.berita.upload');
        Route::get('/berita/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
        Route::put('/berita/update/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
        Route::delete('/berita/delete/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/sto', [StrukturController::class, 'index'])->name('admin.sto');
        Route::get('/sto/add', [StrukturController::class, 'create'])->name('admin.sto.create');
        Route::post('/sto/save', [StrukturController::class, 'store'])->name('admin.sto.save');
        Route::post('/sto/upload', [StrukturController::class, 'upload'])->name('admin.sto.upload');
        Route::get('/sto/edit', [StrukturController::class, 'edit'])->name('admin.sto.edit');
        Route::put('/sto/update/{id}', [StrukturController::class, 'update'])->name('admin.sto.update');
        Route::delete('/sto/delete/{id}', [StrukturController::class, 'destroy'])->name('admin.sto.destroy');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/giat', [GiatController::class, 'index'])->name('admin.giat');
        Route::get('/giat/add', [GiatController::class, 'create'])->name('admin.giat.create');
        Route::post('/giat/save', [GiatController::class, 'store'])->name('admin.giat.save');
        Route::post('/giat/upload', [GiatController::class, 'upload'])->name('admin.giat.upload');
        Route::get('/giat/edit', [GiatController::class, 'edit'])->name('admin.giat.edit');
        Route::put('/giat/update/{id}', [GiatController::class, 'update'])->name('admin.giat.update');
        Route::delete('/giat/delete/{id}', [GiatController::class, 'destroy'])->name('admin.giat.destroy');
    });

     Route::group(['middleware' => 'auth'], function () {
        Route::get('/kontak', [KontakController::class, 'index'])->name('admin.kontak');
        Route::get('/kontak/add', [KontakController::class, 'create'])->name('admin.kontak.create');
        Route::post('/kontak/save', [KontakController::class, 'store'])->name('admin.kontak.save');
        Route::post('/kontak/upload', [KontakController::class, 'upload'])->name('admin.kontak.upload');
        Route::get('/kontak/edit', [KontakController::class, 'edit'])->name('admin.kontak.edit');
        Route::put('/kontak/update/{id}', [KontakController::class, 'update'])->name('admin.kontak.update');
        Route::delete('/kontak/delete/{id}', [KontakController::class, 'destroy'])->name('admin.kontak.destroy');
    });
});