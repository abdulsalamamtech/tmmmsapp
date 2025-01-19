<?php

namespace App\Http\Controllers\Api\Refineries;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Refineries\PurchaseRequest;
use App\Http\Resources\PurchaseResource;
use App\Models\Api\Purchase;
use App\Models\Api\Refinery;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Refinery: Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all product types from the database
        $refinery_id = 1;
        $purchases = Purchase::where('refinery_id', $refinery_id)
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
     * Refinery: Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        $refinery_id = 1;
        // Fetch the purchase from the database
        $purchase = Purchase::where('refinery_id', $refinery_id)
            ->where('id', $purchase->id);

        // Check if the purchase exists
        if (!$purchase) {
            return ApiResponse::error([], 'Purchase not found', 404);
        }

        $purchase = new PurchaseResource($purchase);
        return ApiResponse::success($purchase, 'successful');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PurchaseRequest $request, Purchase $purchase)
    {
        $refinery_id = 1;

        $data = $request->validated();
        $purchase = Purchase::where('refinery_id', $refinery_id)
            ->where('id', $purchase->id)
            ->first();

        if (!$purchase) {
            return ApiResponse::error([], 'purchase not found', 404);
        }

        $purchase->update($data);

        $purchase = new PurchaseResource($purchase);
        return ApiResponse::success($purchase, 'purchase updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
