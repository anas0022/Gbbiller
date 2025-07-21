<?php

use App\Http\Controllers\auth\ExpiryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\superadmin\subscription\SubMethodController;
use App\Http\Controllers\superadmin\subscription\SubscriptionController;
 use App\Http\Controllers\superadmin\SupperAdminHomeController; 
use App\Http\Controllers\superadmin\UserController;
use App\Http\Controllers\supperadmin\UserEditController;

Route::group(['prefix' => 'supperadmin', 'middleware' => 'auth'], function () {
    Route::get('/supperdash', [SupperAdminHomeController::class, 'home'])->name('supper.home');
    Route::get('/userlist', [UserController::class, 'userlist'])->name('supper.userlist');
    Route::get('/supper-useradd', [UserController::class, 'useradd'])->name('supper.add');
    Route::get('/subcription',[SubscriptionController::class,'subsciptionadd'])->name('subsciptionadd');
    Route::get('/subscription/data', [SubscriptionController::class, 'getSubscriptionData'])->name('subscription.data');
    Route::get('/sub-method',[SubMethodController::class,'method'])->name('method.add');
    Route::post('/method-add', [SubMethodController::class,'method_add'])->name('method.post');
    Route::post('/subcription-post',[SubscriptionController::class,'subsciptionpost'])->name('subsciption.post');
    Route::get('/sub-list', [SubscriptionController::class,'sub_list'])->name('sub.list');
    Route::post('/user-post',[UserController::class,'userpost'])->name('user.post');
    Route::post('/edituser', [UserEditController::class, 'edituser'])->name('super.useredit');
    Route::get('/method/list', [SubMethodController::class, 'methoditem_list'])->name('method.list');
    Route::get('/user/list', [UserController::class, 'userlistget'])->name('user.list');
    Route::get('/method/delete/{id}', [SubMethodController::class, 'methoditem_delete'])->name('method.delete');
    Route::get('/subscription/delete/{id}', [SubscriptionController::class, 'deleteSubscription'])->name('subscription.delete');
    Route::get('/subscription/edit/{id}', [SubscriptionController::class, 'editSubscription'])->name('subscription.edit');
    Route::get('/country/list', [CountryController::class, 'countrylist'])->name('country.list');
    Route::post('/country/post', [CountryController::class, 'countrypost'])->name('country.post');
    Route::get('/countries',[CountryController::class,'countrylistget'])->name('country.list.get');
    Route::get('/country/delete/{id}', [CountryController::class, 'countrydelete'])->name('country.delete');
    //Route::post('/usereditpost', [UserEditController::class,'usereditpost'])->name('edit.post');
    Route::get('/expiry',[ExpiryController::class,'expired'])->name('expired');
    Route::delete('/user-delete/{id}',[UserController::class, 'user_delete'])->name('user.delete');
});