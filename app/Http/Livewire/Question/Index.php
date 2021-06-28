<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Livewire\Component;

class Index extends Component
{

    public function questionRemove($id)
    {
        Question::find($id)->delete();
        return back()->with('message', 'Quiz removed successfully');
    }

    public function render(Request $request)
    {
        $quiz = Quiz::latest()->first();
        $quiz_id = $quiz->id;
        $this->questions = Question::where('quiz_id', $quiz_id)->orderBy('id', 'DESC')->get();
        return view('livewire.question.index');
    }
}
