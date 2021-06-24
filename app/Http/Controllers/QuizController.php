<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class QuizController extends Controller
{
    public function index(): View
    {
        return view('admin.pages.quiz.index');
    }

    public function create(): View
    {

        return view('admin.pages.quiz.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:quizzes,title',
            'date' => 'required',
            'time' => 'required',
            'prize' => 'required',
            'video' => 'required',
            'text' => 'required|max:255'
        ]);
        Quiz::create([
            'title' => $request->title,
            'date'  => $request->date,
            'time'  => $request->time,
            'prize' => $request->prize,
            'video' =>  $this->uploadVideo('videos/', $request->video),
            'text'  => $request->text,
        ]);
        return back()->with('message', 'Quiz added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }

    public function uploadVideo($destination, $file)
    {
        $file_name = date('Y-m-d') . 'T' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($destination, $file_name);
        return env('APP_URL') . '/' . $destination . $file_name;
    }
}
