<?php

use App\Http\Controllers\DetailInvoiceController;
use App\Http\Controllers\InvoiceApiController;
use App\Http\Controllers\InvoiceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/invoices', InvoiceController::class);
Route::resource('/detail-invoice', DetailInvoiceController::class);
Route::resource('/invoices-api', InvoiceApiController::class);
