<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

    public function register(Request $request): JsonResponse
    {
        $dt = new \Carbon\Carbon();
        $before = $dt->subYears(18)->format('Y-m-d');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'dob' => 'required|before:' . $before
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => 200,
                'status' => false,
                'errors' => $validator->errors()->all()
            ]);
        } else {

            $user = User::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'dob' => $request->dob,
                'avatar'  => 'https://ui-avatars.com/api/?background=f1f1f1&color=303030&name=' . $request->name,
            ]);

            $token = $user->createToken(env('APP_NAME'));

            return response()->json([
                'succes' => 200,
                'status' => true,
                'token' => $token->plainTextToken,
                'message' => 'Account registered successfully'
            ]);
        }
    }
}
