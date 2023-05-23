<?php
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthenticationController;

Route::prefix('v1')->group(function () {
    Route::post('login', [UserAuthenticationController::class, 'login']);
    Route::post('register', [UserAuthenticationController::class, 'register']);
});


Route::prefix('v1')->middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserAuthenticationController::class, 'logout']);
    Route::apiResource('products', ProductsController::class);
});