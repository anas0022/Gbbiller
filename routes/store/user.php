<?php

use App\Http\Controllers\store\Store_userController;
use App\Http\Controllers\store\user\UserController;
use App\Http\Controllers\store\user\UserDeleteController;
use App\Http\Controllers\store\user\UserEditController;
use App\Http\Controllers\store\user\UserPostController;




Route::post('/edituser', [UserEditController::class, 'edituser'])->name('store_useredit');
Route::post('/useredit', [UserEditController::class, 'useredit'])->name('store_userediting');
Route::post('/useradd', [UserPostController::class, 'useradd'])->name('store_useradd');
Route::get('/Userpost', [UserPostController::class, 'Userpost'])->name('store_Userpost');
Route::post('/deleteuser', [UserDeleteController::class, 'deleteUser'])->name("store_deleteuser");
Route::get('/user_list', [UserController::class, 'userlist'])->name('store_userlist');
