<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Models\Quiz;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can  web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/test/{id}', function ($id) {

    return "";
});
Route::get('/quizzes', [QuizController::class, 'index']);
Route::get('/quizzes/check', [QuizController::class, 'check']);
Route::post('quizzes', [QuizController::class, 'store']);
Route::get('/create/quiz', [QuizController::class, 'create']);
Route::get("/create/question", [QuestionController::class, 'create']);
Route::post("/question/store", [QuestionController::class, 'store'])->name('question.store');

Route::get('resultSearch', [ResultController::class, 'show']);
Route::get('result/Self', [ResultController::class, 'showUser']);
Route::get('/result', [ResultController::class, 'index']);
Route::post('/stdAnswer', [quizController::class, "stdAnswer"]);
Route::get('/quiz/{quiz}/show', [QuizController::class, 'show']);
Route::get('/edit/question/{question}', [QuestionController::class, 'edit']);




Route::get('/dashboard', function () {
    return view('dashboard', ["quiz" => Quiz::all()]);
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
