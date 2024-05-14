<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('customer/import',[CustomerController::class,'index'])->name('customer.index');

Route::post('customer/import',[CustomerController::class,'importExcelData'])->name('customer.importExcelData');

Route::get('customer/export/', [CustomerController::class, 'export']);
