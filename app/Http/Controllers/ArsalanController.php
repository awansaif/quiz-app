<?php

namespace App\Http\Controllers;

use App\Mail\ArxlanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArsalanController extends Controller
{
    public function sendMail(Request $request)
    {
        Mail::to($request->sendTo)->send(new ArxlanMail($request->data));
    }
}
