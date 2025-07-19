<?php

use App\Http\Controllers\store\customer\CustomerAddController;
use App\Http\Controllers\store\customer\CustomerDeleteController;
use App\Http\Controllers\store\customer\CustomerEditController;
use App\Http\Controllers\store\customer\CustomerImportController;
use App\Http\Controllers\store\customer\CustomerLedgerController;
use App\Http\Controllers\store\customer\CustomerListController;
use App\Http\Controllers\store\customer\CustomerStatusController;



Route::get('/add_customer', [CustomerAddController::class, 'customer'])->name('store_customer');
Route::post('/customer-ledger-import',[CustomerLedgerController::class,'customer_ledger_import'])->name('store.customer_ledger_import');
Route::post('/customer_post', [CustomerAddController::class, 'customer_post'])->name('add.customer');
Route::get('/customer_list', [CustomerListController::class, 'customer_list'])->name('store_customer_list');
Route::post('/deletecu', [CustomerDeleteController::class, 'deletecu'])->name('deletecu.store');
Route::post('/customers/import', [CustomerImportController::class, 'import'])->name('customers.import.store');
Route::post('/customer_status', [CustomerStatusController::class, 'customer_status'])->name('customer.status.store');
Route::post('/customer_edit', [CustomerEditController::class, 'editcustomer'])->name('edit.customer.store');
Route::post('/customer_editpost', [CustomerEditController::class, 'customer_edit'])->name('customer_edit.store');