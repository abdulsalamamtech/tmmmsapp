<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return [
        'message' => 'Welcome to the API!',
        'documentation_url' => url('/') . '/docs/api',
        'contact_email' => 'abdulsalamamtech@gmail.com',
        'contact_linkedin' => 'https://linkedin.com/abdulsalamamtech',
        'terms_of_service_url' => URL::current().'terms-of-service',
        'privacy_policy_url' => URL::current().'privacy-policy',
    ];  
});


// Check if user is logged in
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Api auth routes
require __DIR__.'/api-auth.php';

// Refinery routes
require __DIR__. '/api/refineries.php';


// Marketer routes
require __DIR__. '/api/marketers.php';

// Cloudinary Test Routes
Route::apiResource('test-cloudinary', \App\Http\Controllers\Api\TestCloudinaryController::class);


// // Old Test Routes
// Route::get('test-cloudinary', [\App\Http\Controllers\Api\TestCloudinary::class, 'index']);
// Route::post('test-cloudinary', [\App\Http\Controllers\Api\TestCloudinary::class,'store']);
// Route::delete('test-cloudinary/{asset}', [\App\Http\Controllers\Api\TestCloudinary::class, 'destroy']);


require __DIR__.'/api/admin.php';