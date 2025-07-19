<?php
/* Admin */
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\catController;
use App\Http\Controllers\ClosingController;
use App\Http\Controllers\CoresettingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerLedgerUploadController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemsController;

use App\Http\Controllers\MakepaymentController;
use App\Http\Controllers\NewitemController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\QrviewController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SaleExtimateController;
use App\Http\Controllers\SalePurchaseOrderController;
use App\Http\Controllers\SalereturnController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\store\DashController;
use App\Http\Controllers\store\Store_advancedController;
use App\Http\Controllers\store\Store_brandController;
use App\Http\Controllers\store\Store_categoryController;
use App\Http\Controllers\store\Store_customerController;
use App\Http\Controllers\store\Store_expenseController;
use App\Http\Controllers\store\Store_ItemController;
use App\Http\Controllers\store\Store_purchaseController;
use App\Http\Controllers\store\Store_salesController;
use App\Http\Controllers\store\Store_settings;
use App\Http\Controllers\store\Store_supplierController;
use App\Http\Controllers\store\Store_userController;
use App\Http\Controllers\store\Store_wareController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoresettingController;
use App\Http\Controllers\SupplierLedgerUploadController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WarehousrController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SubscriptionController;

use Illuminate\Support\Facades\Route;

require __DIR__ . '/store/store.php';
require __DIR__ . '/admin/admin.php';
require __DIR__. '/supperadmin/super.php';


Route::post('/login', [LoginController::class, 'loginpost'])->name('loginpost');
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/qrview/{id}', [QrviewController::class, 'qrview'])->name('qrview');
Route::get('/store_itemsscan/{id}', [QrviewController::class, 'store_itemsscan'])->name('store_itemsscan');
Route::get('/get-serials', [PurchaseController::class, 'getSerials'])->name('get.serials');

