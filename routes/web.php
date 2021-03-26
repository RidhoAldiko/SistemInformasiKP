<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KonsentrasiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DospemController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\HomeController;

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

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('operator')
    ->middleware(['auth','operator',])
    ->group(function() {
        Route::get('/', [OperatorController::class, 'index'])->name('operator');
        Route::resource('dospem',DospemController::class);
        Route::resource('konsentrasi',KonsentrasiController::class);
});

Route::prefix('mahasiswa')
    ->middleware(['auth','mahasiswa','verified'])
    ->group(function() {
        Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa');
    });

Route::prefix('dosen')
    ->middleware(['auth','dosen','verified'])
    ->group(function() {
        Route::get('/', [DosenController::class, 'index'])->name('dosen');
    });

