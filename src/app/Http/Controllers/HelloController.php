<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 第三章
// //コントローラーでテンプレートを使う
// class HelloController extends Controller
// {
//     public function index() {
//         return view('hello.index');
//     }
// }

// //値をテンプレートに渡す
// class HelloController extends Controller
// {
//     public function index() {
//         $data = ['msg'=>'これはコントローラーから渡されたメッセージです'];
//         return view('hello.index',$data);
//     }
// }

// //ルートパラメータをテンプレートに渡す アクションの修正
// class HelloController extends Controller
// {
//     public function index($id='zero') 
//     {
//         $data = [
//             'msg'=>'これはコントローラーから渡されたメッセージです',
//             'id'=>$id
//         ];
//         return view('hello.index',$data);
//     }
// }

//クエリー文字列の利用
class HelloController extends Controller
{
    public function index(Request $request) 
    {
        $data = [
            'msg'=>'これはコントローラーから渡されたメッセージです',
            'id'=>$request->id
        ];
        return view('hello.index',$data);
    }
}
