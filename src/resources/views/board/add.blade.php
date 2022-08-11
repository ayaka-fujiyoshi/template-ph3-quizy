{{-- 第六章 --}}
@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
      投稿ページ
@endsection

{{-- personクラスの拡張の使用 --}}
@section('content')
<form method="POST" action="/board/add">
  <table>
      @csrf
      <tr><th>person id: </th><td><input type="number" name="person_id"></td></tr>
      <tr><th>title: </th><td><input type="text" name="title"></td></tr>
      <tr><th>message: </th><td><input type="text" name="message"></td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
  </table>
</form>
@endsection
@section('footer')
    copyright 2020 tuyano.
@endsection
