<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() 
    {
        return view('quiz.index');
        // quizフォルダの中にあるindex.blade.phpを指す
    }
    
    public function quiz($id) 
    {
        return view('quiz.quiz',['id'=>$id]);
    }
}
//quiz関数の引数を$idとする 
  //→ index.blade.phpのidを受け取る
  //  ['id' => $id]でidに変数idを入れる

