<?php

use App\Http\Controllers\store\brand\BrandDeleteController;
use App\Http\Controllers\store\brand\BrandEditController;
use App\Http\Controllers\store\brand\BrandListController;
use App\Http\Controllers\store\brand\BrandPostController;
use App\Http\Controllers\store\brand\BrandStatusController;

Route::get('/brand', [BrandListController::class, 'brand'])->name('store_brand');
Route::post('/deletebrand', [BrandDeleteController::class, 'deletebrand'])->name('store_deletebrand');
Route::post('/brandstatusupdate', [BrandStatusController::class, 'updateStatus_brand'])->name('store_updateStatus.brand');
Route::post('/brandpost', [BrandPostController::class, 'brandpost'])->name('store_brandpost');

Route::post('/brand_update', [BrandEditController::class, 'brand_update'])->name('store_brandupdate');