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
        //クッキーを読み書きする
        if ($request->hasCookie('msg')) {
            $msg = 'Cookkie: ' . $request->cookie('msg');
        } else {
            $msg = '※クッキーはありません。';
        }
        return view('hello.index',['msg'=>$msg]);
    }

    //use App\Http\Requests\HelloRequest;を追加
    public function post(HelloRequest $request)  
    {
         //クッキーを読み書きする
         $validate_rule = [
            'msg'=>'required',
         ];
         $this->validate($request, $validate_rule);
         $msg = $request->msg;
         $response = response()->view('hello.index',
         ['msg'=>'「' . $msg . '」をクッキーに保存しました。']);
         $response->cookie('msg', $msg, 100);
        return $response;
    }
}