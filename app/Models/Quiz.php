<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $guarded = [];  
    public function questions()
    {
        return $this->hasMany(Question::class);     
    }
    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
