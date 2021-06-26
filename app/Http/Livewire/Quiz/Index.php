<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Quiz;
use Livewire\Component;

class Index extends Component
{

    public function remove($id)
    {
        Quiz::find($id)->delete();
        return back()->with('message', 'Quiz removed successfully');
    }
    public function render()
    {
        return view('livewire.quiz.index', [
            'quizzes' => Quiz::orderby('id', 'DESC')->get()
        ]);
    }
}
