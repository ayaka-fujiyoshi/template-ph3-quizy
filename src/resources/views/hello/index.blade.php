{{-- 継承レイアウトの作成 --}}
@extends('layouts.helloapp')

@section('title', 'Index')
@section('menubar')
    @parent
    インデックスページ
@endsection
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
      @if (count($errors) > 0)
          <p>入力に問題があります。再入力してください。</p>
      @endif
    <form method="POST" action="/hello">
        @csrf
        <table>
           @error ('name')
               <tr>
                  <th>ERROR</th>
                  <td>{{$message}}</td>
               </tr>
           @enderror
            <tr><th>name: </th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
           @error ('mail')
               <tr>
                  <th>ERROR</th>
                  <td>{{$message}}</td>
               </tr>
           @enderror
            <tr><th>mail: </th><td><input type="text" name="mail" value="{{old('mail')}}"></td></tr>
           @error ('age')
               <tr>
                  <th>ERROR</th>
                  <td>{{$message}}</td>
               </tr>
           @enderror
            <tr><th>age: </th><td><input type="text" name="age" value="{{old('age')}}"></td></tr>
            <tr><th></th><td><input type="submit" value="send"></td></tr>
        </table>
    </form>
@endsection
@section('footer')
    copyright 2020 tuyano.
@endsection
