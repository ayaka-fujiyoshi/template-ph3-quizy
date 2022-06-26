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

// //クエリー文字列の利用
// class HelloController extends Controller
// {
//     public function index(Request $request) 
//     {
//         $data = [
//             'msg'=>'これはコントローラーから渡されたメッセージです',
//             'id'=>$request->id
//         ];
//         return view('hello.index',$data);
//     }
// }

// //blade アクションの変更
// class HelloController extends Controller
// {
//     public function index() 
//     {
//         $data = [
//             'msg'=>'これはBladeを利用したサンプルです',
//         ];
//         return view('hello.index',$data);
//     }
// }

// //フォームを利用する アクションの変更
// class HelloController extends Controller
// {
//     public function index() 
//     {
//         $data = [
//             'msg'=>'お名前を入力して下さい。',
//         ];
//         return view('hello.index',$data);
//     }

//     public function post(Request $request)  
//     {
//         $msg = $request->msg;
//         $data = [
//             'msg'=>'こんにちは、' . $msg . "さん！",
//         ];
//         return view('hello.index',$data);
//     }
// }

// //@if を利用する アクションの変更
// class HelloController extends Controller
// {
//     public function index() 
//     {
//         return view('hello.index',['msg'=>'']);
//     }

//     public function post(Request $request)  
//     {
//         return view('hello.index',['msg'=>$request->msg]);
//     }
// }

// //＠issetで変数定義をチェックする
// class HelloController extends Controller
// {
//     public function index() 
//     {
//         return view('hello.index');
//     }

//     public function post(Request $request)  
//     {
//         return view('hello.index',['msg'=>$request->msg]);
//     }
// }

// //＠繰り返しのディレクティブ
// class HelloController extends Controller
// {
//     public function index() 
//     {
//         $data = ['one','two','three','four','five'];
//         return view('hello.index',['data'=>$data]);
//     }
// }

//＠breakと＠continue
class HelloController extends Controller
{
    public function index() 
    {
        $data = ['one','two','three','four','five'];
        return view('hello.index',['data'=>$data]);
    }
}