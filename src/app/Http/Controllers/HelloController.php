<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//第四章
//ミドルウェアで組み込まれる変数$dataが正しく動くか確認
class HelloController extends Controller
{
    public function index(Request $request) 
    {
        // return view('hello.index',['data'=>$request->data]);
        //レスポンスを操作する
        return view('hello.index');
    }
}