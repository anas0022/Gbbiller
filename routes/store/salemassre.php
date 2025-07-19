<?php

use App\Http\Controllers\store\sale\SaleMassReController;

Route::get('/salereturn_lists',[SaleMassReController::class,'salereturn_list_store'])->name('salereturn_list.store');
Route::get('/sale-return-mass',[SaleMassReController::class,'salereturn_store'])->name('Sale.return.mass.store');
Route::get('/get-customers-by-stores', [SaleMassReController::class, 'getCustomersByStore_store'])->name('get.customers.by.store.in');
Route::get('/get-prefix-by-customers', [SaleMassReController::class, 'getPrefixByCustomer_store'])->name('get.prefix.by.customer.in');
   
Route::get('/get-sale-items-store', [SaleMassReController::class, 'getSaleItems_store'])->name('get.sale.items.store');
Route::post('/return-sale-mass',[SaleMassReController::class,'return_sale_mass_store'])->name('return.sale.mass.store');