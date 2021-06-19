<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $user = User::find($request->user()->id);
        return response()->json([
            'succes' => 200,
            'status' => true,
            'profile' => $user
        ]);
    }


    public function updateprofile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'succes' => 200,
                'status' => false,
                'errors' => $validator->errors()->all()
            ]);
        } else {
            $user = User::find($request->user()->id);
            $user->update([
                'avatar' => $this->uploadImage('images/', $request->file('avatar'))
            ]);
            return response()->json([
                'succes' => 200,
                'status' => true,
                'message' => 'Profile image updated successfully'
            ]);
        }
    }


    public function uploadImage($destination, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($destination, $file_name);
        return env('APP_URL') . '/' . $destination . $file_name;
    }
}
