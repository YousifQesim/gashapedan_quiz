<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function create()
    {
        $user_id = Auth::id();


        $quizzes = Quiz::where('user_id', $user_id)->latest()->select('id', 'title')->get();
                return view('questions.create_question', compact('quizzes'));
    }
    public function store(){
        
        $validatedData = request()->validate([
            'quiz-id' => 'required',
            'question' => 'required',
            'answer' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'question-id'=>''
        ]);
        
        

        // Create a new Answer model and set its attributes
        if (isset($validatedData['question-id'])) {
            $question = Question::findOrFail($validatedData['question-id']);

            $question->question = $validatedData['question'];
            $question->save();
            
            $answers = Answer::where('question_id', $validatedData['question-id'])->get();
            for ($i = 1; $i < 5; $i++) { 
                $answer= $answers[$i-1];
                $answer->answer = $validatedData['option' . $i];
                $answer->is_correct = (('option' . $i) == $validatedData['answer'] ? 1 : 0);
                $answer->save();
            }

          return  redirect('quizzes/check');
        }
        

        $question=new Question();
        $question->quiz_id=$validatedData['quiz-id'];
        $question->question=$validatedData['question'];
        $question->save();
        
        
        for ($i=1; $i <5 ; $i++) { 
            $answer = new Answer();
            $answer->question_id = $question->id;
            $answer->answer = $validatedData['option'.$i];
            $answer->is_correct = (('option'.$i)== $validatedData['answer'] ?1:0) ;
            $answer->save();
        }

        return redirect("create/question")->with('success', 'question created successfully!');

    }
   
    public function edit(Question $question)
    {

        $answers = $question->answers;


        return view("questions.edit_question", compact('question', "answers"));
    }
 
}
