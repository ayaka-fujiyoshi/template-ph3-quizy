<!-- 第三章 -->
{{-- <html>
  <head>
    <title>Hello/Index</title>
    <style>
     body {font-size:16pt; color:999; }
     h1 { font-size:50pt; text-align:right; color:#f6f6f6;
          margin:-20px 0px -30px 0px; letter-spacing: -4pt;}
    </style>
  </head> --}}

  <!-- <body>
   <h1>Blade/Index</h1>
   <p>{ {$msg}}</p>
  </body> -->
  <!-- フォームを利用する
  <body>
   <h1>Blade/Index</h1>
   <p>{ {$msg}}</p>
   <form method="POST" action="/hello">
    @csrf
    <input type="text" name="msg">
    <input type="submit">
   </form>
  </body> -->
  {{-- <!-- ＠ifを利用する -->
  <body>
   <h1>Blade/Index</h1>
   @if ($msg != '')
   <p>こんにちは、{{$msg}}さん。</p>
   @else
   <p>何か書いてください。</p>
   @endif
   <form method="POST" action="/hello">
    @csrf
    <input type="text" name="msg">
    <input type="submit">
   </form>
  </body> --}}
  {{-- <!-- ＠issetで変数定義をチェックする -->
  <body>
   <h1>Blade/Index</h1>
   @isset($msg)
   <p>こんにちは、{{$msg}}さん。</p>
   @else
   <p>何か書いてください。</p>
   @endisset
   <form method="POST" action="/hello">
    @csrf
    <input type="text" name="msg">
    <input type="submit">
   </form>
  </body> --}}
  <!-- ＠繰り返しのディレクティブ -->
  {{-- <body>
   <h1>Blade/Index</h1>
   <p>&#064;foreachディレクティブの例</p>
   <ol>
    @foreach ($data as $item)
        <li>{{$item}}
    @endforeach
   </ol>
  </body> --}}
  {{-- ＠breakと＠continue
  <body>
   <h1>Blade/Index</h1>
   <p>&#064;foreachディレクティブの例</p>
   <ol>
    @for ($i = 1; $i < 100; $i++)
        @if ($i % 2 == 1)
            @continue
        @elseif ($i <= 10)
            <li>No, {{$i}}
        @else
            @break
        @endif
    @endfor
   </ol>
  </body> --}}
  {{-- ＠loopによるループ変数
  <body>
   <h1>Blade/Index</h1>
   <p>&#064;foreachディレクティブの例</p>
   <ol>
    @foreach ($data as $item)
        @if ($loop->first)
           <p>※データ一覧</p><ul>
        @endif
        <li>No, {{$loop->iteration}}. {{$item}}</li>
        @if ($loop->last)
           </ul><p>ーーここまで</p><ul>
        @endif
    @endforeach
   </ol>
  </body> --}}
  {{-- phpディレクティブについて --}}
  {{-- <body>
   <h1>Blade/Index</h1>
   <p>&#064;whileディレクティブの例</p>
   <ol>
    @php
        $counter = 0;
    @endphp
    @while ($counter < count($data))
       <li>{{$data[$counter]}}</li>
       @php
           $counter++;
       @endphp
    @endwhile
   </ol>
  </body> --}}

{{-- </html> --}}


{{-- 継承レイアウトの作成 --}}
@extends('layouts.helloapp')

@section('title', 'Index')
@section('menubar')
    @parent
    インデックスページ
@endsection
@section('content')
    <p>ここが本文のコンテンツです。</p>
    {{-- コンポーネントを組み込む --}}
      {{-- <p>必要なだけ記述できます。</p> --}}
      {{-- @component('components.message')
          @slot('msg_title')
              CAUTION!
          @endslot
          @slot('msg_content')
              これはメッセージの表示です。
          @endslot
      @endcomponent --}}
    {{-- コンポーネント ここまで --}}
    {{-- サブビューで読み込む --}}
      {{-- <p>必要なだけ記述できます。</p> --}}
      {{-- @include('components.message', ['msg_title'=>'OK',
            'msg_content'=>'サブビューです。']) --}}
    {{-- ＠eachによるコレクションビュー --}}
      {{-- <ul>
        @each('components.item', $data, 'item')
      </ul>  --}}
    {{-- ビューコンポーザーを利用する --}}
       <p>Controller value<br>'message' = {{$message}}</p>
       <p>Viewcomposer value<br>'view_message' = {{$view_message}}</p>
@endsection
@section('footer')
    copyright 2020 tuyano.
@endsection


{{-- 継承レイアウトの作成 --}}
@extends('layouts.helloapp')

@section('title', 'Index')
@section('menubar')
    @parent
    インデックスページ
@endsection
@section('content')
    <p>ここが本文のコンテンツです。</p>
    {{-- ビューコンポーザーを利用する --}}
       <p>Controller value<br>'message' = {{$message}}</p>
       <p>Viewcomposer value<br>'view_message' = {{$view_message}}</p>
@endsection
@section('footer')
    copyright 2020 tuyano.
@endsection




{{-- 第四章 --}}
@section('content')
    <p>ここが本文のコンテンツです。</p>
    {{-- middlewareで追加されたデータが表示 --}}
    {{-- <table>
     @foreach ($data as $item)
         <tr><th>{{$item['name']}}</th><td>{{$item['mail']}}</td></tr>
     @endforeach
    </table> --}}
    {{-- レスポンスを操作する --}}
    {{-- <p>これは、<middleware>google.com</middleware>へのリンクです。</p>
    <p>これは、<middleware>yahoo.co.jp</middleware>へのリンクです。</p> --}}
    {{-- バリデーションを利用する --}}
    <p>{{$msg}}</p>
      {{-- エラーメッセージと値の保持 --}}
      @if (count($errors) > 0)
          <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
          </div>
      @endif
      {{-- ここまでerror --}}
    <form method="POST" action="/hello">
        <table>
            @csrf
            <tr><th>name: </th><td><input type="text" name="name"></td></tr>
            <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
            <tr><th>age: </th><td><input type="text" name="age"></td></tr>
            <tr><th></th><td><input type="submit" value="send"></td></tr>
        </table>
    </form>
@endsection




{{-- フィールドごとにエラー表示 --}}
<p>{{$msg}}</p>
@if (count($errors) > 0)
    <p>入力に問題があります。再入力してください。</p>
@endif
<form method="POST" action="/hello">
  @csrf
  <table>
     @if ($errors->has('name'))
         <tr><th>ERROR</th><td>{{$errors->first('name')}}</td></tr>
     @endif
      <tr><th>name: </th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
     @if ($errors->has('mail'))
         <tr><th>ERROR</th><td>{{$errors->first('mail')}}</td></tr>
     @endif
      <tr><th>mail: </th><td><input type="text" name="mail" value="{{old('mail')}}"></td></tr>
     @if ($errors->has('age'))
         <tr><th>ERROR</th><td>{{$errors->first('age')}}</td></tr>
     @endif
         <tr><th>age: </th><td><input type="text" name="age" value="{{old('age')}}"></td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
  </table>
</form>