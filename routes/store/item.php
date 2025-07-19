<?php


use App\Http\Controllers\store\item\ItemBulckController;
use App\Http\Controllers\store\item\ItemDeleteController;
use App\Http\Controllers\store\item\ItemEditController;
use App\Http\Controllers\store\item\ItemListController;
use App\Http\Controllers\store\item\ItemNewController;
use App\Http\Controllers\store\item\ItemStatusController;


Route::get('/new_item', [ItemNewController::class, 'new_item'])->name('store_new_item');
Route::post('/item_post', [ItemNewController::class, 'item_post'])->name('store_item_post');
Route::get('/itemlist', [ItemListController::class, 'itemlist'])->name('store_itemlist');
Route::post('/itemstatus', [ItemStatusController::class, 'itemstatus'])->name('store_updateStatus.items');
Route::post('/itemedit', [ItemEditController::class, 'edititem'])->name('store_edit.item');
Route::post('/item_editpost', [ItemEditController::class, 'item_edit'])->name('Store_item_edit');
Route::post('/deleteitem', [ItemDeleteController::class, 'deleteitem'])->name('store_deleteitem');
Route::post('/item_bulkpost', [ItemBulckController::class, 'item_bulkpost'])->name('item_bulkpost');
