<?php

namespace App\Http\Controllers\Admin;

use App\Models\Quiz;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

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
            'date_time' => 'required',
            'prize' => 'required',
            'video' => 'required',
            'text' => 'required|max:255'
        ]);
        Quiz::create([
            'title' => $request->title,
            'date_time'  => date('d-m-Y h:m:s', strtotime($request->date_time)),
            'prize' => $request->prize,
            'video' =>  $this->uploadVideo('videos/', $request->video),
            'text'  => $request->text,
        ]);
        return redirect()
            ->route('admin.questions.index')
            ->with('message', 'Quiz added successfully');
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


    public function edit(Quiz $quiz): View
    {
        return view('admin.pages.quiz.edit', [
            'quiz' => $quiz
        ]);
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
        $request->validate([
            'title' => 'required|unique:quizzes,title',
            'date_time' => 'required',
            'prize' => 'required',
            'video' => 'nullable',
            'text' => 'required|max:255'
        ]);
        $quiz->update([
            'title' => $request->title,
            'date_time'  => date('d-m-Y h:m:s', strtotime($request->date_time)),
            'prize' => $request->prize,
            'video' =>  $request->file('video') ? $this->uploadVideo('videos/', $request->video) : $quiz->video,
            'text'  => $request->text,
        ]);
        return back()->with('message', 'Quiz updated successfully');
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
