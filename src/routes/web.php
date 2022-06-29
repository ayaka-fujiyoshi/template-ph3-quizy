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
  Route::get('', function () {
      return view('welcome'); 
  });


//postのルート設定
// Route::get('hello', 'HelloController@index');//こっちも必要
// Route::post('hello', 'HelloController@post');


//quizのルート設定
Route::get('quiz', 'QuizController@index');
Route::get('quiz/{id}', 'QuizController@quiz')->name('quiz');
  //name()でrouteに名前を付ける
  //index.blade.phpで設定したidが{id}に入る