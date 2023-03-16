<?php

namespace App\Http\Controllers;


use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = QuizAttempt::latest('id')->paginate(10);


        return view('result.index_result', compact('results'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show(Request $request)
    {

        $searchQuery = request()->input('search');

        $results = QuizAttempt::latest()->select('quiz_attempts.*')
            ->join('quizzes', 'quizzes.id', '=', 'quiz_attempts.quiz_id')
            ->join('users', 'users.id', '=', 'quiz_attempts.user_id')
            ->where(function ($query) use ($searchQuery) {
                $query->where('quizzes.title', 'LIKE', '%' . $searchQuery . '%')
                    ->orWhere('users.name', 'LIKE', '%' . $searchQuery . '%');
            })
            ->paginate(10)->withQueryString();
        return view('result.index_result', compact('results'));
    }
    public function showUser(Request $request)
    {

        $id = auth()->user()->id;
        

        $results =  QuizAttempt::latest()->select('Quiz_attempts.*')
            ->join('quizzes', 'quizzes.id', '=', 'quiz_attempts.quiz_id')
            ->join('users', 'users.id', '=', 'quiz_attempts.user_id')
            ->where(function ($query) use ($id) {
                $query->where('users.id', '=', "$id");
            })->paginate(10);
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
