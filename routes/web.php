<?php

use App\Http\Controllers\CalculationsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/calculator', function () {
    return view('calculator');
})->middleware(['auth', 'verified'])->name('calculator');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/calculator', [CalculationsController::class, 'create'])->name('calculator');
    Route::get('/calculation-history', [CalculationsController::class, 'index'])->name('calculation-history');
    Route::post('/calculate', [CalculationsController::class, 'calculate']);
});

require __DIR__.'/auth.php';
