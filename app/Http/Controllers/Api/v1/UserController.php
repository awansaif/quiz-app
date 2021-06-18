<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logout(Request $request): JsonResponse
    {
        Auth::guard('web')->logout();
        $request->user()->tokens()->delete();
        return response()->json([
            'succes' => 200,
            'status' => true,
            'message' => 'Account logout successfully'
        ]);
    }
}
