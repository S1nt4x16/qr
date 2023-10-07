<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportController;


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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/store', [MainController::class, 'store'])->name('store');

Route::get('/login', [AuthController::class, 'formLogin'])->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth'])->group(function () 
{
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('report-presensi')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('report');
        Route::get('/excelexport', [ReportController::class, 'excelexport'])->name('excelexport');
        Route::delete('/delete', [ReportController::class, 'delete'])->name('deleteall');
    });

    Route::prefix('qr-generator')->group(function () {
        Route::get('/', [QrController::class, 'index'])->name('qr-generator');
        Route::get('/download-pdf/{id}', [QrController::class, 'downloadpdf']);
    });

    Route::prefix('create-anggota')->group(function () {
        Route::get('/', [QrController::class, 'create'])->name('create-anggota');
        Route::post('/store', [QrController::class, 'store'])->name('create-anggotaa');
        Route::get('/edit/{id}', [QrController::class, 'edit'])->name('edit-anggota');
        Route::post('/update', [QrController::class, 'update'])->name('update-anggota');
    });

});