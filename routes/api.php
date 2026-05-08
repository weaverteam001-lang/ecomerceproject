<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;

Route::get('Product' , [ProductController::class, 'Product']);
Route::post('Registration' ,[ProductController::class, 'Registration']);