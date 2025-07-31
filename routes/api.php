<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource("categories", CategoryController::class);
Route::apiResource("products", ProductController::class);
Route::post("products/export", [ProductController::class, "export"])->name("products.export");
