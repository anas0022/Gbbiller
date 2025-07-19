<?php

use App\Http\Controllers\store\payment\PurchaseMakePaymentController;
use App\Http\Controllers\store\payment\SaleMakePaymentController;


Route::post('/makepayment', [SaleMakePaymentController::class, 'makepayment'])->name('makepayment.sale.store');
Route::post('/makepayment_pur', [PurchaseMakePaymentController::class, 'makepayment_purchase_store'])->name('makepayment.purchase.store');
Route::post('/makepayment', [SaleMakePaymentController::class, 'makepayment_store'])->name('makepayment.store');
