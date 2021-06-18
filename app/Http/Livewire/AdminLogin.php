<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminLogin extends Component
{
    public $email;
    public $password;
    protected $rules = [
        'email' => 'required|email|exists:admins,email',
        'password' => 'required|min:6'
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function render()
    {
        return view('livewire.admin-login');
    }

    public function login()
    {
        $this->validate();
        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect()->route('admin.dashboard');
        }
        return back()->with('message', 'Password Incorrect! Please try again');
        $this->reset(['password', 'email']);
    }
}
