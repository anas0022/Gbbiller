<?php

use App\Http\Controllers\store\category\CategoryDeleteController;
use App\Http\Controllers\store\category\CategoryEditController;
use App\Http\Controllers\store\category\CategoryListController;
use App\Http\Controllers\store\category\CategoryPostController;
use App\Http\Controllers\store\category\CategorySatusController;
use App\Http\Controllers\store\category\CategoryStatusController;

Route::get('/category', [CategoryListController::class, 'category'])->name('store_category');
Route::post('/category_post', [CategoryPostController::class, 'categorypost'])->name('store_category.post');
Route::post('/catstatusupdate', [CategoryStatusController::class, 'updateStatus_cat'])->name('store_updateStatus.cat');
Route::post('/cat_delete', [CategoryDeleteController::class, 'cat_delte'])->name('store_category.delete');
Route::post('/cat_update', [CategoryEditController::class, 'cat_update'])->name('store_category.edit');