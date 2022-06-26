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

//第三章
//ルートの設定でテンプレートを表示する
// Route::get('hello', function () {
//   return view('hello.index'); 
// });

// //コントローラーでテンプレートを使う
// Route::get('hello', 'HelloController@index');

// //ルートパラメータをテンプレートに渡す ルート情報の修正
// Route::get('hello/{id?}', 'HelloController@index');

//クエリー文字列の利用 ルート情報の修正
Route::get('hello', 'HelloController@index');