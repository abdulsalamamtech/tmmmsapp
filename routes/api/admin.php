<?php 

use App\Http\Controllers\ProductTypeController;
use Illuminate\Support\Facades\Route;



// Route::middleware(['auth', 'verified'])->group(function () {
Route::prefix('admin')->group(function () {

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    // Product Types Routes
    Route::apiResource('product-types', ProductTypeController::class);

    // Customers Routes
    // Route::apiResource('customers', CustomerController::class);

    // Suppliers Routes
    // Route::apiResource('suppliers', SupplierController::class);

    // Refineries Routes
    // Route::apiResource('refineries', RefineryController::class);

    // Purchases Routes
    // Route::apiResource('purchases', PurchaseController::class);

    // Sales Routes
    // Route::apiResource('sales', SaleController::class);
});







// the id on product type should be removed