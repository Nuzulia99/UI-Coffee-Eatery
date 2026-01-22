<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Daily sales data endpoint for admin dashboard
Route::get('/daily-sales', [ProdukController::class, 'getDailySalesData'])->name('daily-sales');

// Daily sales data endpoint for petugas dashboard
Route::get('/petugas-daily-sales', [ProdukController::class, 'getPetugasDailySalesData'])->name('petugas-daily-sales');

