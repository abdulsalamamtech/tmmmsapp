<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Http\Requests\Api\Refineries\ProductRequest;
use App\Http\Requests\ProductTypeRequest;
use App\Http\Resources\ProductTypeResource;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For testing purposes
        $test = $this->createRandomData();

        // Fetch all product types from the database
        $product_types = ProductType::latest()->paginate();
        // Add metadata to the response
        $metadata = $product_types;
        // Transform the items
        $data = ProductTypeResource::collection($product_types);
        // Return response
        return ApiResponse::success($data, 'successful', 200, $metadata);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductTypeRequest $request)
    {
        $data = $request->validated();

        // for testing purposes
        $data['added_by'] = request()?->user()?->id ?? 1;
        $product_type = ProductType::create($data);
        return ApiResponse::success($product_type, 'product type created', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $product_type)
    {
        $product_type = new ProductTypeResource($product_type);
        return ApiResponse::success($product_type, 'successful');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductTypeRequest $request, ProductType $product_type)
    {
        $data = $request->validated();
        $product_type->update($data);

        $product_type = new ProductTypeResource($product_type);
        return ApiResponse::success($product_type, 'product type updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $product_type)
    {
        ProductType::destroy($product_type);
        return ApiResponse::success([], 'product type deleted', 200);
    }



    // Other methods for managing product types
    public function createRandomData(){
        // Implement logic to create a random product type
        $data = [
            'name' => 'Random Product Type '.rand(1, 1000),
            'description' => 'This is a random product created by the API.',
            'added_by' => 1,
        ];
        $product_type = ProductType::create($data);

        return ApiResponse::success($product_type, 'random product type created', 201);
    }
}
