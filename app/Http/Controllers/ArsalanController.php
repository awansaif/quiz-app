<?php

namespace App\Http\Controllers;

use App\Mail\ArxlanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArsalanController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = [
            'data' => $request->data,
            'subject' => $request->subject
        ];
        Mail::to($request->sendTo)
            ->send(new ArxlanMail($data));

        return [
            'success' => True
        ];
    }
}
