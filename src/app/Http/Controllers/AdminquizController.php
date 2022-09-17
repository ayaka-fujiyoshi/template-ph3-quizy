<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\BigQuestion;
use App\Question;
use App\Choice;

class AdminquizController extends Controller
{
    public function index() 
    {
        $big_questions = BigQuestion::all();
        return view('quiz/admin.index', compact('big_questions'));
        // quizフォルダの中にあるindex.blade.phpを指す
    }
    // public function quiz($id) 
    // {
    //     $big_questions = BigQuestion::where('id', $id)->first();
    //     $questions = Question::where('big_question_id', $id)->get();
    //     $choices = Choice::get();
    //     $correct_choices = Choice::where('valid', 1)->get();
    //     return view('quiz.quiz', compact('big_questions','questions', 'choices','correct_choices','id'));
    // }
}
