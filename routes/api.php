<?php

use Illuminate\Http\Request;
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


Route::prefix('v1')->group(function () {
    Route::prefix('production')->group(function () {
        Route::get('/monitoring', [App\Http\Controllers\API\ProductionController::class, 'page'])->name('api.production.monitoring');
    });

    Route::prefix('master')->group(function () {
        Route::get('/supplier', [App\Http\Controllers\API\SupplierController::class, 'page'])->name('api.master.supplier');
    });
});
