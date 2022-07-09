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
         //↑と同じことしてる
        // $items = DB::table('people')->get();
         // ↓並べ順を指定
        $items = DB::table('people')->orderBy('age', 'asc')->get(); 
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
        // DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    // レコード更新
    public function edit(Request $request)  
    {
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        // return view('hello.edit',['form'=>$item[0]]);
        $item = DB::table('people')
                ->where('id', $request->id)->first();
        return view('hello.edit',['form'=>$item]);
    }

    public function update(Request $request)  
    {
        // $param = [
        //     'id' => $request->id,
        //     'name' => $request->name,
        //     'mail' => $request->mail,
        //     'age' => $request->age,
        // ];
        // DB::update('update people set name= :name, mail= :mail, age= :age where id = :id', $param);
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
        // $param = ['id' => $request->id];
        // $item = DB::select('select * from people where id = :id', $param);
        // return view('hello.del',['form'=>$item[0]]);
        $item = DB::table('people')
              ->where('id', $request->id)->first();
        return view('hello.del',['form'=>$item]);
    }

    public function remove(Request $request)  
    {
        // $param = ['id' => $request->id];
        // DB::delete('delete from people where id = :id', $param);
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
}