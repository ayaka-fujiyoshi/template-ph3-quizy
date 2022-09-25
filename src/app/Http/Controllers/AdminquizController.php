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

    //レコード作成
    public function add(Request $request)  
    {
        return view('quiz/admin.add');
    }
    public function create(Request $request)  
    {
        $param_big = [
            'name' => $request->name,
        ];
        DB::table('big_questions')->insert($param_big);
        return redirect('admin/index');
    }

    // レコード更新
    public function edit(Request $request)  
    {
        $item = DB::table('big_questions')
                ->where('id', $request->id)->first();
        return view('quiz/admin.edit',['form'=>$item]);
    }
    public function update(Request $request)  
    {
        $param = [
            'name' => $request->name,
        ];
        DB::table('big_questions')
            ->where('id', $request->id)
            ->update($param);
        return redirect('admin/index');
    }

    // レコード削除
    public function del(Request $request)  
    {
        $item = DB::table('big_questions')
              ->where('id', $request->id)->first();
        return view('quiz/admin.del',['form'=>$item]);
    }
    public function remove(Request $request)  
    {
        DB::table('big_questions')
           ->where('id', $request->id)
           ->delete();
        return redirect('admin/index');
    }

    // レコード順番更新
    public function order_edit(Request $request)  
    {
        $item = DB::table('questions')
                ->where('id', $request->id)->first();
        $questions = Question::where('big_question_id', $request->id)->orderBy('order', 'asc')->get();
        return view('quiz/admin.order',['form'=>$item], compact('questions'));
    }
    public function order_update(Request $request)  
    {
        $param = [
            'order' => $request->order,
        ];
        DB::table('questions')
            ->where('big_question_id', $request->id)
            ->update($param);
        return redirect('admin/index');
    }
}
