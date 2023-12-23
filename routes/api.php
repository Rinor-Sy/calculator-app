<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CalculationsControllerApi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::post('/register',[AuthController::class, 'register']);
    Route::post('/login',[AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/getCalculations', [CalculationsControllerApi::class, 'getUserCalculations']);
    Route::post('/calculate', [CalculationsControllerApi::class, 'calculate']);
    Route::delete('/delete', [CalculationsControllerApi::class, 'delete']);
});
