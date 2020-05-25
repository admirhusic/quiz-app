<?php

namespace App\Http\Controllers;

use App\Quiz;
use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('question.create');
    }

    public function store()
    {
        $data = request()->validate([

            'question_text' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'correct_answer' => 'required'

         ]);
    
        $question = Question::create([
            'question_text' => $data['question_text'],
            'user_id' => auth()->user()->id,
            'quiz_id' => session('quiz_id'),
            'points' => 1
         ]);
         
        $answer = Answer::create([
              'answer_text' => $data['answer1'],
              'user_id' => auth()->user()->id,
              'question_id' => $question->id,
              'quiz_id' => session('quiz_id'),
              'correct' => $data['correct_answer'] == 'answer1' ? 1 : 0
         ]);

        $answer = Answer::create([
            'answer_text' => $data['answer2'],
            'user_id' => auth()->user()->id,
             'question_id' => $question->id,
             'quiz_id' => session('quiz_id'),
             'correct' => $data['correct_answer'] == 'answer2' ? 1 : 0
        ]);

        $answer = Answer::create([
            'answer_text' => $data['answer3'],
            'user_id' => auth()->user()->id,
             'question_id' => $question->id,
             'quiz_id' => session('quiz_id'),
             'correct' => $data['correct_answer'] == 'answer3' ? 1 : 0
        ]);
     
        $answer = Answer::create([
            'answer_text' => $data['answer4'],
            'user_id' => auth()->user()->id,
             'question_id' => $question->id,
             'quiz_id' => session('quiz_id'),
             'correct' => $data['correct_answer'] == 'answer4' ? 1 : 0
        ]);
         
        
        return redirect('/quiz/' . session('quiz_id'))->with('message', 'Succesfully created question');
        ;
    }

    public function edit(Question $question)
    {
        return view('question.edit', compact('question'));
    }

    public function update(Question $question)
    {
        $id = $question->id;
      
        $data = request()->validate([

        'question_text' => 'required',
        'answer1' => 'required',
        'answer2' => 'required',
        'answer3' => 'required',
        'answer4' => 'required',
        'correct_answer' => 'required'

     ]);
     
        Question::where('id', $id)->update(['question_text' => $data['question_text']]);
        Answer::where('question_id', $id)->first()->update(['answer_text' => $data['answer1'], 'correct' => ($data['correct_answer'] == 'answer1') ? 1 : 0 ]);
        Answer::where('question_id', $id)->skip(1)->first()->update(['answer_text' => $data['answer2'], 'correct' => ($data['correct_answer'] == 'answer2') ? 1 : 0 ]);
        Answer::where('question_id', $id)->skip(2)->first()->update(['answer_text' => $data['answer3'], 'correct' => ($data['correct_answer'] == 'answer3') ? 1 : 0 ]);
        Answer::where('question_id', $id)->skip(3)->first()->update(['answer_text' => $data['answer4'], 'correct' => ($data['correct_answer'] == 'answer4') ? 1 : 0 ]);

        return redirect()->route('quiz', [$question->quiz->id])->with('message', 'Succesfully updated question');
    }

    public function destroy(Question $question) 
    {
        Question::where('id', $question->id)->delete();
        Answer::where('question_id', $question->id)->delete();
        return back()->with('message', 'Succesfully deleted question') ;
    }
}
