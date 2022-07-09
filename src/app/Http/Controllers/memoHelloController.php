<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class HelloController extends Controller
// {
//     public function index() {
//         return <<<EOF
// <html>
// <head>
// <title>Hello/Index</title>
// <style>
// body {font-size:16pt; color:999; }
// h1 { font-size:100pt; text-aligin:right; color:#eee;
//     margin:-40px 0px -50px 0px; }
// </style>
// </head>
// <body>
//    <h1>Index</h1>
//    <p>これは、Helloコントローラーのindexアクションです。</p>
// </body>
// </html>
// EOF;
//     }
// }


//ルートパラメータの利用
// class HelloController extends Controller
// {
//     public function index($id='noname', $pass='unknown') {
//         return <<<EOF
// <html>
// <head>
// <title>Hello/Index</title>
// <style>
// body {font-size:16pt; color:999; }
// h1 { font-size:100pt; text-aligin:right; color:#eee;
//     margin:-40px 0px -50px 0px; }
// </style>
// </head>
// <body>
//    <h1>Index</h1>
//    <p>これは、Helloコントローラーのindexアクションです。</p>
//    <ul>
//         <li>ID: {$id}</li>
//         <li>PASS: {$pass}</li>
//    </ul>
// </body>
// </html>
// EOF;
//     }
// }


// //複数アクションの利用
// global $head, $style, $body, $end;
// $head = '<html><head>';
// $style = <<<EOF
// <style>
// body {font-size:16pt; color:999; }
// h1 { font-size:100pt; text-aligin:right; color:#eee;
//     margin:-40px 0px -50px 0px; }
// </style>
// EOF;
// $body = '</head><body>';
// $end = '</body></html>';

// function tag($tag, $txt){
//     return "<{$tag}>" . $txt . "</{$tag}>";
// }

// class HelloController extends Controller
// {
//     public function index() {
//         global $head, $style, $body, $end;
//         $html = $head . tag('title', 'Hello/Index') . $style .
//              $body
//              . tag('h1', 'Index') . tag('p', 'this is Index page')
//              . '<a href="/hello/other">go to Other page</a>'
//              . $end;
//         return $html;
//     }
//     public function other() {
//         global $head, $style, $body, $end;
//         $html = $head . tag('title', 'Hello/Other') . $style .
//              $body
//              . tag('h1', 'Other') . tag('p', 'this is Other page')
//              . $end;
//         return $html;
//     }
// }


// //HelloControllerをシングルアクション化
// class HelloController extends Controller
// {
//     public function __invoke() {
//         return <<<EOF
//     <html>
//     <head>
//     <title>Hello</title>
//     <style>
//     body {font-size:16pt; color:999; }
//     h1 { font-size:100pt; text-aligin:right; color:#eee;
//         margin:-40px 0px -50px 0px; }
//     </style>
//     </head>
//     <body>
//        <h1>Single Action</h1>
//        <p>これは、シングルアクションコントローラーのアクションです。</p>
//     </body>
//     </html>
//     EOF;
//     }
// }


// //RequestおよびResponse
// use Illuminate\Http\Response;

// class HelloController extends Controller
// {
//     public function index(Request $request, Response $response) {
//     $html = <<<EOF
//     <html>
//     <head>
//     <title>Hello/Index</title>
//     <style>
//     body {font-size:16pt; color:999; }
//     h1 { font-size:100pt; text-aligin:right; color:#eee;
//         margin:-40px 0px -50px 0px; }
//     </style>
//     </head>
//     <body>
//        <h1>Hello</h1>
//        <h3>Request</h3>
//        <pre>{$request}</pre>
//        <h3>Response</h3>
//        <pre>{$response}</pre>
//     </body>
//     </html>
//     EOF;
//         $response->setContent($html);
//         return $response;
//     }
// }



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

// //＠breakと＠continue
// class HelloController extends Controller
// {
//     public function index() 
//     {
//         $data = ['one','two','three','four','five'];
//         return view('hello.index',['data'=>$data]);
//     }
// }

// //＠eachによるコレクションビュー 
// class HelloController extends Controller
// {
//     public function index() 
//     {
//         $data = [
//             ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
//             ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
//             ['name'=>'鈴木さちこ', 'mail'=>'sachico@happy']
//         ];
//         return view('hello.index',['data'=>$data]);
//     }
// }

// //ビューコンポーザーを利用する
// class HelloController extends Controller
// {
//     public function index() 
//     {
//         return view('hello.index',['message'=>'Hello!']);
//     }
// }



//第四章
//ミドルウェアで組み込まれる変数$dataが正しく動くか確認
// class HelloController extends Controller
// {
//     // public function index(Request $request) 
//     // {
//     //     // return view('hello.index',['data'=>$request->data]);
//     //     //レスポンスを操作する
//     //     return view('hello.index');
//     // }
//     // バリデーションを利用する
//     public function index() 
//     {
//         return view('hello.index',['msg'=>'フォームを入力:']);
//     }

//     public function post(Request $request)  
//     {
//         $validate_rule = [
//                     'name'=>'required',
//                     'mail'=>'email',
//                     'age'=>'numeric|between:0,150',
//                 ];
//         $this->validate($request, $validate_rule);
//         return view('hello.index',['msg'=>'正しく入力されました！']);
//     }
// }


// class HelloController extends Controller
// {
//     public function index(Request $request) 
//     {
//         $validator = Validator::make($request->query(), [
//             'id' => 'required',
//             'pass' => 'required',
//         ]);
//         if ($validator->fails()) {
//             $msg = 'クエリーに問題があります。';
//         } else {
//             $msg = 'ID/PASSを受け付けました。フォームを入力下さい。';
//         }
//         return view('hello.index',['msg'=>$msg, ]);
//     }

//     //use App\Http\Requests\HelloRequest;を追加
//     public function post(HelloRequest $request)  
//     {
//         $rules = [
//             'name' => 'required',
//             'mail' => 'email',
//             'age' => 'numeric|between:0,150',
//         ];
//         $messages = [
//             'name.required' => '名前は必ず入力して下さい。',
//             'mail.email' => 'メールアドレスが必要です。',
//             'age.numeric' => '年齢を整数で記入して下さい。',
//             'age.min' => '年齢はゼロ歳以上で記入下さい。',
//             'age.max' => '年齢は200歳以下で記入下さい。',
//         ];
//         $validator = Validator::make($request->all(),$rules,$messages);
//         $validator->sometimes('age', 'min:0', function($input){
//             return !is_int($input->age);
//         });
//         $validator->sometimes('age', 'max:200', function($input){
//             return !is_int($input->age);
//         });
//         if ($validator->fails()) {
//             return redirect('/hello')
//              ->withErrors($validator)
//              ->withInput();
//         }
//         return view('hello.index',['msg'=>'正しく入力されました！']);
//     }
// }


// //ミドルウェアで組み込まれる変数$dataが正しく動くか確認
// use App\Http\Requests\HelloRequest;
// use Validator;
// class HelloController extends Controller
// {
//     public function index(Request $request) 
//     {
//         //クッキーを読み書きする
//         if ($request->hasCookie('msg')) {
//             $msg = 'Cookkie: ' . $request->cookie('msg');
//         } else {
//             $msg = '※クッキーはありません。';
//         }
//         return view('hello.index',['msg'=>$msg]);
//     }

//     //use App\Http\Requests\HelloRequest;を追加
//     public function post(HelloRequest $request)  
//     {
//          //クッキーを読み書きする
//          $validate_rule = [
//             'msg'=>'required',
//          ];
//          $this->validate($request, $validate_rule);
//          $msg = $request->msg;
//          $response = response()->view('hello.index',
//          ['msg'=>'「' . $msg . '」をクッキーに保存しました。']);
//          $response->cookie('msg', $msg, 100);
//         return $response;
//     }
// }



//第五章
// class HelloController extends Controller
// {
//     public function index(Request $request) 
//     {
//         $items = DB::select('select * from people');
//         return view('hello.index',['items'=>$items]);
//     }
// }
//クエリを使う
// public function index(Request $request) 
// {
//     if (isset($request->id)) {
//         $param = ['id' => $request->id];
//         $items = DB::select('select * from people where id = :id', $param);
//     } else {
//         $items = DB::select('select * from people');
//     }
//     return view('hello.index',['items'=>$items]);
// }

class HelloController extends Controller
{
    public function index(Request $request) 
    {
        $items = DB::select('select * from people');
        return view('hello.index',['items'=>$items]);
    }

    //use App\Http\Requests\HelloRequest;を追加
    public function post(Request $request)  
    {
        $items = DB::select('select * from people');
        return view('hello.index',['items'=>$items]);
    }

    //レコード作成
    public function add(Request $request)  
    {
        return view('hello.add');
    }

    public function create(Request $request)  
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/hello');
    }

    // レコード更新
    public function edit(Request $request)  
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.edit',['form'=>$item[0]]);
    }

    public function update(Request $request)  
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name= :name, mail= :mail, age= :age where id = :id', $param);
        return redirect('/hello');
    }

    // レコード削除
    public function del(Request $request)  
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.del',['form'=>$item[0]]);
    }

    public function remove(Request $request)  
    {
        $param = ['id' => $request->id];
        DB::delete('delete from people where id = :id', $param);
        return redirect('/hello');
    }
}