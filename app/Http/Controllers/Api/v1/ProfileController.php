<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

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
        if ($request->hasFile('avatar')) {
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
        $file_name = date('Y-m-d') . 'T' . now() . $file->getClientOriginalExt();
        $file->move($destination, $file_name);
        return env('APP_URL') . '/' . $destination . $file_name;
    }
}
