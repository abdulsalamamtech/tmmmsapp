<?php

namespace App\Http\Controllers\Api\Marketers;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Marketers\PurchaseRequest;
use App\Http\Resources\PurchaseResource;
use App\Models\Api\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For testing purposes
        // $test = $this->createRandomData();

        // Fetch all product types from the database
        $purchases = Purchase::where('marketer_id', 1)
            ->latest()
            ->paginate();
        // Add metadata to the response
        $metadata = $purchases;

        // Transform the items
        $data = PurchaseResource::collection($purchases);
        // Return response
        return ApiResponse::success($data, 'successful', 200, $metadata);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PurchaseRequest $request)
    {
        // for testing purposes
        $data['added_by'] = request()?->user()?->id ?? 1;
        $purchase = Purchase::create($data);
        return ApiResponse::success($purchase, 'purchase type created', 201);        
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        return ApiResponse::success($purchase, 'purchase type created', 201);        

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchaseRequest $request, Purchase $purchase)
    {
        $data = $request->validated();
        $purchase->update($data);

        $product_type = new PurchaseResource($purchase);
        return ApiResponse::success($purchase, 'purchase updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        Purchase::destroy($purchase);
        return ApiResponse::success([], 'purchase deleted', 200);
    }
}
