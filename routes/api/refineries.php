<?php

use App\Http\Controllers\Api\Refineries\ProductController;
use Illuminate\Support\Facades\Route;



// Refinery Routes
// Route::middleware(['auth:sanctum', 'role:refinery'])->prefix('refineries')->group(function () {
Route::prefix('refineries')->group(function () {

    // Products
    Route::apiResource('products', ProductController::class);

    // Purchases
    // Route::get('purchases', [RefineryPurchaseController::class, 'index']);
    // Route::get('purchases/{purchase}', [RefineryPurchaseController::class, 'show']);
    
});