<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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

//route for users
Route::middleware('auth')->prefix('user')->group(function () {

    //route for profile
    Route::get('/profile', ProfileController::class);

    //route for ddashboard
    Route::get('/dashboard', DashboardController::class);

    //router for izin belajar
    Route::get('/permohonan_izin_belajar', [IzinBelajarController::class, 'index']);
    Route::get('/permohonan_izin_belajar/create', [IzinBelajarController::class, 'create']);
    Route::post('/permohonan_izin_belajar/store', [IzinBelajarController::class, 'store']);
    Route::get('/permohonan_izin_belajar/show/{id}', [IzinBelajarController::class, 'show']);
    Route::delete('/permohonan_izin_belajar/destroy/{id}', [IzinBelajarController::class, 'destroy']);

    //route for tugas/mutasi
    Route::get('/mutasi', [MutasiController::class, 'index']);
    Route::get('/mutasi/create', [MutasiController::class, 'create']);
    Route::post('/mutasi/create/store', [MutasiController::class, 'store']);
    Route::get('/mutasi/show/{id}', [MutasiController::class, 'show']);
    Route::delete('/mutasi/destroy/{id}', [MutasiController::class, 'destroy']);
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', Admin\DashboardController::class);

    //route for izin belajar
    Route::get('/permohonan_izin_belajar', [Admin\IzinBelajarController::class, 'index']);
    Route::get('/permohonan_izin_belajar/show/{id}', [Admin\IzinBelajarController::class, 'show']);
    Route::put('/permohonan_izin_belajar/update/{id}', [Admin\IzinBelajarController::class, 'update']);

    //route for mutasi
    Route::get('/mutasi', [Admin\MutasiController::class, 'index']);
});
