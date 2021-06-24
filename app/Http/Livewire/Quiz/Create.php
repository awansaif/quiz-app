<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Quiz;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title;
    public $date;
    public $time;
    public $prize;
    public $video;
    public $text;


    protected $rules = [
        'title' => 'required|unique:quizzes,title',
        'date' => 'required',
        'time' => 'required',
        'prize' => 'required',
        'video' => 'required',
        'text' => 'required|max:255'
    ];


    public function addquiz()
    {
        $this->validate();
        $file_name = date('Y-m-d') . 'T' . time() . '.' . $this->video->getClientOriginalExtension();
        $this->video->move('videos/', $file_name);
        $path =  env('APP_URL') . '/' . 'videos/' . $file_name;

        // dd($this->video);
        Quiz::create([
            'title' => $this->title,
            'date' => $this->date,
            'time' => $this->time,
            'prize' => $this->prize,
            'video' =>  $path,
            'text' => $this->text,
        ]);

        $this->reset();

        return back()->with('message', 'Quiz added successfully');
    }

    public function render()
    {
        return view('livewire.quiz.create');
    }


    public function uploadVideo($destination, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($destination, $file_name);
        return env('APP_URL') . '/' . $destination . $file_name;
    }
}
