<?php

use App\Http\Controllers\store\sale\SaleEstimateController;

Route::get('/salextimate',[SaleEstimateController::class,'salextimate'])->name('salextimate.store');
Route::get('/add_extimate',[SaleEstimateController::class,'add_extimate'])->name('add_extimate.store');
Route::post('/extimate_create',[SaleEstimateController::class,'extimate_create'])->name('extimate_create.store');
Route::get('/  invoice.sale.extimate/{id}/{sale_type}/', [SaleEstimateController::class, 'invoice_sale_extimate'])->name('invoice.sale.extimate.store');
Route::get('/extimate_sale_add/{id}',[SaleEstimateController::class,'extimate_sale_add'])->name('extimate_sale_add.store');
