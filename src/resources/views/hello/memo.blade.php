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
