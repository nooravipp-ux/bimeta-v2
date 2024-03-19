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
    Route::get('/goods', [App\Http\Controllers\Master\GoodsController::class, 'index'])->name('goods.index');
    Route::get('/goods/create', [App\Http\Controllers\Master\GoodsController::class, 'create'])->name('goods.create');
    Route::post('/goods/save', [App\Http\Controllers\Master\GoodsController::class, 'save'])->name('goods.save');
    Route::get('/goods/{id}', [App\Http\Controllers\Master\GoodsController::class, 'edit'])->name('goods.edit');
    Route::post('/goods/update', [App\Http\Controllers\Master\GoodsController::class, 'update'])->name('goods.update');
    Route::get('/goods/delete/{id}', [App\Http\Controllers\Master\GoodsController::class, 'delete'])->name('goods.delete');

    Route::get('/customer', [App\Http\Controllers\Master\CustomerController::class, 'index'])->name('customer.index');
    Route::post('/customer/save', [App\Http\Controllers\Master\CustomerController::class, 'save'])->name('customer.save');
    Route::get('/customer/{id}', [App\Http\Controllers\Master\CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update', [App\Http\Controllers\Master\CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/delete/{id}', [App\Http\Controllers\Master\CustomerController::class, 'delete'])->name('customer.delete');

    Route::get('/supplier', [App\Http\Controllers\Master\SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/supplier/save', [App\Http\Controllers\Master\SupplierController::class, 'save'])->name('supplier.save');
    Route::get('/supplier/{id}', [App\Http\Controllers\Master\SupplierController::class, 'edit'])->name('supplier.edit');
    Route::post('/supplier/update', [App\Http\Controllers\Master\SupplierController::class, 'update'])->name('supplier.update');
    Route::get('/supplier/delete/{id}', [App\Http\Controllers\Master\SupplierController::class, 'delete'])->name('supplier.delete');

    Route::get('/material', [App\Http\Controllers\Master\MaterialController::class, 'index'])->name('material.index');
    Route::post('/material/save', [App\Http\Controllers\Master\MaterialController::class, 'save'])->name('material.save');
    Route::get('/material/{id}', [App\Http\Controllers\Master\MaterialController::class, 'edit'])->name('material.edit');
    Route::post('/material/update', [App\Http\Controllers\Master\MaterialController::class, 'update'])->name('material.update');
    Route::get('/material/delete/{id}', [App\Http\Controllers\Master\MaterialController::class, 'delete'])->name('material.delete');

    Route::get('/substance', [App\Http\Controllers\Master\SubstanceController::class, 'index'])->name('substance.index');
    Route::post('/substance/save', [App\Http\Controllers\Master\SubstanceController::class, 'save'])->name('substance.save');
    Route::get('/substance/{id}', [App\Http\Controllers\Master\SubstanceController::class, 'edit'])->name('substance.edit');
    Route::post('/substance/update', [App\Http\Controllers\Master\SubstanceController::class, 'update'])->name('substance.update');
    Route::get('/substance/delete/{id}', [App\Http\Controllers\Master\SubstanceController::class, 'delete'])->name('substance.delete');

    Route::get('/sales-order', [App\Http\Controllers\Transaction\SalesOrderController::class, 'index'])->name('sales.index');
    Route::get('/sales-order/create', [App\Http\Controllers\Transaction\SalesOrderController::class, 'create'])->name('sales.create');
    Route::post('/sales-order/save', [App\Http\Controllers\Transaction\SalesOrderController::class, 'save'])->name('sales.save');
    Route::get('/sales-order/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'edit'])->name('sales.edit');

    Route::get('/sales-order/{id}/detail/create', [App\Http\Controllers\Transaction\SalesOrderController::class, 'createDetail'])->name('sales.detail.create');
    Route::post('/sales-order/detail/save', [App\Http\Controllers\Transaction\SalesOrderController::class, 'saveDetail'])->name('sales.detail.save');
    Route::get('/sales-order/detail/edit/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'editDetail'])->name('sales.detail.edit');
    Route::get('/sales-order/detail/delete/{id}', [App\Http\Controllers\Transaction\SalesOrderController::class, 'deleteDetail'])->name('sales.detail.delete');

    Route::get('/index-price', [App\Http\Controllers\Transaction\IndexPriceController::class, 'index'])->name('index-price.index');
    Route::post('/index-price/save', [App\Http\Controllers\Transaction\IndexPriceController::class, 'save'])->name('index-price.save');
    Route::get('/index-price/{id}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'edit'])->name('index-price.edit');
    Route::post('/index-price/update', [App\Http\Controllers\Transaction\IndexPriceController::class, 'update'])->name('index-price.update');
    Route::get('/index-price/delete/{id}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'delete'])->name('index-price.delete');
    Route::get('/get-index-price/{substance}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'getIndexPrice']);
    Route::get('/get-index-substance/{tag}', [App\Http\Controllers\Transaction\IndexPriceController::class, 'getIndexSubstance']);

    Route::get('/production/todo-list', [App\Http\Controllers\Transaction\ProductionController::class, 'todoList'])->name('production.todo-list.index');
    Route::get('/production/todo-list/detail/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'todoListDetail'])->name('production.todo-list.detail');
    Route::get('/production/todo-list/claim-order/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'claimOrder'])->name('production.todo-list.claim-order');

    Route::get('/production/spk', [App\Http\Controllers\Transaction\ProductionController::class, 'spk'])->name('production.spk.index');
    Route::get('/production/spk/create/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'createSpk'])->name('production.spk.create');
    Route::post('/production/spk/save', [App\Http\Controllers\Transaction\ProductionController::class, 'saveSpk'])->name('production.spk.save');
    Route::get('/production/spk/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'editSpk'])->name('production.spk.edit');
    Route::get('/production/spk/schedule/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'schedule'])->name('production.spk.schedule');
    Route::get('/production/spk/mark-as-done/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'markAsDone'])->name('production.spk.mark-as-done');
    Route::post('/production/spk/schedule/save', [App\Http\Controllers\Transaction\ProductionController::class, 'scheduleSave'])->name('production.spk.schedule.save');
    Route::get('/production/spk/print/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'printSpk'])->name('production.spk.print');
    Route::get('/production/spk/search/test', [App\Http\Controllers\Transaction\ProductionController::class, 'search'])->name('production.spk.search');
    
    Route::post('/production/progress-item/save', [App\Http\Controllers\Transaction\ProductionController::class, 'progressItemSave'])->name('production.spk.progress-item.save');
    Route::get('/production/monitoring', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoring'])->name('production.spk.monitoring.index');
    Route::get('/production/monitoring/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoringDetail'])->name('production.spk.monitoring.detail');
    Route::get('/production/monitoring/production-progress/{id}', [App\Http\Controllers\Transaction\ProductionController::class, 'progressProductionUpdate'])->name('production.spk.monitoring.production-progress');
    Route::post('/production/monitoring/production-progress/update', [App\Http\Controllers\Transaction\ProductionController::class, 'progressItemUpdate'])->name('production.spk.monitoring.production-progress.update'); //
    Route::post('/production/monitoring/production-progress/detail/save', [App\Http\Controllers\Transaction\ProductionController::class, 'progressProductionDetailSave'])->name('production.spk.monitoring.production-progress.detail.save');
    Route::get('/production/monitoring/personal-progress/q', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoringPersonalProgress'])->name('production.spk.monitoring.personal-progress');
    Route::post('/production/monitoring/personal-progress/save', [App\Http\Controllers\Transaction\ProductionController::class, 'monitoringPersonalProgressSave'])->name('production.spk.monitoring.personal-progress.save');
    Route::post('/production/monitoring/cor-report-export', [App\Http\Controllers\Transaction\ProductionController::class, 'corReportExport'])->name('production.spk.monitoring.cor.report.export');

    Route::get('/warehouse/shipping', [App\Http\Controllers\Transaction\DeliveryController::class, 'index'])->name('warehouse.delivery.index');
    Route::get('/warehouse/shipping/create', [App\Http\Controllers\Transaction\DeliveryController::class, 'create'])->name('warehouse.delivery.create');
    Route::post('/warehouse/shipping/save', [App\Http\Controllers\Transaction\DeliveryController::class, 'save'])->name('warehouse.delivery.save');
    Route::get('/warehouse/shipping/{id}', [App\Http\Controllers\Transaction\DeliveryController::class, 'edit'])->name('warehouse.delivery.edit');
    Route::post('/warehouse/shipping/detail/save', [App\Http\Controllers\Transaction\DeliveryController::class, 'saveDetail'])->name('warehouse.delivery.detail.save');
    Route::get('/warehouse/shipping/detail/delete/{id}', [App\Http\Controllers\Transaction\DeliveryController::class, 'deleteDetail'])->name('warehouse.delivery.detail.delete');
    Route::get('/warehouse/shipping/print/{id}', [App\Http\Controllers\Transaction\DeliveryController::class, 'print'])->name('warehouse.delivery.print');

    Route::prefix('warehouse')->group(function () {
        Route::prefix('raw-materials')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\RawMaterialController::class, 'index'])->name('warehouse.raw-material.index');
            Route::post('/stock-opname/save', [App\Http\Controllers\Transaction\RawMaterialController::class, 'saveStockOpname'])->name('warehouse.raw-materials.stock-opname.save');
            Route::post('/stock-adjustment/save', [App\Http\Controllers\Transaction\RawMaterialController::class, 'saveStockAdjustment'])->name('warehouse.raw-materials.stock-adjustment.save');
            Route::get('/print-label/{id}', [App\Http\Controllers\Transaction\RawMaterialController::class, 'printLabel'])->name('warehouse.raw-materials.print-label');
        });

        Route::prefix('finish-goods')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\FinishGoodsController::class, 'index'])->name('warehouse.finish-goods.index');
            Route::post('/stock-opname/save', [App\Http\Controllers\Transaction\FinishGoodsController::class, 'saveStockOpname'])->name('warehouse.finish-goods.stock-opname.save');
            Route::post('/stock-adjustment/save', [App\Http\Controllers\Transaction\FinishGoodsController::class, 'saveStockAdjustment'])->name('warehouse.finish-goods.stock-adjustment.save');
            Route::get('/print-label/{id}', [App\Http\Controllers\Transaction\FinishGoodsController::class, 'printLabel'])->name('warehouse.finish-goods.print-label');
        });
    });

    Route::get('/procurement/purchase-order', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'index'])->name('procurement.purchase-order.index');
    Route::get('/procurement/purchase-order/create', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'create'])->name('procurement.purchase-order.create');
    Route::post('/procurement/purchase-order/save', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'save'])->name('procurement.purchase-order.save');
    Route::get('/procurement/purchase-order/{id}', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'edit'])->name('procurement.purchase-order.edit');
    Route::post('/procurement/purchase-order/detail/save', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'saveDetail'])->name('procurement.purchase-order.detail.save');
    Route::get('/procurement/purchase-order/delete/{id}', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'deleteDetail'])->name('procurement.purchase-order.detail.delete');
    Route::get('/procurement/purchase-order/print/{id}', [App\Http\Controllers\Transaction\PurchaseOrderController::class, 'print'])->name('procurement.purchase-order.print');

    Route::get('/procurement/goods-receive', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'index'])->name('procurement.goods-receive.index');
    Route::post('/procurement/goods-receive/save', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'save'])->name('procurement.goods-receive.save');
    Route::get('/procurement/goods-receive/edit/{id}', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'edit'])->name('procurement.goods-receive.edit');
    Route::post('/procurement/goods-receive/detail/save', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'saveDetail'])->name('procurement.goods-receive.detail.save');
    Route::get('/procurement/goods-receive/delete/{id}', [App\Http\Controllers\Transaction\GoodsReceiveController::class, 'deleteDetail'])->name('procurement.goods-receive.detail.delete');

    Route::prefix('finance')->group(function () {
        Route::prefix('invoice')->group(function () {
            Route::get('/', [App\Http\Controllers\Transaction\InvoiceController::class, 'index'])->name('finance.invoice.index');
            Route::post('/save', [App\Http\Controllers\Transaction\InvoiceController::class, 'save'])->name('finance.invoice.save');
            Route::get('/edit/{id}', [App\Http\Controllers\Transaction\InvoiceController::class, 'edit'])->name('finance.invoice.edit');
            Route::get('/print/{id}', [App\Http\Controllers\Transaction\InvoiceController::class, 'print'])->name('finance.invoice.print');

            Route::post('/detail/save', [App\Http\Controllers\Transaction\InvoiceController::class, 'saveDetail'])->name('finance.invoice.detail.save');
            Route::get('/detail/delete/{id}', [App\Http\Controllers\Transaction\InvoiceController::class, 'deleteDetail'])->name('finance.invoice.detail.delete');
        });
    });

    Route::prefix('settings')->group(function () {
        Route::prefix('user-management')->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', [App\Http\Controllers\Transaction\UserManagementController::class, 'index'])->name('settings.user-management.user.index');
            });

            Route::prefix('roles')->group(function () {
                Route::get('/', [App\Http\Controllers\Transaction\RoleController::class, 'index'])->name('settings.user-management.role.index');
                Route::post('/create', [App\Http\Controllers\Transaction\RoleController::class, 'save'])->name('settings.user-management.role.save');
                Route::get('/edit/{id}', [App\Http\Controllers\Transaction\RoleController::class, 'edit'])->name('settings.user-management.role.edit');
                Route::post('/update', [App\Http\Controllers\Transaction\RoleController::class, 'update'])->name('settings.user-management.role.update');
                Route::get('/delete/{id}', [App\Http\Controllers\Transaction\RoleController::class, 'delete'])->name('settings.user-management.role.delete');
            });
        });
    });
});

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');
