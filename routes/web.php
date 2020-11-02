<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GoodsReceiptController;
use App\Http\Controllers\InboundQuotationController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PickingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\PurchaseRequisitionController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\RequestForQuotationContrller;
use App\Http\Controllers\SaleOrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\VendorController;
use App\Http\Livewire\CreateInboundQuotation;
use App\Models\SaleOrder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/index', [MainController::class, 'index']);
Route::get('/mmindex', [MainController::class, 'mmindex']);
Route::get('/sdindex', [MainController::class, 'sdindex']);

Route::get('/vendor/create', [VendorController::class, 'create']);
Route::get('/vendor/{vendor}', [VendorController::class, 'show']);
Route::get('/vendor/{vendor}/edit', [VendorController::class,'edit']);
Route::get('/vendor', [VendorController::class, 'index']);
Route::post('/vendor/store', [VendorController::class, 'store']);
Route::put('/vendor/{vendor}', [VendorController::class,'update']);

Route::get('/productlist', [ProductController::class, 'productlist']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);

Route::get('/employeelist', [EmployeeController::class, 'employeelist']);
Route::get('/employee/create', [EmployeeController::class, 'create']);
Route::post('/employee/store', [EmployeeController::class, 'store']);

Route::get('/pr/create', [PurchaseRequisitionController::class, 'create']);
Route::get('/pr/{pr}', [PurchaseRequisitionController::class, 'show']);
Route::get('/pr', [PurchaseRequisitionController::class, 'index']);
Route::post('/pr/store', [PurchaseRequisitionController::class, 'store']);

Route::get('/rfq/create/{pr}', [RequestForQuotationContrller::class, 'create']);
Route::get('/rfq/{rfq}', [RequestForQuotationContrller::class, 'show']);
Route::get('/rfq', [RequestForQuotationContrller::class, 'index']);
Route::post('/rfq/store/{pr}', [RequestForQuotationContrller::class, 'store']);


// Route::get('/inquotation/create/{rfq}', CreateInboundQuotation::class);

Route::get('/inquotation/create/{rfq}', [InboundQuotationController::class,'create']);
Route::get('/inquotation/{inquotation}', [InboundQuotationController::class,'show']);
Route::get('/inquotation', [InboundQuotationController::class, 'index']);
Route::post('/inquotation/store/{rfq}', [InboundQuotationController::class, 'store']);

Route::get('/po/create/{inquotation}', [PurchaseOrderController::class, 'create']);
Route::get('/po/{po}', [PurchaseOrderController::class,'show']);
Route::get('/po', [PurchaseOrderController::class, 'index']);
Route::post('/po/store/{inquotation}', [PurchaseOrderController::class, 'store']);

Route::get('/gr/create/{po}', [GoodsReceiptController::class, 'create']);
Route::get('/gr/check/{po}', [GoodsReceiptController::class, 'check']);
Route::get('/gr', [GoodsReceiptController::class, 'index']);
Route::get('/gr/{gr}', [GoodsReceiptController::class, 'show']);
Route::post('/gr/store/{po}', [GoodsReceiptController::class, 'store']);

Route::get('/storage/create', [StorageController::class, 'create']);
Route::get('/storage', [StorageController::class, 'index']);
Route::post('/storage/store', [StorageController::class, 'store']);

Route::get('/stock/{storage}', [StockController::class, 'index']);
Route::get('/issuegoods', [StockController::class, 'issuegoods']);
Route::get('/stock/show/{storage}', [StockController::class, 'show']);

Route::get('/customer/create', [CustomerController::class, 'create']);
Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer/store', [CustomerController::class, 'store']);

Route::get('/inquiry/create', [InquiryController::class, 'create']);
Route::get('/inquiry', [InquiryController::class, 'index']);
Route::get('/inquiry/{inquiry}', [InquiryController::class, 'show']);
Route::post('/inquiry/store', [InquiryController::class, 'store']);

Route::get('/quotation/create/{inquiry}', [QuotationController::class, 'create']);
Route::get('/quotation', [QuotationController::class, 'index']);
Route::get('/quotation/{quotation}', [QuotationController::class, 'show']);
Route::post('/quotation/store/{inquiry}', [QuotationController::class, 'store']);

Route::get('/saleorder/create/{quotation}',[SaleOrderController::class, 'create']);
Route::get('/saleorder',[SaleOrderController::class, 'index']);
Route::get('/saleorder/{saleorder}',[SaleOrderController::class, 'show']);
Route::post('/saleorder/store/{quotation}',[SaleOrderController::class, 'store']);

Route::get('/picking/create/{saleorder}',[PickingController::class, 'create']);
Route::get('/picking',[PickingController::class, 'index']);
Route::get('/picking/{picking}',[PickingController::class, 'show']);
Route::post('/picking/store/{saleorder}',[PickingController::class, 'store']);

Route::get('/invoice/create/{saleorder}',[InvoiceController::class, 'create']);
Route::get('/invoice',[InvoiceController::class, 'index']);
Route::get('/invoice/{invoice}',[InvoiceController::class, 'show']);
Route::post('/invoice/store/{saleorder}',[InvoiceController::class, 'store']);


Route::get('/summary', [CompanyController::class, 'index']);
