<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get(割り当てるアドレス,関数やコントローラーなど);
// 下記はデフォルトで用意されているトップページのルート情報

use App\Http\Middleware\HelloMiddleware;
// use Illuminate\Routing\Route;  // 第七章 勝手に追加されていた、下記のエラーがでた
                                  // Method Illuminate\Routing\Route::get does not exist.

  Route::get('', function () {
      return view('welcome'); 
  });


//helloのルート設定
Route::get('hello', 'HelloController@index');//top
Route::post('hello', 'HelloController@post');
Route::get('hello/add', 'HelloController@add');//レコード作成
Route::post('hello/add', 'HelloController@create');
Route::get('hello/edit', 'HelloController@edit');//更新
Route::post('hello/edit', 'HelloController@update');
Route::get('hello/del', 'HelloController@del');//削除
Route::post('hello/del', 'HelloController@remove');
Route::get('hello/show', 'HelloController@show');//top 指定したid
  //第七章
Route::resource('rest', 'RestappController');//リソースコントローラーに用意されている７つのアクションメソッドのルート情報
Route::get('hello/rest', 'HelloController@rest');
Route::get('hello/session', 'HelloController@ses_get');
Route::post('hello/session', 'HelloController@ses_put');

//quizのルート設定
Route::get('/', 'QuizController@index');
Route::get('quiz/{id?}', 'QuizController@quiz')->name('quiz');
  //name()でrouteに名前を付ける
  //index.blade.phpで設定したidが{id}に入る
  
