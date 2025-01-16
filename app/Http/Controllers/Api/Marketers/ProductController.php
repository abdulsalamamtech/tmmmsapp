<?php

namespace App\Http\Controllers\Api\Marketers;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Api\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Marketers: Display a listing of the products.
     */
    public function index()
    {
        // Fetch all product types from the database
        $products = Product::where('status', 'active')->latest()->paginate();
        // Add metadata to the response
        $metadata = $products;
        // Transform the items
        $data = ProductResource::collection($products);
        // Return response
        return ApiResponse::success($data, 'successful', 200, $metadata); 
    }


    /**
     * Marketers: Display a specified product.
     */
    public function show(Product $product)
    {
        $product->load(['productType', 'refinery']);
        $product = new ProductResource($product);
        return ApiResponse::success($product, 'successful');
    }


}
