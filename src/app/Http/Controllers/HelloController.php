<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;  //第五章：データベース追記

//第五章
class HelloController extends Controller
{
    public function index(Request $request) 
    {
        // $items = DB::select('select * from people');
        $items = DB::table('people')->get(); //↑と同じことしてる
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

    //指定したidのレコードを得る
    public function show(Request $request)  
    {
        $id = $request->id;
        $item = DB::table('people')->where('id', $id)->first();
        return view('hello.show', ['item' => $item]);
    }
}