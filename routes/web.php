<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProposalController;
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
//route level operator
Route::prefix('operator')
    ->middleware(['auth','operator',])
    ->group(function() {
        //route dashboard
        Route::get('/', [OperatorController::class, 'index'])->name('operator');
        //route dosen Pembimbing
        Route::resource('dospem',DospemController::class);
        //route konsentrasi
        Route::resource('konsentrasi',KonsentrasiController::class);
        //route data mahasiswa
        Route::get('/data-mahasiswa', [OperatorController::class, 'data_mahasiswa'])->name('data-mahasiswa');
        Route::get('/data-mahasiswa/edit/{email}', [OperatorController::class, 'edit_mahasiswa'])->name('edit-mahasiswa');
        Route::put('/data-mahasiswa/{email}', [OperatorController::class, 'update_mahasiswa'])->name('update-mahasiswa');
        //route proposal
        Route::get('/proposal', [OperatorController::class, 'proposal'])->name('proposal');
        Route::get('/proposal/beri-pembimbing/{id}', [OperatorController::class, 'beri_pembimbing'])->name('beri-pembimbing');
        Route::post('/proposal/beri-pembimbing/{id}/store', [OperatorController::class, 'store_pembimbing'])->name('beri-pembimbing.create');
        Route::get('/proposal/tolak-proposal/{id}/tolak', [OperatorController::class, 'tolak_proposal'])->name('proposal.tolak');
        Route::get('/proposalserverside', [OperatorController::class, 'serverProposal'])->name('operator.serverPro');
        Route::get('/riwayat-proposal', [OperatorController::class, 'riwayat_proposal'])->name('proposal.riwayat');
    });


Route::prefix('mahasiswa')
    ->middleware(['auth','mahasiswa','verified'])
    ->group(function() {
        Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa');
        //Mahasiswa proposal
        Route::resource('proposal',ProposalController::class);

    });

Route::prefix('dosen')
    ->middleware(['auth','dosen','verified'])
    ->group(function() {
        Route::get('/', [DosenController::class, 'index'])->name('dosen');
    });

