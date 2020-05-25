<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\Question;
use App\Answer;
class QuizController extends Controller
{ 
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // show all quizzes
    }

   public function show(Quiz $quiz) 
   {  
      session(['quiz_id' => $quiz->id]);
      return view('quiz.show', compact('quiz'));
   }


    public function edit(Quiz $quiz) 
    {   
      
       session(['quiz_id' => $quiz->id]);
       return view('quiz.edit', compact('quiz'));
    }

    public function create()
    {   
        return view('quiz.create');
    }

    public function store()
    {
        $data = request()->validate([
           'name' => 'required',
           'description' => 'required' 
        ]);

        $data['user_id'] = auth()->user()->id;

        $newQuiz = Quiz::create($data);

        return redirect('home')->with('message', 'Succesfully created quiz');

    }
    
    public function update($id)
    {  
       
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required' 
         ]);
           
         Quiz::where('id', $id)->update($data);
 
         return redirect('home')->with('message', 'Succesfully updated quiz');
    }



    public function destroy($id)
    {
        Quiz::where('id', $id)->delete();
        Question::where('quiz_id', $id)->delete();
        Answer::where('quiz_id', $id)->delete();
        return redirect('home')->with('message', 'Succesfully deleted quiz');
    }

}
