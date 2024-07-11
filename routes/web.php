<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HitungController;


// Route::get('/dashboard', function () {
//     return view ('layouts.master');
// });

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');


    // Login - Register
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');
    Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
    Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');
    Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
    Route::post('/validasi-forgot-password-act', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

    //Dashboard
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    //Kriteria
    Route::get('/datakriteria', [HomeController::class, 'user'])->name('user');
    Route::get('/create', [HomeController::class, 'create'])->name('user.craete');
    Route::post('/store', [HomeController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');

    // Alternatif
    Route::get('/dataalt', [HomeController::class, 'user1'])->name('user1');
    Route::get('/createalt', [HomeController::class, 'create1'])->name('user.craete1');
    Route::post('/storealt', [HomeController::class, 'store1'])->name('user.store1');
    Route::get('/editalt/{id}', [HomeController::class, 'editalt'])->name('user.editalt');
    Route::put('/updatealt/{id}', [HomeController::class, 'updatealt'])->name('user.updatealt');
    Route::delete('/deletealt/{id}', [HomeController::class, 'deletealt'])->name('user.deletealt');

    // Sub Kriteria
    Route::get('/datasub', [HomeController::class, 'sub'])->name('sub');
    Route::get('/createsubc1', [HomeController::class, 'createsubc1'])->name('user.craetesubc1');
    Route::post('/storesubc1', [HomeController::class, 'storesubc1'])->name('user.storesubc1');
    Route::get('/editc1/{id}', [HomeController::class, 'editc1'])->name('user.editc1');
    Route::put('/updatec1/{id}', [HomeController::class, 'updatec1'])->name('user.updatec1');
    Route::delete('/deletec1/{id}', [HomeController::class, 'deletec1'])->name('user.deletec1');
    Route::get('/createsubc2', [HomeController::class, 'createsubc2'])->name('user.craetesubc2');
    Route::post('/storesubc2', [HomeController::class, 'storesubc2'])->name('user.storesubc2');
    Route::get('/editc2/{id}', [HomeController::class, 'editc2'])->name('user.editc2');
    Route::put('/updatec2/{id}', [HomeController::class, 'updatec2'])->name('user.updatec2');
    Route::delete('/deletec2/{id}', [HomeController::class, 'deletec2'])->name('user.deletec2');
    Route::get('/createsubc3', [HomeController::class, 'createsubc3'])->name('user.craetesubc3');
    Route::post('/storesubc3', [HomeController::class, 'storesubc3'])->name('user.storesubc3');
    Route::get('/editc3/{id}', [HomeController::class, 'editc3'])->name('user.editc3');
    Route::put('/updatec3/{id}', [HomeController::class, 'updatec3'])->name('user.updatec3');
    Route::delete('/deletec3/{id}', [HomeController::class, 'deletec3'])->name('user.deletec3');
    Route::get('/createsubc4', [HomeController::class, 'createsubc4'])->name('user.craetesubc4');
    Route::post('/storesubc4', [HomeController::class, 'storesubc4'])->name('user.storesubc4');
    Route::get('/editc4/{id}', [HomeController::class, 'editc4'])->name('user.editc4');
    Route::put('/updatec4/{id}', [HomeController::class, 'updatec4'])->name('user.updatec4');
    Route::delete('/deletec4/{id}', [HomeController::class, 'deletec4'])->name('user.deletec4');
    Route::get('/createsubc5', [HomeController::class, 'createsubc5'])->name('user.craetesubc5');
    Route::post('/storesubc5', [HomeController::class, 'storesubc5'])->name('user.storesubc5');
    Route::get('/editc5/{id}', [HomeController::class, 'editc5'])->name('user.editc5');
    Route::put('/updatec5/{id}', [HomeController::class, 'updatec5'])->name('user.updatec5');
    Route::delete('/deletec5/{id}', [HomeController::class, 'deletec5'])->name('user.deletec5');

    // Perhitungan dan Rangking
    Route::get('/penilaian', [HitungController::class, 'perhitungan'])->name('perhitungan');
    Route::get('/hasilakhir', [HitungController::class, 'hasilakhir'])->name('hasilakhir');
    Route::get('/datauser', [HomeController::class, 'datauser'])->name('datauser');
    Route::get('/dataprofile', [HomeController::class, 'dataprofile'])->name('dataprofile');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('changePassword');
});
