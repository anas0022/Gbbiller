<?php

use App\Http\Controllers\store\sale\SaleEditController;


Route::get('/saleitem_editposts/{id}', [SaleEditController::class, 'saleitem_edit_store'])->name('store_saleitem_edit');
Route::post('/sale-edit-store', [SaleEditController::class, 'sale_edit_store'])->name('sale.edit.store');