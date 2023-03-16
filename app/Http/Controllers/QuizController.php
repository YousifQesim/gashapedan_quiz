<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;

use App\Models\QuizAttempt;
use App\Models\StudentAnswer;
use Attribute;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index()
    {     $user = Auth::user();
        $quiz = Quiz::whereDoesntHave('quizAttempts', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();
        
        return view('quizzes.quizzes', compact('quiz'));
    }
    public function show(Quiz $quiz)
    {

        return view('quizzes.show_quiz', compact('quiz'));
    }
    public function stdAnswer()
    {
        $attributes = request();
        
        $studentAttempt = new QuizAttempt;
        $len=  (count($attributes->request));
        $scour=0;
        
      $quiz_id = $attributes["quiz_id"];
        $quiz = Quiz::find($quiz_id); 
        $questionCount = $quiz->questions()->count();
        if ($len-3==$questionCount) {
            
            $user_id = $attributes["auth"];
            
            $studentAttempt->quiz_id = $quiz_id;
        $studentAttempt->user_id = $user_id;
        $studentAttempt->score = 0;
        $studentAttempt->started_at = '2022-01-01 09:00:00';
        $studentAttempt->ended_at = '2022-01-01 09:30:00';
        $studentAttempt->save();

        
      for ($i=0; $i <$len -3 ; $i++) { 
        
          
          
          $record = Answer::find($attributes["A" . $i]);

          if ($record->is_correct) {
            $scour++;

         }
            $studentAnswer = new StudentAnswer;
            $studentAnswer->quiz_attempt_id = $studentAttempt->id;
            $studentAnswer->question_id = $record->question_id;
            $studentAnswer->answer_id =$record->id ;
            $studentAnswer->user_id = $user_id;
            $studentAnswer->save();
        }
        
        if ($scour>0) {
            
        $change = QuizAttempt::where('id', $studentAttempt->id)->first();
        
            
            $change->score = $scour;
            $change->save();
        } 
        
       return redirect("/home");
    }else {
            return back()->with('stuAnswer', 'you did not answer all questions');
    }
    }

    public function create()
    {
if (Auth()->user()->type) {
    return view("quizzes.create_quiz");
    
}
else {
    echo "sorry you are not teacher";
 echo   '<br> <a href="/dashboard">home</a>';
}


    }
    public function store()
    {
        $request = request()->validate( [
            'title' => 'required',
            'description' => 'required',
        ]);

        $quiz = new Quiz;
        $quiz->user_id =auth()->user()->id;
        $quiz->title = $request['title'];
        $quiz->description = $request['description'];
        $quiz->time_limit = 1;
        $quiz->attempts_allowed = 1;
        
        $quiz->starts_at = "2023-03-11 18:55:50";
        $quiz->ends_at = "2023-03-11 18:55:55";
        $quiz->save();

        return redirect("create/question");

    }
}
