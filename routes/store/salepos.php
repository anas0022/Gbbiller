<?php

use App\Http\Controllers\store\Invoice\TaxInvoiceController;
use App\Http\Controllers\store\sale\SaleListController;
use App\Http\Controllers\store\sale\SaleReturnController;
use App\Http\Controllers\store\salebill\SalePosController;

Route::get('/add-sales-biller', [SalePosController::class, 'add_pos_store'])->name('add_sales_biller.store');

Route::get('/search-items', [SalePosController::class, 'searchItems_store'])->name('search-items.store');
Route::get('/add-item', [SalePosController::class, 'addItem_store'])->name('add-item.store');
Route::get('/sale_return/{id}', [SaleReturnController::class, 'sale_return'])->name('sale.return.store');
Route::post('/return-post', [SaleReturnController::class,'return_post_store'])->name('return_post.store');
