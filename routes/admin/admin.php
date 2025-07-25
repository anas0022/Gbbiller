<?php


use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\AdvanceController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\catController;
use App\Http\Controllers\ClosingController;
use App\Http\Controllers\CoresettingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerLedgerUploadController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\LedgerController;

use App\Http\Controllers\MakepaymentController;
use App\Http\Controllers\NewitemController;
use App\Http\Controllers\PayInOutController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\QrviewController;
use App\Http\Controllers\RecieptController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SaleExtimateController;
use App\Http\Controllers\SalePurchaseOrderController;
use App\Http\Controllers\SalereturnController;
use App\Http\Controllers\SecondryController;
use App\Http\Controllers\SerialController;

use App\Http\Controllers\store\DashController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\StoresettingController;
use App\Http\Controllers\SupplierLedgerUploadController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WarehousrController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\SalesController;

/* Now added controller */


use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\settings\SettingsController;

/* now added end */
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

/* Now added items */

    Route::get('/dashboard', [HomeController::class, 'home'])->name('home');
    
    Route::get('/settings', [SettingsController::class, 'home'])->name('setting.home');


    /* THe end  */

    Route::get('/pos', [SalesController::class, 'pos'])->name('pos');
    Route::get('/warehouse_add', [WarehousrController::class, 'warehouse'])->name('ware');
    Route::post('/warehouse_post', [WarehousrController::class, 'warepost'])->name('warepost');
    Route::get('/warehouse_list', [WarehousrController::class, 'warelist'])->name('warelist');
    Route::post('/warehouseupdate', [WarehousrController::class, 'updateStatus'])->name('updateStatus');
    Route::post('/delete', [WarehousrController::class, 'deleteware'])->name('deleteware');
    Route::post('/ware_edit', [WarehousrController::class, 'editware'])->name('edit.warehoues');
    Route::get('/edit_ware', [WarehousrController::class, 'wareedit'])->name('edit');
    Route::post('/update_ware', [WarehousrController::class, 'update_ware'])->name('update.ware');
    Route::get('/download-csv/{rows}', [WarehousrController::class, 'downloadCsv'])->name('download.csv');
    Route::get('/download-excel', [WarehousrController::class, 'downloadExcel'])->name('download.excel');
    Route::get('/admin/download-pdf', [WarehousrController::class, 'downloadPdf'])->name('download.pdf');
    Route::get('/brand', [ItemsController::class, 'brand'])->name('brand');
    Route::post('/brandpost', [ItemsController::class, 'brandpost'])->name('brandpost');
    Route::post('/brandstatusupdate', [ItemsController::class, 'updateStatus_brand'])->name('updateStatus.brand');
    Route::post('/deletebrand', [ItemsController::class, 'deletebrand'])->name('deletebrand');
    Route::post('/brand_edit', [ItemsController::class, 'editbrand'])->name('edit.brand');
    Route::post('/brand_update', [ItemsController::class, 'brand_update'])->name('brandupdate');
    Route::get('/category', [catController::class, 'category'])->name('category');
    Route::post('/category_post', [catController::class, 'categorypost'])->name('category.post');
    Route::post('/catstatusupdate', [catController::class, 'updateStatus_cat'])->name('updateStatus.cat');
    Route::post('/cat_update', [catController::class, 'cat_update'])->name('category.edit'); // For editing an existing category
    Route::post('/cat_delete', [catController::class, 'cat_delte'])->name('category.delete');
    Route::get('/new_item', [NewitemController::class, 'new_item'])->name('new_item');
    Route::get('/tax', [SettingsController::class, 'tax'])->name('tax');
    Route::post('/tax_post', [SettingsController::class, 'tax_post'])->name('taxpost');
    Route::post('/tax_edit', [SettingsController::class, 'tax_edit'])->name('tax.edit');
    Route::post('/tax_delete', [SettingsController::class, 'tax_delete'])->name('deletetax');
    Route::post('/tax_statuschange', [SettingsController::class, 'tax_status'])->name('updateStatus.tax');
    Route::get('/unit', [SettingsController::class, 'unit'])->name('unit');
    Route::post('/unit_post', [SettingsController::class, 'unit_post'])->name('unit.post');
    Route::post('/unit_edit', [SettingsController::class, 'unit_edit'])->name('unit.edit');
    Route::post('/tax_unit', [SettingsController::class, 'unit_status'])->name('updateStatus.unit');
    Route::post('/unit_delete', [SettingsController::class, 'unit_delete'])->name('deleteunit');
    Route::post('/item_post', [NewitemController::class, 'item_post'])->name('item_post');
    Route::get('/itemlist', [NewitemController::class, 'itemlist'])->name('itemlist');
    Route::post('/itemstatus', [NewitemController::class, 'itemstatus'])->name('updateStatus.items');
    Route::post('/itemedit', [NewitemController::class, 'edititem'])->name('edit.item');
    Route::post('/item_editpost', [NewitemController::class, 'item_edit'])->name('item_edit');
    Route::post('/deleteitem', [NewitemController::class, 'deleteitem'])->name('deleteitem');
    Route::get('/add_account', [AccountController::class, 'account'])->name('account');
    Route::get('/list_account', [AccountController::class, 'account_list'])->name('account_list');
    Route::post('/accountpost', [AccountController::class, 'account_post'])->name('account.post');
    Route::post('/accountstatus', [AccountController::class, 'account_status'])->name('account.status');
    Route::get('/add_customer', [CustomerController::class, 'customer'])->name('customer');
    Route::post('/customer_post', [CustomerController::class, 'customer_post'])->name('add.cu.admin');
    Route::get('/customer_list', [CustomerController::class, 'customer_list'])->name('customer_list');
    Route::post('/customer_status', [CustomerController::class, 'customer_status'])->name('customer.status');
    
    Route::post('/customer_editpost', [CustomerController::class, 'customer_edit'])->name('customer_edit');
    Route::post('/editcustomer',[CustomerController::class,'editcustomer'])->name('edit.customer');
    Route::post('/deletecu', [CustomerController::class, 'deletecu'])->name('deletecu');
    Route::get('/add_supplier', [CustomerController::class, 'add_supplier'])->name('add_supplier');
    Route::post('/supplier_post', [CustomerController::class, 'supplier_post'])->name('add.su');
    Route::get('/list_supplier', [CustomerController::class, 'list_supplier'])->name('list_supplier');
    Route::post('/edit_supplier', [CustomerController::class, 'edit_supplier'])->name('edit.supplier');
    Route::post('/edit_supplierpost', [CustomerController::class, 'edit_supplierpost'])->name('edit.supplierpost');
    Route::post('/updateStatus_supplier', [CustomerController::class, 'updateStatus_supplier'])->name('updateStatus.supplier');
    Route::post('/deletesupplier', [CustomerController::class, 'deletesupplier'])->name('deletesupplier');
    Route::get('/advanceadd', [AdvanceController::class, 'advanceadd'])->name('advanceadd');
    Route::post('/advancepost', [AdvanceController::class, 'advancepost'])->name('advancepost');
    Route::get('/advancelist', [AdvanceController::class, 'advancelist'])->name('advancelist');
    Route::post('/status_advance', [AdvanceController::class, 'status_advance'])->name('status.advance');
    Route::post('/edit_advance', [AdvanceController::class, 'edit_advance'])->name('edit.advance');
    Route::post('/aadvanceedit', [AdvanceController::class, 'aadvanceedit'])->name('aadvanceedit');
    Route::post('/deleteadvance', [AdvanceController::class, 'deleteadvance'])->name('deleteadvance');
    Route::get('/adjustment', [AdjustmentController::class, 'adjest'])->name('adjestlist');
    Route::get('/add_adjustment', [AdjustmentController::class, 'addajustment'])->name('addajustment');
    Route::get('/search-items', [PurchaseController::class, 'searchItems'])->name('search-items');
    Route::get('/add-item', [PurchaseController::class, 'addItem'])->name('add-item');
    Route::get('/addItem_return',[SalereturnController::class,'addItem_return'])->name('addItem_return');
    Route::post('/adjust_post', [AdjustmentController::class, 'adjust_post'])->name('adjust.post');
    Route::post('/adjustmentview', [AdjustmentController::class, 'adjustmentview'])->name('adjustmentview');
    Route::post('/delete_adjustment', [AdjustmentController::class, 'delete_adjustment'])->name('delete.adjust');
    Route::get('/transferlist', [AdjustmentController::class, 'transferlist'])->name('transferlist');
    Route::get('/addtransfer', [AdjustmentController::class, 'addtransfer'])->name('addtransfer');
    Route::post('/search-adjust', [AdjustmentController::class, 'searchAdjest'])->name('searchAdjest');
    Route::get('/user_list', [UserController::class, 'userlist'])->name('userlist');
    Route::get('/Userpost', [UserController::class, 'Userpost'])->name('Userpost');
    Route::post('/useradd', [UserController::class, 'useradd'])->name('useradd');
    Route::post('/updateStatususer', [UserController::class, 'updateStatus_user'])->name('updateStatus.user');
    Route::post('/edituser', [UserController::class, 'edituser'])->name('useredit.user');
    Route::post('/useredit', [UserController::class, 'useredit'])->name('useredit');
    Route::post('/deleteuser', [UserController::class, 'deleteuser'])->name("deleteuser");
    Route::get('/expense', [ExpenseController::class, 'expense'])->name('expense');
    Route::get('/expense_cat', [ExpenseController::class, 'expense_category'])->name('expense.category');
    Route::post('/excategory_post', [ExpenseController::class, 'excategory_post'])->name('excategory.post');
    Route::post('/excategory_edit', [ExpenseController::class, 'excategory_edit'])->name('excategory.edit');
    Route::post('/updateStatus_excat', [ExpenseController::class, 'updateStatus_excat'])->name('updateStatus.excat');
    Route::post('/excategory_delete', [ExpenseController::class, 'excategory_delete'])->name('excategory.delete');
    Route::get('expense_add', [ExpenseController::class, 'expensepost'])->name('expensepost');
    Route::post('/addexpense', [ExpenseController::class, 'addexpense'])->name('addexpense');
    Route::post('/expenseedit', [ExpenseController::class, 'expenseedit'])->name('expenseedit');
    Route::post('/expenseedit_post', [ExpenseController::class, 'expenseedit_post'])->name('expenseedit.post');
    Route::post('/expensedelete', [ExpenseController::class, 'expensedelete'])->name('expensedelete');
    Route::get('/new_purchase', [PurchaseController::class, 'new_purchase'])->name('new_purchase');
    Route::get('/purchase_list', [PurchaseController::class, 'purchase_list'])->name('purchase_list');
    Route::get('/purchase_return', [PurchaseController::class, 'purchase_return'])->name('purchase_return');
    Route::get('/salesreport', [ReportsController::class, 'salesreport'])->name('salesreport');
    Route::post('/edit_account', [AccountController::class, 'edit_account'])->name('edit_account');
    Route::post('/acount_edit', [AccountController::class, 'acount_edit'])->name('acount.edit');
    Route::post('/account_delete', [AccountController::class, 'account_delete'])->name('account_delete');
    Route::get('/store', [StoreController::class, 'store'])->name('store');
    Route::get('/store_list', [StoreController::class, 'store_list'])->name('store_list');
    Route::post('/storeadd', [StoreController::class, 'storeadd'])->name('storeadd');
    Route::post('/storeedit', [StoreController::class, 'storeedit'])->name('storeedit');
    Route::post('/editstore', [StoreController::class, 'editstore'])->name('edit.store');
    Route::post('/updateStatus_store', [StoreController::class, 'updateStatus_store'])->name('updateStatus.store');
    Route::post('/store_delete', [StoreController::class, 'store_delete'])->name('store_delete');
    Route::post('/add_purchase', [PurchaseController::class, 'add_purchase'])->name('add_purchase');
    Route::get('/invoice-purchase/{purchase}', [InvoiceController::class, 'invoice_purchase'])->name('invoice_purchase.view');
    Route::get('/add-sales', [SalesController::class, 'add_sales'])->name('add_sales');
    Route::get('/invoice-purchase_return/{purchase}', [InvoiceController::class, 'invoice_purchase_return'])->name('invoice_purchase.return');
    Route::get('/add-sales-biller', [PosController::class, 'add_pos'])->name('add_sales_biller');

    Route::get('/get-tax-details', [SalesController::class, 'getTaxDetails'])->name('get-tax-details');
    Route::post('/addsale', [SalesController::class, 'addsale'])->name('addsale');
    Route::get('/sales_list', [SalesController::class, 'saleslist'])->name('saleslist');
    Route::get('/saleinvoice', [SalesController::class, 'sales_invoice'])->name('saleinvoice');
    Route::get('/invoice-sale', [InvoiceController::class, 'invoice_sale_bill'])->name('invoice_sale.bill');
    Route::get('/country_list', [SettingsController::class, 'country'])->name('country');
    Route::post('/countrysettings_post', [SettingsController::class, 'country_post'])->name('country_post');
    Route::post('/updateStatus_tax', [SettingsController::class, 'updateStatus_tax'])->name('updateStatus.tax');
    Route::post('/deletecountry', [SettingsController::class, 'deletecountry'])->name('deletecountry');
    Route::post('/item_bulkpost', [NewitemController::class, 'item_bulkpost'])->name('item_bulkpost');
    Route::get('/printdemo', [TemplateController::class, 'printdemo'])->name('printdemo');
    Route::post('/printdemopost', [TemplateController::class, 'printdemopost'])->name('printdemopost');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/store_settings', [StoresettingController::class, 'store_settings'])->name('store_settings');
    Route::get('/get-store-name/{id}', [StoreController::class, 'getStoreName'])->name('get-store-name');
    Route::post('/storepost', [StoresettingController::class, 'storepost'])->name('storepost');
    Route::get('/coresettings', [CoresettingsController::class, 'coresetting'])->name('coresetting');
    Route::post('/corepost', [CoresettingsController::class, 'corepost'])->name('corepost');

    Route::get('/find-customer', [CustomerController::class, 'findCustomer'])->name('findCustomer');
    Route::get('/salescode', [SalesController::class, 'salescode'])->name('salescode');
    Route::post('/customers/import', [CustomerController::class, 'import'])->name('customers.import');
    Route::post('/customer-ledger-import',[CustomerLedgerUploadController::class,'customer_ledger_import'])->name('customer_ledger_import');
    Route::post('/supplier/import', [CustomerController::class, 'supplier_import'])->name('supplier.import');
    Route::post('/supplier-ledger-import', [SupplierLedgerUploadController::class, 'supplier_ledger_import'])->name('supplier_ledger_import');
    Route::get('/get-customers', [SalesController::class, 'getCustomers'])->name('getCustomers');
    Route::get('/saleitem_editpost/{id}', [SalesController::class, 'saleitem_edit'])->name('admin_saleitem_edit');
    Route::get('/purchase-return-list',[PurchaseController::class,'purchase_return_list'])->name('purchase.return.list');
    Route::get('/purchase_edit/{id}', [PurchaseController::class, 'purchase_edit'])->name('purchase.edit');
    Route::post('/invoice_customer', [InvoiceController::class, 'invoice_customer'])->name('invoice.customer');
    Route::put('/alt_qtywdit', [SalesController::class, 'alt_qtywdit'])->name('alt.qtywdit');
    Route::put('/part_noedit', [SalesController::class, 'part_noedit'])->name('part.noedit');
    Route::put('/customer_mobile', [SalesController::class, 'customer_mobile'])->name('customer.mobile');
    Route::put('/customer_email', [SalesController::class, 'customer_email'])->name('customer.email');
    Route::put('/customer_address', [SalesController::class, 'customer_address'])->name('customer.address');
    Route::put('/customer_gst', [SalesController::class, 'customer_gst'])->name('customer.gst');
    Route::post('/sale_edit', [SalesController::class, 'sale_edit'])->name('sale.edit');
    Route::get('/data.tables.data', [SalesController::class, 'data_tables_data'])->name('data.tables.data');

    Route::get('/invoice-sale-view/{id}/{sale_type}/{sale_id}', [SalesController::class, 'invoice_sale_view'])->name('invoice_sale.view');
    Route::get('/invoice-sale-main/{id}/{sale_type}/', [SalesController::class, 'invoice_sale_main'])->name('invoice_sale.main');



    Route::post('/billno_exist', [PurchaseController::class, 'billno_exist'])->name('billno_exist');
    Route::get('/purchasecode', [PurchaseController::class, 'purchasecode'])->name('purchasecode');
    Route::post('/makepayment', [MakepaymentController::class, 'makepayment'])->name('makepayment');
    Route::post('/makepayment_pur', [MakepaymentController::class, 'makepayment_purchase'])->name('makepayment.purchase');
    Route::get('/get-suppliers', [CustomerController::class, 'getSuppliers'])->name('get.suppliers');
    Route::post('/edit_purchase', [PurchaseController::class, 'edit_purchase'])->name('edit_purchase');
    Route::post('/sale_edit', [SalesController::class, 'sale_edit'])->name('sale_edit');
    Route::post('/item_delete_salebill', [SalesController::class, 'item_delete_salebill'])->name('item_delete_salebill');
    Route::get('payment_view/{id}', [SalesController::class, 'payment_view'])->name('payment.view');

    Route::get('payment_view_purchase/{id}', [PurchaseController::class, 'payment_view_purchase'])->name('payment.view_purchase');
    Route::get('/sale_return/{id}', [SalesController::class, 'sale_return'])->name('sale.return');
    Route::get('/purchase_return/{id}', [PurchaseController::class, 'purchase_return'])->name('purchase.return');
    Route::post('/return_post', [SalesController::class, 'return_post'])->name('return_post');
    Route::post('/purchase_return_post', [PurchaseController::class, 'purchase_return_post'])->name('purchase.return_post');
    Route::post('/sale_return_update', [SalesController::class, 'sale_return_update'])->name('sale_return_update');
    Route::post('/purchase_return_update', [PurchaseController::class, 'purchase_return_update'])->name('purchase_return_update');
    Route::get('/delete_purchase_row/{id}', [PurchaseController::class, 'delete_purchase_row'])->name('delete_purchase_row');
    Route::get('/sale_return_mass',[SalereturnController::class,'salereturn'])->name('Sale.return.mass');
    Route::get('/get-customers-by-store', [SaleReturnController::class, 'getCustomersByStore'])->name('get.customers.by.store');
    Route::get('/get-bill-by-customer', [SaleReturnController::class, 'getCustomersByStore'])->name('getbillcustomer');
    Route::get('/salextimate',[SaleExtimateController::class,'salextimate'])->name('salextimate');
    Route::get('/add_extimate',[SaleExtimateController::class,'add_extimate'])->name('add_extimate');
    Route::post('/extimate_create',[SaleExtimateController::class,'extimate_create'])->name('extimate_create');
    Route::get('/  invoice.sale.extimate/{id}/{sale_type}/', [InvoiceController::class, 'invoice_sale_extimate'])->name('invoice.sale.extimate');
    Route::get('/extimate_sale_add/{id}',[SaleExtimateController::class,'extimate_sale_add'])->name('extimate_sale_add');
    Route::get('/purchase_order_list',[PurchaseOrderController::class,'purchase_order_list'])->name('purchase_order_list');
    Route::get('/new_purchase_order',[PurchaseOrderController::class,'new_purchase_order'])->name('new_purchase_order');
    Route::post('/add_purchase_order',[PurchaseOrderController::class,'add_purchase_order'])->name('add_purchase_order');
    Route::get('/invoice_purchase_order/{purchase}/',[InvoiceController::class,'invoice_purchase_order'])->name('invoice_purchase.order');
    Route::get('/purchase.add.order/{id}',[PurchaseOrderController::class,'purchase_add_order'])->name('purchase_add_order');
    Route::post('/add_to_purchase_order',[PurchaseOrderController::class,'add_to_purchase_order'])->name('add_to_purchase_order');
    Route::get('/Purchase_order_sale',[SalePurchaseOrderController::class,'Purchase_order_sale'])->name('Purchase_order_sale');
    Route::get('/add_Purchase_order_sale',[SalePurchaseOrderController::class,'add_Purchase_order_sale'])->name('add_Purchase_order_sale');
    Route::post('/create_purchase_order_sale',[SalePurchaseOrderController::class,'create_purchase_order_sale'])->name('create_purchase_order_sale');
    Route::get('/invoice-purchase-sale-item/{id}',[InvoiceController::class,'invoice_purchase_sale'])->name('invoice.purchase.sale');
    Route::get('/create-purchase-order-sale-post/{id}',[SalePurchaseOrderController::class,'create_purchase_order_sale_post'])->name('create_purchase_order_sale_post');
    Route::get('/user-roles',[UserController::class,'userroles'])->name('userroles');
    Route::post('/add-user-role',[UserController::class,'add_user_role'])->name('add_user_role');
    Route::get('salereturn_list',[SalereturnController::class,'salereturn_list'])->name('salereturn_list');
    Route::get('/get-prefix-by-customer', [SalereturnController::class, 'getPrefixByCustomer'])->name('get.prefix.by.customer');
    Route::post('/return-sale-mass',[SalereturnController::class,'return_sale_mass'])->name('return.sale.mass');
   
    Route::get('/get-sale-items', [SalereturnController::class, 'getSaleItems'])->name('get.sale.items');
    Route::get('/daily-closing',[ClosingController::class,'daily_closing'])->name('daily.closing');
    Route::get('/reciept',[RecieptController::class,'reciept'])->name('reciept');
    Route::get('/add_reciept',[RecieptController::class,'add_reciept'])->name('add_reciept');
    Route::post('/reciept_add',[RecieptController::class,'reciept_add'])->name('reciept.add');
    Route::post('/get-customer-prefix', [RecieptController::class, 'getCustomerPrefix'])->name('get.customer.prefix');
    Route::get('/receipt/view/{id}', [RecieptController::class, 'view_receipt'])->name('reciept.view');
    Route::post('/daily-closing-post',[ClosingController::class,'daily_closing_post'])->name('daily.closing.post');
    Route::get('closing/bill/{id}/{store_id}', [ClosingController::class, 'closingBill'])->name('closing.bill');
    Route::get('closing-list',[ClosingController::class,'closing_list'])->name('closing.list');
    Route::get('/add-receipt',[RecieptController::class,'add_receipt'])->name('add.receipt');
    Route::get('/receiptes/view/{id}/{amount}', [RecieptController::class, 'view_receipt_bill'])->name('reciept.view.bill');
    Route::post('/add-reciept-post', [RecieptController::class,'add_recieptppost'])->name('makepayment.bulk');
    Route::post('/makepayment-live',[MakepaymentController::class,'makepayment_live'])->name('makepayment.live');
    Route::get('/report',[HomeController::class,'report'])->name('report');
    Route::get('/expencesum',[HomeController::class,'expencesum'])->name('expencesum');
    Route::get('/advancesum',[HomeController::class,'advancesum'])->name('advancesum');
    Route::get('/customercountall',[HomeController::class,'customercountall'])->name('customercountall');
    Route::get('/suppliercount',[HomeController::class,'suppliercount'])->name('suppliercount');
    Route::get('/salecountall',[HomeController::class,'salecountall'])->name('salecountall');
    Route::get('/purchasecount',[HomeController::class,'purchasecountall'])->name('purchasecountall');
    Route::get('/monthly-report', [HomeController::class, 'monthlyReport']);
    Route::get('/admin/report/{period}', [HomeController::class, 'getReportData']);
    Route::get('expenseall',[HomeController::class,'expenseall'])->name('expenseall');
    Route::get('/reportall',[HomeController::class,'reportall'])->name('reportall');
    Route::get('/salecount',[HomeController::class,'salecount'])->name('salecount');
    Route::get('/suppliercountall',[HomeController::class,'suppliercountall'])->name('suppliercountall');
    Route::get('/customercount',[HomeController::class,'customercount'])->name('customercount');
    Route::get('/purchasecountall',[HomeController::class,'purchasecount'])->name('purchasecount');
    Route::get('/purchaseweekcount',[HomeController::class,'purchaseweekcount'])->name('purchaseweekcount');
    Route::get( '/saleweekcount',[HomeController::class,'saleweekcount'])->name('saleweekcount');
    Route::get('/supplierweekcount',[HomeController::class,'supplierweekcount'])->name('supplierweekcount');
    Route::get('/customerweekcount',[HomeController::class,'customerweekcount'])->name('customerweekcount');
    Route::get('/saleweeksum',[HomeController::class,'saleweeksum'])->name('saleweeksum');
    Route::get('/expenceweeksum',[HomeController::class,'expenceweeksum'])->name('expenceweeksum');
    Route::get('/expenseMonthlySum',[HomeController::class,'expenseMonthlySum'])->name('expenseMonthlySum');
    Route::get('/saleMonthlySum',[HomeController::class,'saleMonthlySum'])->name('saleMonthlySum');
    Route::get('/customerMonthlycount',[HomeController::class,'customerMonthlycount'])->name('customerMonthlycount');
    Route::get('/supplierMonthlycount',[HomeController::class,'supplierMonthlycount'])->name('supplierMonthlycount');
    Route::get('/purchaseMonthlycount',[HomeController::class,'purchaseMonthlycount'])->name('purchaseMonthlycount');
    Route::get('/saleMonthlycount',[HomeController::class,'saleMonthlycount'])->name('saleMonthlycount');
    Route::get('/expenseYearlySum',[HomeController::class,'expenseYearlySum'])->name('expenseYearlySum');
    Route::get('/saleYearlySum',[HomeController::class,'saleYearlySum'])->name('saleYearlySum');
    Route::get('/saleYearlycount',[HomeController::class,'saleYearlycount'])->name('saleYearlycount');
    Route::get('/purchaseYearlycount',[HomeController::class,'purchaseYearlycount'])->name('purchaseYearlycount');
    Route::get('/customerYearlycount',[HomeController::class,'customerYearlycount'])->name('customerYearlycount');
    Route::get('/supllierYearlycount',[HomeController::class,'suplierYearlycount'])->name('suplierYearlycount');
    Route::get('/recentitem',[HomeController::class,'recentitem'])->name('recentitem');
    Route::get('/stockalertitem',[HomeController::class,'stockalertitem'])->name('stockalertitem');
    Route::get('/api/items',[HomeController::class,'trendingsale'])->name('trendingsale');
    Route::get('/salelatest',[HomeController::class,'salelatest'])->name('salelatest');
    Route::get('/ledger-report',[LedgerController::class,'ledgerreport'])->name('ledgerreport');
    Route::get('/purchasereport',[ReportsController::class,'purchasereport'])->name('purchasereport');
    Route::get('/get-ledger-by-customer', [LedgerController::class, 'getLedgerByCustomer'])->name('get.ledger.by.customer');
    Route::get('/get-sales-by-customer', [ReportsController::class, 'getSalesByCustomer'])->name('get.sales.by.customer');
    Route::get('/get-purchase-by-customer', [ReportsController::class, 'getPurchaseByCustomer'])->name('get.purchase.by.customer');
    Route::get('/getsupplierByStore', [ReportsController::class,'getsupplierByStore'])->name('getsupplierByStore');
    Route::get('/getPurchaseByCustomer', [ReportsController::class,'getPurchaseByCustomer'])->name('getPurchaseByCustomer');
    Route::get('/seconderyunit-list',[SecondryController::class,'secondryunitlist'])->name('secondryunitlist');
    Route::post('/slupdate',[ItemsController::class,'slupdate'])->name('slupdate');
    Route::post('/serial', [SerialController::class, 'serialpost'])->name('serial.post');
 
    Route::get('/getSerialNumbers/{id}', [SerialController::class, 'getSerialNumbers'])->name('getSerialNumbers');
    Route::get('/payin',[PayInOutController::class,'payin'])->name('pay.in');
    Route::get('/get-bill', [PayInOutController::class, 'getbill'])->name('get.bill');
});

