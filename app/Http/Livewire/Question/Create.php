<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Livewire\Component;

class Create extends Component
{
    public $questionw;
    public $option_one;
    public $option_two;
    public $option_three;
    public $option_four;
    public $answer;
    public $quiz_id;

    public function mount($quizId)
    {
        $this->quiz_id = $quizId;
    }
    protected $rules = [
        'questionw' => 'required',
        'option_one' => 'required',
        'option_two' => 'required',
        'option_three' => 'required',
        'option_four' => 'required',
        'answer' => 'required',
    ];

    public function addquestion()
    {
        $this->validate();
        Question::create([
            'quiz_id' => $this->quiz_id,
            'question' =>  $this->questionw,
            'option_one' =>  $this->option_one,
            'option_two' =>  $this->option_two,
            'option_three' =>  $this->option_three,
            'option_four' =>  $this->option_four,
            'answer' =>  $this->answer,
        ]);

        $this->quiz_id = $this->quiz_id;
        $this->reset([
            'questionw',
            'option_one',
            'option_two',
            'option_three',
            'option_four',
            'answer',
        ]);
    }
    public function render()
    {
        return view('livewire.question.create');
    }
}
