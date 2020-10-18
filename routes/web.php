<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InboundQuotationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseRequisitionController;
use App\Http\Controllers\RequestForQuotationContrller;
use App\Http\Controllers\VendorController;
use App\Http\Livewire\CreateInboundQuotation;
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
Route::get('/inquotation', [InboundQuotationController::class, 'index']);
Route::post('/inquotation/store/{rfq}', [InboundQuotationController::class, 'store']);


Route::get('/materialmain', [MaterialController::class, 'materialmain']);
