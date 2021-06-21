<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordController extends Controller
{
    public function sendResetMail(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            ['email' => 'required|email|exists:users,email']
        );

        if ($validator->fails()) {
            return response()->json([
                'succes' => 200,
                'status' => false,
                'errors' => $validator->errors()->all()
            ]);
        } else {

            $status = Password::sendResetLink(
                $request->only('email')
            );
            return response()->json([
                'succes' => 200,
                'status' => true,
                'message' => 'Password reset link send to your email. Please Check'
            ]);

            // return $status === Password::RESET_LINK_SENT
            //     ? back()->with(['status' => __($status)])
            //     : back()->withErrors(['email' => __($status)]);
        }
    }
}
