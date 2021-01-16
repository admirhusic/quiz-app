<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Question;
use App\Answer;
class ParticipateController extends Controller
{  

    public function index()
    {   
        $quizzes = Quiz::all();
        return view('participate.index', compact('quizzes'));
    }



    public function show($quiz) 
    {   
        $questions = Question::where('quiz_id', $quiz)->get();
        return view('participate.show', compact('questions'));

    }

    public function results(Request $request)
    {      

         $anwers = request()->validate(['answers' => 'required']); 
         $answers = request('answers');
         $correctAnswers = Answer::whereIn('id', $answers)->where('correct', 1)->get();
         $uncorrectAnswers = Answer::whereIn('id', $answers)->where('correct', 0)->get();
         return view('participate.result', compact('correctAnswers', 'uncorrectAnswers'));
        
    }

}
