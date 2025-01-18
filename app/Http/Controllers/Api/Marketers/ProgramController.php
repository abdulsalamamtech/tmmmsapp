<?php

namespace App\Http\Controllers\Api\Marketers;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Marketers\ProgramRequest;
use App\Http\Resources\ProgramResource;
use App\Models\Api\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all product types from the database
        $programs = Program::where('status', 'active')->latest()->paginate();
        // Add metadata to the response
        $metadata = $programs;
        // Transform the items
        $data = ProgramResource::collection($programs);
        // Return response
        return ApiResponse::success($data, 'successful', 200, $metadata); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramRequest $request)
    {
        // purchase_id and liters
        // Validate the request data
        $data = $request->validated();

        // for testing purposes
        $data['added_by'] = request()?->user()?->id ?? 1;
        $data['marketer_id'] = request()?->user()?->id ?? 1;

        $program = Program::create($data);
        return ApiResponse::success($program, 'program created', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $program = new ProgramResource($program);
        return ApiResponse::success($program, 'successful');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramRequest $request, Program $program)
    {
        // Validate the request data
        $data = $request->validated();

        // Update the program
        $program->update($data);

        return ApiResponse::success($program, 'Program updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return ApiResponse::success([], 'program deleted', 200);
    }
}
