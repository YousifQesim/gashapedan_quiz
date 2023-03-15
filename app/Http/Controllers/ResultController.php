<?php

namespace App\Http\Controllers;

use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $results= QuizAttempt::all();
       
        return view('result.index_result', compact('results'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Request $request)
    {
        
        $searchQuery=request(["search"][0]);
      $results=  QuizAttempt::select('Quiz_attempts.*')
        ->join('quizzes', 'quizzes.id', '=', 'quiz_attempts.quiz_id')
        ->join('users', 'users.id', '=', 'quiz_attempts.user_id')
        ->where(function ($query) use ($searchQuery) {
            $query->where('quizzes.title', 'LIKE', '%' . $searchQuery . '%')
                ->orWhere('users.name', 'LIKE', '%' . $searchQuery . '%');
        })
            ->get();
    return view('result.index_result', compact('results'));
    }

    /**
     * Display the specified resource.
     */
    public function store(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
