<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Validator;

//第四章
//ミドルウェアで組み込まれる変数$dataが正しく動くか確認
class HelloController extends Controller
{
    public function index(Request $request) 
    {
        return view('hello.index',['msg'=>'フォームを入力下さい。']);
    }

    //use App\Http\Requests\HelloRequest;を追加
    public function post(HelloRequest $request)  
    {
        return view('hello.index',['msg'=>'正しく入力されました！']);
    }
}