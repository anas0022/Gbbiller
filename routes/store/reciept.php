<?php

use App\Http\Controllers\store\Resiept\RecieptController;

Route::get('/receipt/view/{id}', [RecieptController::class, 'view_receipt_bill'])->name('reciept.view.store');
Route::get('/view_receipt/{id}',[RecieptController::class,'view_receipt'])->name('view_receipt.store');
Route::get('/receiptes/view/{id}/{amount}', [RecieptController::class, 'view_receipt_bill_store'])->name('reciept.view.bill.store');