<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CombinedFormsController;
use App\Http\Controllers\CompanyRegistrationController;
use App\Http\Controllers\StpwController;
use App\Http\Controllers\PencatatanController;
use App\Http\Controllers\LaporanGudangController;


Route::get('/', function () {
    return redirect()->route('login');
});

//Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [CombinedFormsController::class, 'showForms'])->name('home');
    Route::post('/submit', [CompanyRegistrationController::class, 'submitForm'])->name('company.submit');
    Route::get('/companyform', [CompanyRegistrationController::class, 'showForm']);

    // stpw
    Route::get('/stpw', [StpwController::class, 'index'])->name('stpw.index');
    Route::get('/stpw/{id}', [StpwController::class, 'show'])->name('stpw.show');
    Route::get('/stpw/{id}/edit', [StpwController::class, 'edit'])->name('stpw.edit');
    Route::put('/stpw/{id}', [StpwController::class, 'update'])->name('stpw.update');
    Route::delete('/stpw/{id}', [StpwController::class, 'destroy'])->name('stpw.destroy');
    Route::get('/stpwform', [StpwController::class, 'showForm'])->name('stpw.form');
    Route::post('/stpw/submit', [StpwController::class, 'submitForm'])->name('stpw.submit');

    // pencatatan
    Route::get('/pencatatan', [PencatatanController::class, 'index'])->name('pencatatan.index');
    Route::get('/pencatatan/{id}', [PencatatanController::class, 'show'])->name('pencatatan.show');
    Route::get('/pencatatan/{id}/edit', [PencatatanController::class, 'edit'])->name('pencatatan.edit');
    Route::put('/pencatatan/{id}', [PencatatanController::class, 'update'])->name('pencatatan.update');
    Route::delete('/pencatatan/{id}', [PencatatanController::class, 'destroy'])->name('pencatatan.destroy');
    Route::get('/pencatatanform', [PencatatanController::class, 'showForm'])->name('pencatatan.form');
    Route::post('/pencatatan/submit', [PencatatanController::class, 'submitForm'])->name('pencatatan.submit');

    // laporan gudang
    Route::resource('laporan-gudang', LaporanGudangController::class);
    Route::get('/laporan-gudang', [LaporanGudangController::class, 'index'])->name('laporan-gudang.index');
    Route::post('/laporan-gudang', [LaporanGudangController::class, 'store'])->name('laporan-gudang.store');
    Route::get('/laporan-gudang/{id}', [LaporanGudangController::class, 'show'])->name('laporan-gudang.show');


});

Auth::routes(['verify' => true]);

