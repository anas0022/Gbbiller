<?php

use App\Http\Controllers\store\supplier\SupplierController;
use App\Http\Controllers\store\supplier\SupplierEditController;
use App\Http\Controllers\store\supplier\SupplierListController;

Route::get('/add_supplier', [SupplierController::class, 'add_supplier'])->name('store_add_supplier');
Route::get('/list_suppliers', [SupplierListController::class, 'list_supplier'])->name('store_list_supplier');
Route::post('/deletesuppliers', [SupplierListController::class, 'deletesupplier_store'])->name('deletesupplier.store');
Route::post('/updateStatus_suppliers', [SupplierListController::class, 'updateStatus_supplier_store'])->name('updateStatus.supplier.store');
Route::post('/edit_supplier', [SupplierEditController::class, 'edit_supplier'])->name('store_edit.supplier');
Route::post('/edit_supplierpost', [SupplierEditController::class, 'edit_supplierpost'])->name('store_edit.supplierpost');
Route::post('/supplier/import', [SupplierEditController::class, 'supplier_import_store'])->name('supplier.import.store');
Route::post('/supplier-post', [SupplierController::class, 'supplier_post_store'])->name('store_add.su');