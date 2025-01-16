<?php

use App\Http\Controllers\Api\Marketers\ProductController;
use Illuminate\Support\Facades\Route;





// Marketers Routes
// Route::middleware(['auth:sanctum', 'role:marketer'])->prefix('refineries')->group(function () {
    Route::prefix('marketers')->group(function () {

        // Products
        Route::apiResource('products', ProductController::class)
        ->only(['index', 'show']);
    
        // Purchases
        // Route::get('purchases', [RefineryPurchaseController::class, 'index']);
        // Route::get('purchases/{purchase}', [RefineryPurchaseController::class, 'show']);
        
    });
