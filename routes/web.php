<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\ReservationController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function(){
    Route::get('/', [ClinicController::class, 'index'])->name('clinic.index');
    Route::get('/config', [ClinicController::class, 'create'])->name('clinic.create');
    Route::get('/config/confirm', [ClinicController::class, 'confirm'])->name('clinic.confirm');
    Route::post('/', [ClinicController::class, 'store'])->name('clinic.store');
    Route::post('/config/confirm', [ClinicController::class, 'update'])->name('clinic.update');
    Route::get('/reserve', [ClinicController::class, 'reservation'])->name('clinic.reservation');
});

// ゲスト
// 予約可能枠表示
Route::prefix('reservation')->group(function(){
    Route::get('/', [ReservationController::class, 'nopage'])->name('reservation.nopage');
    Route::get('/{id}', [ReservationController::class, 'index'])->name('reservation.index');
    Route::get('/{id}/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/{id}', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/{id}/thanks', [ReservationController::class, 'thanks'])->name('reservation.thanks');
});

require __DIR__.'/auth.php';
