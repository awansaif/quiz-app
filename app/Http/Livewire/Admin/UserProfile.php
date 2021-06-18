<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class UserProfile extends Component
{
    public $current_password;
    public $new_password;
    public $message;
    public $class;


    protected $rules = [
        'current_password' => 'required|min:6',
        'new_password' => ['required', 'min:8'],
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }
    public function render()
    {
        return view('livewire.admin.user-profile');
    }

    public function changePassword()
    {
        $this->validate();
        $user = Admin::find(Auth::guard('admin')->user()->id);

        if (Hash::check($this->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($this->new_password)
            ]);
            $this->message = 'Password updated successfully';
            $this->class = 'alert-success';
        } else {
            $this->message = 'Incorrect current password';
            $this->class = 'alert-danger';
        }

        $this->reset(['current_password', 'new_password']);
    }
}
