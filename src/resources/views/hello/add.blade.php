{{-- 継承レイアウトの作成 --}}
@extends('layouts.helloapp')

@section('title', 'Add')
@section('menubar')
    @parent
    新規作成ページ
@endsection

@section('content')
    {{-- <p>ここが本文のコンテンツです。</p> --}}
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
    {{-- <p>{{$msg}}</p>
      @if (count($errors) > 0)
          <p>入力に問題があります。再入力してください。</p>
      @endif --}}
    <form action="/hello/add" method="POST">
      <table>
          @csrf
          <tr><th>name: </th><td><input type="text" name="name"></td></tr>
          <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
          <tr><th>age: </th><td><input type="text" name="age"></td></tr>
          <tr><th></th><td><input type="submit" value="send"></td></tr>
      </table>
    </form>
    {{-- <table>
        <tr><th>Name</th><th>Mail</th></tr>
     @foreach ($items as $item)
         <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
         </tr>
     @endforeach
    </table> --}}
@endsection
@section('footer')
    copyright 2020 tuyano.
@endsection
