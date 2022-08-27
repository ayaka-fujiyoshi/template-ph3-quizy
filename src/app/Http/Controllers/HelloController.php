<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;  //第五章：データベース追記
use Illuminate\Support\Facades\Auth;  //第七章：ユーザー認証

use function Ramsey\Uuid\v1;  // 第七章 勝手に追加されていた
use App\Person;  // 第七章 ペジネーション


class HelloController extends Controller
{
    //第七章
    public function index(Request $request) 
    {
        // simplePaginateメソッド、引数に1ページあたりの表示レコード数指定
        // $items = DB::table('people')->simplePaginate(5); 
        // ↓ページ番号のリンクも表示される
        // $items = DB::table('people')->paginate(2); 
        // return view('hello.index',['items'=>$items]);
        // ↓並べ順を指定
        // $sort = $request->sort;
        // $items = Person::orderBy($sort, 'asc')->simplePaginate(5); //第六章やってないから無理、personモデル作ってない
        // $param = ['items' => $items, 'sort' => $sort];
        // return view('hello.index',$param);
        $user = Auth::user();
        $sort = $request->sort;
        // $items = Person::orderBy($sort, 'asc')->simplePaginate(5);
        $items = DB::table('people')->orderBy('age', 'asc')->simplePaginate(5);
        $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
        return view('hello.index',$param);
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
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    // レコード更新
    public function edit(Request $request)  
    {
        $item = DB::table('people')
                ->where('id', $request->id)->first();
        return view('hello.edit',['form'=>$item]);
    }

    public function update(Request $request)  
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::table('people')
            ->where('id', $request->id)
            ->update($param);
        return redirect('/hello');
    }

    // レコード削除
    public function del(Request $request)  
    {
        $item = DB::table('people')
              ->where('id', $request->id)->first();
        return view('hello.del',['form'=>$item]);
    }

    public function remove(Request $request)  
    {
        DB::table('people')
           ->where('id', $request->id)
           ->delete();
        return redirect('/hello');
    }

    //指定したidのレコードを得る
    public function show(Request $request)  
    {
        // ↓指定した位置からレコード取得、指定した数だけレコード取得
        $page = $request->page;
        $items = DB::table('people')
               ->offset($page * 3)
               ->limit(3)
               ->get();
        return view('hello.show', ['items' => $items]);
    }

    //第七章
    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' =>$sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return view('hello/session');
    }

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインしてください。'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email'=>$email, 'password'=>$password])) {
            $msg = 'ログインしました。(' . Auth::user()->name . ')';
        } else {
            $msg = 'ログインに失敗しました。';
        }
        return view('hello.auth', ['message'=>$msg]);
    }
}