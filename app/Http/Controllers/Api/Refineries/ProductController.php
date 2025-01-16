<?php

namespace App\Http\Controllers\Api\Refineries;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Refineries\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Api\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For testing purposes
        $test = $this->createRandomData();

        // Fetch all product types from the database
        $products = Product::with(['productType', 'refinery'])
            ->latest()
            ->paginate();
        // Add metadata to the response
        $metadata = $products;

        // Transform the items
        $data = ProductResource::collection($products);
        // Return response
        return ApiResponse::success($data, 'successful', 200, $metadata);                
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        // Validate the request data
        $data = $request->validated();

        // for testing purposes
        $data['added_by'] = request()?->user()?->id ?? 1;
        $data['refinery_id'] = request()?->user()?->id ?? 1;

        $product = Product::create($data);
        $product->load(['productType', 'refinery']);
        
        return ApiResponse::success($product, 'product created', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load(['productType', 'refinery']);
        
        $product = new ProductResource($product);
        return ApiResponse::success($product, 'successful');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        $product->load(['productType', 'refinery']);

        $product = new ProductResource($product);
        return ApiResponse::success($product, 'product updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return ApiResponse::success([], 'product deleted');
    }


    // Other methods for managing product types
    public function createRandomData(){
        // Implement logic to create a random product type
        $data = [
            'added_by' => 1,
            'product_type_id' => rand(1, 10),
            'refinery_id' => 1,
            'price' => rand(900, 1050),
            'status' => 'active',
        ];
        $product = Product::create($data);

        return ApiResponse::success($product, 'random product created', 201);
    }
}
