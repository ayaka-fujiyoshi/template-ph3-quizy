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
Route::get('hello', 'HelloController@index');//こっちも必要
Route::post('hello', 'HelloController@post');