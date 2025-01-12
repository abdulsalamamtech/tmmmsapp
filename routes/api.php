<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

Route::get('/', function () {
    return [
        'message' => 'Welcome to the API!',
        'documentation_url' => url() . '/docs/api',
        'contact_email' => 'abdulsalamamtech@gmail.com',
        'terms_of_service_url' => URL::current().'terms-of-service',
        'privacy_policy_url' => URL::current().'privacy-policy',
    ];
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


require __DIR__.'/api-auth.php';




// Cloudinary Test Routes
Route::apiResource('test-cloudinary', \App\Http\Controllers\Api\TestCloudinaryController::class);


// // Old Test Routes
// Route::get('test-cloudinary', [\App\Http\Controllers\Api\TestCloudinary::class, 'index']);
// Route::post('test-cloudinary', [\App\Http\Controllers\Api\TestCloudinary::class,'store']);
// Route::delete('test-cloudinary/{asset}', [\App\Http\Controllers\Api\TestCloudinary::class, 'destroy']);
