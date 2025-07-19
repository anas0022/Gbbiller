<?php

use App\Http\Controllers\store\warehouse\WareController;
use App\Http\Controllers\store\warehouse\WareDeleteController;
use App\Http\Controllers\store\warehouse\WarePostController;
use App\Http\Controllers\store\warehouse\WareStatusController;
use App\Http\Controllers\store\warehouse\WareUpadteController;


Route::get('/warehouse-add', [WareController::class, 'warehouse'])->name('store_ware');
Route::get('/warehouse-list', [WareController::class, 'warelist'])->name('store_warelist');
Route::post('/warehouse-post', [WarePostController::class, 'warepost'])->name('store_warepost');
Route::post('/warehouseupdate', [WareStatusController::class, 'updateStatus'])->name('store_updateStatus');
Route::post('/update-ware', [WareUpadteController::class, 'update_ware'])->name('store_update.ware');
Route::post('/ware_edit', [WareUpadteController::class, 'editware'])->name('store_edit.warehoues');
Route::post('/delete', [WareDeleteController::class, 'deleteware'])->name('store_deleteware');
