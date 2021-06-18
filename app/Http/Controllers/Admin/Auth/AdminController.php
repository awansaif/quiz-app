<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm(): View
    {
        return view('admin.auth.login');
    }


    public function dashboard()
    {
        return view('admin.dashboard', [
            'total_users' => User::count(),
            'new_users'  => User::whereMonth('created_at', date('m'))->count()
        ]);
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.showLoginForm');
    }
}
