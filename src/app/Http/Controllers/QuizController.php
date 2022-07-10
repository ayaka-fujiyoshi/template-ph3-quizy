<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function index() 
    {
        return view('quiz.index');
        // quizフォルダの中にあるindex.blade.phpを指す
    }
    
    public function quiz($id) 
    {
        $big_questions = DB::table('big_questions')->where('id', $id)->first();
        $questions = DB::table('questions')->where('big_question_id', $id)->get();
        $choices = DB::table('choices')->get();
        return view('quiz.quiz',['big_questions'=>$big_questions, 'questions'=>$questions, 'choices'=>$choices, 'id'=>$id]);
        // return view('quiz.quiz',['id'=>$id]);
    }

    // public function quizz($id){
    //     // $choices = DB::select('select * from choices');
    //     // return view('quizyBlade.quizy',['choices'=>$choices]);
    
    //     // $questions = DB::select('select * from questions WHERE ');
    //     // return view('quizyBlade.quizy',['questions'=>$questions]);
    //     $questions = DB::table('questions')->where('big_question_id', $id)->get();
    //     $choices = DB::table('choices')->get();
    //     return view('quizyBlade.quizy', compact('questions', 'choices'));
    
    
    //         // view(テンプレートの場所,配列)
    //         // viewの編集とcontorollerで定義した変数の名前が同じときにcompact関数でまとめる
    //         // return view('quizyblade.quizy',compact('id','choices'));
    
    //     }
}
//quiz関数の引数を$idとする 
  //→ index.blade.phpのidを受け取る
  //  ['id' => $id]でidに変数idを入れる

