<?php

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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/customer', [App\Http\Controllers\Master\CustomerController::class, 'index'])->name('customer.index');

    Route::get('/supplier', [App\Http\Controllers\Master\SupplierController::class, 'index'])->name('supplier.index');

    Route::get('/material', [App\Http\Controllers\Master\MaterialController::class, 'index'])->name('material.index');

    Route::get('/substance', [App\Http\Controllers\Master\SubstanceController::class, 'index'])->name('substance.index');

    Route::get('/sales-order', [App\Http\Controllers\Transaction\SalesOrderController::class, 'index'])->name('sales.index');
    Route::get('/sales-order/create', [App\Http\Controllers\Transaction\SalesOrderController::class, 'create'])->name('sales.create');
    Route::post('/sales-order/save', [App\Http\Controllers\Transaction\SalesOrderController::class, 'save'])->name('sales.save');
    Route::get('/sales-order/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'edit'])->name('sales.edit');

    Route::get('/sales-order/{id}/detail/create', [App\Http\Controllers\Transaction\SalesOrderController::class, 'createDetail'])->name('sales.detail.create');
    Route::post('/sales-order/detail/save', [App\Http\Controllers\Transaction\SalesOrderController::class, 'saveDetail'])->name('sales.detail.save');
    Route::get('/sales-order/detail/edit/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'editDetail'])->name('sales.detail.edit');

    Route::get('/index-price', [App\Http\Controllers\Transaction\IndexPriceController::class, 'index'])->name('index-price.index');
    Route::post('/index-price/save', [App\Http\Controllers\Transaction\IndexPriceController::class, 'save'])->name('index-price.save');
    Route::get('/get-index-price/{flute}/{substance}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'getIndexPrice']);

    Route::get('/production/todo-list', [App\Http\Controllers\Transaction\ProductionController::class, 'todoList'])->name('production.todo-list.index');
    Route::get('/production/todo-list/detail/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'todoListDetail'])->name('production.todo-list.detail');
    Route::get('/production/todo-list/claim-order/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'claimOrder'])->name('production.todo-list.claim-order');

    Route::get('/production/spk', [App\Http\Controllers\Transaction\ProductionController::class, 'spk'])->name('production.spk.index');
    Route::get('/production/spk/create/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'createSpk'])->name('production.spk.create');
    Route::post('/production/spk/save', [App\Http\Controllers\Transaction\ProductionController::class, 'saveSpk'])->name('production.spk.save');
    Route::get('/production/spk/edit/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'editSpk'])->name('production.spk.edit');
    Route::get('/production/spk/schedule/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'schedule'])->name('production.spk.schedule');
    Route::post('/production/spk/schedule/save', [App\Http\Controllers\Transaction\ProductionController::class, 'scheduleSave'])->name('production.spk.schedule.save');
    Route::post('/production/progress-item/save', [App\Http\Controllers\Transaction\ProductionController::class, 'progressItemSave'])->name('production.spk.progress-item.save');
    Route::get('/production/progress-monitoring', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoring'])->name('production.spk.monitoring.index');

    Route::get('/warehouse/delivery', [App\Http\Controllers\Transaction\DeliveryController::class, 'index'])->name('warehouse.delivery.index');
    Route::get('/warehouse/delivery/create', [App\Http\Controllers\Transaction\DeliveryController::class, 'create'])->name('warehouse.delivery.create');
    Route::post('/warehouse/delivery/save', [App\Http\Controllers\Transaction\DeliveryController::class, 'save'])->name('warehouse.delivery.save');
    Route::get('/warehouse/delivery/edit/{id}', [App\Http\Controllers\Transaction\DeliveryController::class, 'edit'])->name('warehouse.delivery.edit');
    Route::post('/warehouse/delivery/detail/save', [App\Http\Controllers\Transaction\DeliveryController::class, 'saveDetail'])->name('warehouse.delivery.detail.save');
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\dashboard\DashboardController::class, 'index'])->name('dashboard');
