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
    Route::get('/dashboard', DashboardController::class);

    //router for izin belajar
    Route::get('/permohonan_izin_belajar', [IzinBelajarController::class, 'index']);
    Route::post('/permohonan_izin_belajar/store', [IzinBelajarController::class, 'store']);
    Route::get('/permohonan_izin_belajar/show', [IzinBelajarController::class, 'show']);
});
