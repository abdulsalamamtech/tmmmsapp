<?php

namespace App\Http\Controllers\Api\Marketers;

use App\Helpers\ApiResponse;
use App\Helpers\CustomGenerator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Marketers\PurchaseRequest;
use App\Http\Resources\PurchaseResource;
use App\Models\Api\Product;
use App\Models\Api\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Marketer: Display a listing of the resource.
     */
    public function index()
    {
        // For testing purposes
        // $test = $this->createRandomData();
        $marketer_id = 1;
        // Fetch all product types from the database
        $purchases = Purchase::where('marketer_id', $marketer_id)
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
     * Marketer: Store a newly created resource in storage.
     */
    public function store(PurchaseRequest $request)
    {
        $data = $request->validated();

        // for testing purposes
        $data['added_by'] = request()?->user()?->id ?? 1;
        $data['marketer_by'] = request()?->user()?->id ?? 1;

        // Get the product
        $product_id = $data['product_id'];
        $product = Product::find($product_id);
        // Get the refinery
        $refinery_id = $product->refinery_id;

        // Calculate the product price
        $amount = ($product->price * $data['liters']);

        $data['amount'] = $amount;
        $data['refinery_id'] = $refinery_id;


        // PFI is automatically generated
        $data['pfi_number'] = CustomGenerator::generateUniquePFI();

        $purchase = Purchase::create($data);
        return ApiResponse::success($purchase, 'purchase created', 201);        
    }

    /**
     * Marketer: Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        $marketer_id = 1;
        $purchase = Purchase::where('marketer_id', $marketer_id)
        ->where('id', $purchase->id);

        // Check if the purchase exists
        if (!$purchase) {
            return ApiResponse::error([], 'purchase not found', 404);
        }
        return ApiResponse::success($purchase, 'purchase created', 201);        

    }

    /**
     * Marketer: Update the specified resource in storage.
     */
    public function update(PurchaseRequest $request, Purchase $purchase)
    {
        $data = $request->validated();
        // If the product id is changed the price and refinery should be updated
        if($purchase->approved_by){
            return ApiResponse::error($purchase, 'purchase can not be updated', 200);
        }
        

        // Get the product
        $product_id = $data['product_id'];
        $product = Product::find($product_id);
        // Get the refinery
        $refinery_id = $product->refinery_id;

        // Calculate the product price
        $amount = ($product->price * $data['liters']);

        $data['amount'] = $amount;
        $data['refinery_id'] = $refinery_id;

        $purchase->update($data);

        $purchase = new PurchaseResource($purchase);
        return ApiResponse::success($purchase, 'purchase updated', 200);
    }

    /**
     * Marketer: Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        Purchase::destroy($purchase);
        return ApiResponse::success([], 'purchase deleted', 200);
    }
}
