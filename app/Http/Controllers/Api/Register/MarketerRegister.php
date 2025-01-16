<?php

namespace App\Http\Controllers\Api\Register;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Register\MarketerRequest;
use App\Models\Api\Marketer;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MarketerRegister extends Controller
{
    public function register(MarketerRequest $request){

        $data = $request->validated();
        
        try{
            
            // Start registration process
            DB::beginTransaction();            
            $user = User::create($data);
    
            $new_data['user_id'] = $user->id;
            $new_data['license_number'] = $data['license_number'];
            $new_data['license_details'] = $data['license_number'];
            $new_data['description'] = $data['license_number'];

            $marketer = Marketer::create($new_data);


            // Dispatch event
            event(new Registered($user));
            // $user->sendEmailVerificationNotification();


            // Unset sensitive information
            $data = $user->toArray();
            unset($data['password']);
            info('Registered', $data);

            // Generate token
            $token = $user->createToken('auth_token')->plainTextToken;
            $response = array_merge($user->toArray(), $marketer->toArray());

            // return ApiResponse::success($response, "Refinery registered successfully", 201);


            DB::commit();

            // Return response
            return response()->json([
                'success' => 'true',
                'message' => 'account created successfully',
                'data' => $response,
                'token' => $token,
                'type' => 'Bearer',
            ], 201);

        } catch (\Throwable $th) {
            //throw $th;
            $message = $th->getMessage();

            DB::rollBack();
            Log::error('Error rolling back transaction: ', [$message]);
            return ApiResponse::error($th, $message);

        }

    }   
}
