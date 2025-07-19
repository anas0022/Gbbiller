<?php

use App\Http\Controllers\SalesController;
use App\Http\Controllers\store\closing\ClosingController;
use App\Http\Controllers\store\DashController;
use App\Http\Controllers\store\invoice\ReturnInvoiceController;
use App\Http\Controllers\store\Invoice\TaxInvoiceController;
use App\Http\Controllers\store\purchase\PurchaseReturnController;
use App\Http\Controllers\store\report\ReportController;
use App\Http\Controllers\store\sale\SaleListController;
use App\Http\Controllers\store\salebill\SalePosController;
use App\Http\Controllers\store\Store_advancedController;
use App\Http\Controllers\store\Store_brandController;
use App\Http\Controllers\store\Store_categoryController;
use App\Http\Controllers\store\Store_customerController;
use App\Http\Controllers\store\Store_expenseController;
use App\Http\Controllers\store\Store_ItemController;
use App\Http\Controllers\store\Store_purchaseController;
use App\Http\Controllers\store\Store_salesController;
use App\Http\Controllers\store\Store_settings;
use App\Http\Controllers\store\Store_supplierController;





Route::group(['prefix' => 'store', 'middleware' => 'auth'], function () {

    require __DIR__ . '/warehouse.php';
    require __DIR__ . '/makepayment.php';
    require __DIR__ . '/reciept.php';
    require __DIR__ . '/item.php';
    require __DIR__ . '/user.php';
    require __DIR__ . '/category.php';
    require __DIR__ . '/salepos.php';
    require __DIR__ . '/brand.php';
    require __DIR__ . '/customer.php';
    require __DIR__ .'/purchase.php';
    require __DIR__ . '/saleedit.php';
    require __DIR__ . '/salemassre.php';
    require __DIR__ . '/supplier.php';
    require __DIR__ . '/estimate.php';
    Route::get('/dasboard', [DashController::class, 'dashboard'])->name('store.dash');
    Route::get('add_sales', [Store_salesController::class, 'sales_add'])->name('sales_add');
    Route::put('/customer_address', [Store_salesController::class, 'customer_address'])->name('customer.address');
    Route::put('/customer_gst', [Store_salesController::class, 'customer_gst'])->name('customer.gst');
    Route::post('/sale_edit', [Store_salesController::class, 'customer_gst'])->name('customer_gst');
    Route::put('/customer_mobile', [Store_salesController::class, 'customer_mobile'])->name('customer.mobile');
    Route::put('/customer_email', [Store_salesController::class, 'customer_email'])->name('customer.email');
    Route::put('/part_noedit', [Store_salesController::class, 'part_noedit'])->name('part.noedit');
    Route::put('/alt_qtywdit', [Store_salesController::class, 'alt_qtywdit'])->name('alt.qtywdit');

    Route::get('/salescode', [Store_salesController::class, 'salescode'])->name('salescode');
 

    Route::post('/addsale', [Store_salesController::class, 'addsale'])->name('store_addsale');
    Route::get('/find-customer', [Store_salesController::class, 'findCustomer'])->name('findCustomer');
    Route::get('/sales_list', [Store_SalesController::class, 'saleslist'])->name('store_saleslist');
    Route::get('/saleitem_editpost/{id}', [Store_salesController::class, 'saleitem_edit'])->name('saleitem_edit');

    Route::get('/invoice-sale-view/{id}/{sale_type}/{sale_id}', [ReturnInvoiceController::class, 'invoice_sale_view_store'])->name('invoice_sale.view.store');

    Route::get('/salescode', [SalePosController::class, 'salescode_store'])->name('salescode.store');
    Route::get('/purchase-return-list',[PurchaseReturnController::class,'purchase_return_list'])->name('purchase.return.list.store');
    Route::get('/invoice-sale-main/{id}/{sale_type}/', [TaxInvoiceController::class, 'invoice_sale_main_store'])->name('invoice_sale.main.store');
    Route::get('/sales_list', [SaleListController::class, 'saleslist_store'])->name('saleslist.store');
    Route::post('/addsale', [SalePosController::class, 'addsale_store'])->name('addsale.store');
   
    
   
    Route::post('/updateStatus_supplier', [Store_supplierController::class, 'updateStatus_supplier'])->name('store_updateStatus.supplier');
    Route::post('/deletesupplier', [Store_supplierController::class, 'deletesupplier'])->name('store_deletesupplier');
   
    Route::get('/advanceadd', [Store_advancedController::class, 'advanceadd'])->name('store_advanceadd');
    Route::post('/advancepost', [Store_advancedController::class, 'advancepost'])->name('store.advancepost');
    Route::get('/advancelist', [Store_advancedController::class, 'advancelist'])->name('store_advancelist');
    Route::post('/deleteadvance', [Store_advancedController::class, 'deleteadvance'])->name('store.deleteadvance');
    Route::post('/edit_advance', [Store_advancedController::class, 'edit_advance'])->name('store_edit.advance');
    Route::post('/aadvanceedit', [Store_advancedController::class, 'aadvanceedit'])->name('store_aadvanceedit');
 

    Route::get('/purchasecode', [Store_purchaseController::class, 'purchasecode'])->name('store.purchasecode');

  
    Route::get('/invoice-purchase', [Store_purchaseController::class, 'invoice_purchase'])->name('store_invoice_purchase');
 

    
    
   

    

    




    Route::get('/expense', [Store_expenseController::class, 'expense'])->name('store_expense');
    Route::get('expense_add', [Store_expenseController::class, 'expensepost'])->name('store_expensepost');
    Route::post('/addexpense', [Store_expenseController::class, 'addexpense'])->name('store_addexpense');
    Route::get('/expense_list', [Store_expenseController::class, 'expense_list'])->name('store_expense_list');
    Route::get('/expense_cat', [Store_expenseController::class, 'expense_category'])->name('store_expense.category');
    Route::post('/excategory_post', [Store_expenseController::class, 'excategory_post'])->name('store_excategory.post');
    Route::post('/excategory_delete', [Store_expenseController::class, 'excategory_delete'])->name('store_excategory.delete');
    Route::post('/excategory_edit', [Store_expenseController::class, 'excategory_edit'])->name('store_excategory.edit');
    Route::get('/store_settings', [Store_settings::class, 'store_setting'])->name('store.store_settings');
    Route::post('/storepost', [Store_settings::class, 'storepost'])->name('store_storepost');
    
    







    Route::get('/report',[DashController::class,'report'])->name('report.store');
    Route::get('/expencesum',[DashController::class,'expencesum'])->name('expencesum.store');
    Route::get('/advancesum',[DashController::class,'advancesum'])->name('advancesum');
    Route::get('/customercountall',[DashController::class,'customercountall'])->name('customercountall.store');
    Route::get('/suppliercount',[DashController::class,'suppliercount'])->name('suppliercount.store');
    Route::get('/salecountall',[DashController::class,'salecountall'])->name('salecountall.store');
    Route::get('/purchasecount',[DashController::class,'purchasecountall'])->name('purchasecountall.store');
    Route::get('/monthly-report-store', [DashController::class, 'monthlyReport.store']);
    Route::get('/admin/report/{period}', [DashController::class, 'getReportData']);
    Route::get('expenseall',[DashController::class,'expenseall'])->name('expenseall.store');
    Route::get('/reportall',[DashController::class,'reportall'])->name('reportall.store');
    Route::get('/salecount',[DashController::class,'salecount'])->name('salecount.store');
    Route::get('/suppliercountall',[DashController::class,'suppliercountall'])->name('suppliercountall.store');
    Route::get('/customercount',[DashController::class,'customercount'])->name('customercount.store');
    Route::get('/purchasecountall',[DashController::class,'purchasecount'])->name('purchasecount.store');
    Route::get('/purchaseweekcount',[DashController::class,'purchaseweekcount'])->name('purchaseweekcount.store');
    Route::get( '/saleweekcount',[DashController::class,'saleweekcount'])->name('saleweekcount.store');
    Route::get('/supplierweekcount',[DashController::class,'supplierweekcount'])->name('supplierweekcount.store');
    Route::get('/customerweekcount',[DashController::class,'customerweekcount'])->name('customerweekcount.store');
    Route::get('/saleweeksum',[DashController::class,'saleweeksum'])->name('saleweeksum.store');
    Route::get('/expenceweeksum',[DashController::class,'expenceweeksum'])->name('expenceweeksum.store');
    Route::get('/expenseMonthlySum',[DashController::class,'expenseMonthlySum'])->name('expenseMonthlySum.store');
    Route::get('/saleMonthlySum',[DashController::class,'saleMonthlySum'])->name('saleMonthlySum.store');
    Route::get('/customerMonthlycount',[DashController::class,'customerMonthlycount'])->name('customerMonthlycount.store');
    Route::get('/supplierMonthlycount',[DashController::class,'supplierMonthlycount'])->name('supplierMonthlycount.store');
    Route::get('/purchaseMonthlycount',[DashController::class,'purchaseMonthlycount'])->name('purchaseMonthlycount.store');
    Route::get('/saleMonthlycount',[DashController::class,'saleMonthlycount'])->name('saleMonthlycount.store');
    Route::get('/expenseYearlySum',[DashController::class,'expenseYearlySum'])->name('expenseYearlySum.store');
    Route::get('/saleYearlySum',[DashController::class,'saleYearlySum'])->name('saleYearlySum.store');
    Route::get('/saleYearlycount',[DashController::class,'saleYearlycount'])->name('saleYearlycount.store');
    Route::get('/purchaseYearlycount',[DashController::class,'purchaseYearlycount'])->name('purchaseYearlycount.store');
    Route::get('/customerYearlycount',[DashController::class,'customerYearlycount'])->name('customerYearlycount.store');
    Route::get('/supllierYearlycount',[DashController::class,'suplierYearlycount'])->name('suplierYearlycount.store');
    Route::get('/recentitem',[DashController::class,'recentitem'])->name('recentitem.store');
    Route::get('/stockalertitem',[DashController::class,'stockalertitem'])->name('stockalertitem.store');
    Route::get('/api/items',[DashController::class,'trendingsale'])->name('trendingsale.store');
    Route::get('/salelatest',[DashController::class,'salelatest'])->name('salelatest.store');
    Route::get('/salesreport', [ReportController::class, 'salesreport'])->name('salesreport.store');
    Route::get('/purchasereport',[ReportController::class,'purchasereport'])->name('purchasereport.store');
    Route::get('/ledger-report',[ReportController::class,'ledgerreport'])->name('ledgerreport.store');
    Route::get('closing-list',[ClosingController::class,'closing_list'])->name('closing.list.store');
    Route::get('/get-customers-by-store', [ReportController::class, 'getCustomersByStore'])->name('get.customers.by.store.store');
    Route::get('/get-sales-by-customer', [ReportController::class, 'getSalesByCustomer'])->name('get.sales.by.customer.store');
    Route::get('/getPurchaseByCustomer', [ReportController::class,'getPurchaseByCustomer'])->name('getPurchaseByCustomer.store');
    Route::get('/daily-closing',[ClosingController::class,'daily_closing'])->name('daily.closing.store');
 
});