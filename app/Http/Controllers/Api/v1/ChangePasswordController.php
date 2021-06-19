<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required',
            'new_password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => 200,
                'status' => false,
                'errors' => $validator->errors()->all()
            ]);
        } else {
            if (Hash::check($request->password, $request->user()->password)) {
                $user = User::find($request->user()->id);
                $user->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return response()->json([
                    'succes' => 200,
                    'status' => true,
                    'message' => 'Password changed successfully'
                ]);
            } else {
                return response()->json([
                    'succes' => 200,
                    'status' => false,
                    'error' => 'Old Password not match'
                ]);
            }
        }
    }
}
