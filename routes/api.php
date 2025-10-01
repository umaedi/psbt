<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/status/user', [Api\TestController::class, 'index']);

//route untuk permohonan izin belajar
Route::prefix('/izin-belajar')->group(function() {
    Route::controller(API\IzinBelajarController::class)->group(function() {
        Route::get('/{user_id}', 'index');
    });
});