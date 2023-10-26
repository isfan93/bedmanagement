<?php

use App\Http\Controllers\azaleaController;
use App\Http\Controllers\bedController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\dokterController;
use App\Http\Controllers\pendaftaranController;
use App\Http\Controllers\penjaminController;
use App\Http\Controllers\ppjaController;
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
    return view('welcome');
});

Route::resource('dashboard',dashboardController::class);

Route::resource('master/dokter',dokterController::class);
Route::resource('master/bed',bedController::class);
Route::resource('master/penjamin',penjaminController::class);
Route::resource('master/ppja',ppjaController::class);

Route::resource('pendaftaran',pendaftaranController::class);

Route::resource('azalea',azaleaController::class);
Route::get('azalea/{id}/edit',[azaleaController::class, 'edit']);
Route::get('azalea/{id}/approve', [azaleaController::class, 'approveBooking'])->name('azalea.approveBooking');
// Route::get('azalea-approve/{id}', [azaleaController::class, 'approveBook'])->name('azalea.approveBook');
