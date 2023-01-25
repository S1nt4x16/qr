<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QrController;
use App\Http\Controllers\MainController;

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

Route::get('/qr-generator', [QrController::class, 'index'])->name('qr-generator');
Route::get('/', [MainController::class, 'index'])->name('home');
Route::post('/validasi', [MainController::class, 'validasi'])->name('validasi');
Route::post('/store', [MainController::class, 'store'])->name('store');