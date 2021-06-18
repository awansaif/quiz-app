<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Livewire\Component;

class UserTable extends Component
{
    // public $userId;
    public $message;

    public function render()
    {
        return view('livewire.admin.user-table', [
            'users' => User::orderBy('id', 'DESC')->get()
        ]);
    }


    public function changeStatus($userId, $status)
    {
        $user =  User::find($userId);
        $user->is_active = $status;
        $user->save();
    }

    public function remove($userId)
    {
        $user =  User::find($userId);
        $user->delete();
        return back()
            ->with('message', $user->name . ' account removed successfully');
    }
}
