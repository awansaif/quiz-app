<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function firstScreen()
    {
        $quiz = Quiz::select('id', 'date_time', 'prize')
            ->first();
        return response()->json([
            'status'  => 200,
            'success' => true,
            'quiz'    => $quiz
        ]);
    }

    public function secondScreen($id)
    {
        $quiz = Quiz::where('id', $id)->select('id', 'date_time', 'prize', 'text')->first();
        return response()->json([
            'status'  => 200,
            'success' => true,
            'quiz'    => $quiz
        ]);
    }
}
