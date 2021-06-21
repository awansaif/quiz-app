<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|exists:users,email',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => 200,
                'status' => false,
                'errors' => $validator->errors()->all()
            ]);
        } else {

            if (Auth::guard('web')->attempt([
                'email' => $request->email,
                'password' => $request->password
            ] + ['is_active' => 1])) {
                $token = $request->user()->createToken(env('APP_NAME'));

                return response()->json([
                    'succes'  => 200,
                    'status'  => true,
                    'token'   => $token->plainTextToken,
                    'avatar'  => $request->user()->avatar,
                    'message' => 'Account Login successfully'
                ]);
            }
            return response()->json([
                'succes' => 200,
                'status' => false,
                'error' => 'Invalid password! Try again'
            ]);
        }
    }
}
