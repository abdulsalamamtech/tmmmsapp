<?php

namespace App\Http\Controllers\Api\Refineries;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
