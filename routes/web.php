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
});