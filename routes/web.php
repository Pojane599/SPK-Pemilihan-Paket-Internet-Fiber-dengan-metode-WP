<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PembobotanController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerbandinganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RekomendasiController;
use App\Models\Karakter;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/public/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

Route::middleware(['web'])->group(function () {
    Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('login.google');
    Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
    Route::get('/auth/facebook', [AuthController::class, 'redirectToFacebook'])->name('login.facebook');
    Route::get('/auth/facebook/callback', [AuthController::class, 'handleFacebookCallback']);
});

Route::get('/verify-email', [RegisterController::class, 'verifyEmail'])->name('verification.verify');


Route::get('/forgot-password', [PasswordController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [PasswordController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validasi-forgot-password/{token}', [PasswordController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [PasswordController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register-proses', [RegisterController::class, 'register'])->name('register-proses');

Route::post('/admin/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:Administrator'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::get('/admin/kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria');
        Route::post('/admin/kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.store');
        Route::put('/admin/kriteria/update/{column}', [KriteriaController::class, 'update'])->name('kriteria.update');
        Route::delete('/admin/kriteria/delete/{column}', [KriteriaController::class, 'delete'])->name('kriteria.delete');

        Route::get('/admin/alternatif', [AlternatifController::class, 'alternatif'])->name('admin.alternatif');
        Route::post('/admin/alternatif/store', [AlternatifController::class, 'store'])->name('alternatif.store');
        Route::put('/admin/alternatif/update/{produk}', [AlternatifController::class, 'update'])->name('alternatif.update');
        Route::delete('/admin/alternatif/delete/{produk}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');

        Route::get('/admin/pembobotan', [PembobotanController::class, 'index'])->name('admin.pembobotan');
        Route::post('/admin/pembobotan/store', [PembobotanController::class, 'store'])->name('pembobotan.store');
        Route::put('/admin/pembobotan/update/{bobot}', [PembobotanController::class, 'update'])->name('pembobotan.update');
        Route::delete('/admin/pembobotan/delete/{bobot}', [PembobotanController::class, 'destroy'])->name('pembobotan.destroy');

        Route::get('/admin/penilaian', [PenilaianController::class, 'index'])->name('admin.penilaian');
        Route::post('/admin/penilaian/store', [PenilaianController::class, 'store'])->name('penilaian.store');
        Route::put('/admin/penilaian/update/{produk}', [PenilaianController::class, 'update'])->name('penilaian.update');
        Route::delete('/admin/penilaian/delete/{produk}', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');

        Route::get('/admin/pesan/{status}', [MessageController::class, 'index'])->name('admin.pesan');
        Route::get('/admin/read-mail/{id_message}/{previous_status}', [MessageController::class, 'readMail'])->name('read-mail');
        Route::put('/admin/pesan/delete', [MessageController::class, 'deleteSelected'])->name('pesan.delete.selected');
        Route::post('pesan/{id_message}/update-status', [MessageController::class, 'updateStatus'])->name('pesan.updateStatus');

        Route::get('/admin/akun', [AdminController::class, 'userAll'])->name('admin.akun');
        Route::post('/admin/akun', [AdminController::class, 'store'])->name('akun.store');
        Route::put('/kriteria/update/{id}', [AdminController::class, 'update'])->name('akun.update');
        Route::delete('/kriteria/delete/{id}', [AdminController::class, 'destroy'])->name('akun.delete');

    });

    Route::middleware(['role:User'])->group(function () {
        Route::get('/user/home', [UserController::class, 'home'])->name('user.home');
        Route::get('/user/provider', [UserController::class, 'provider'])->name('user.provider');
        Route::get('/user/rekomendasi', [UserController::class, 'rekomendasi'])->name('user.rekomendasi');
        Route::post('/user/rekomendasi/add', [UserController::class, 'addProduk'])->name('user.addProduk');
        Route::delete('/user/rekomendasi/delete/{produkID}', [UserController::class, 'deleteProduk'])->name('user.deleteProduk');
        Route::post('/user/rekomendasi/bobot/addBobot', [UserController::class, 'addData'])->name('user.addData');
        Route::get('/showPerhitunganWP', [UserController::class, 'showPerhitunganWP'])->name('showPerhitunganWP');
        Route::get('/user/pesan', [MessageController::class, 'Message'])->name('user.pesan');
        Route::post('/user/pesan/kirim', [MessageController::class, 'sendMessage'])->name('pesan.kirim');
    });
});
