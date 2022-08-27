{{-- 第六章 --}}
@extends('layouts.helloapp')

@section('title', 'Person.Delite')

@section('menubar')
    @parent
    削除ページ
@endsection

@section('content')
    <form method="POST" action="/person/del">
      @csrf
      <input type="hidden" name="id" value="{{$form->id}}">
      <tr><th>name: </th><td><input type="text" name="name" value="{{$form->name}}"></td></tr>
      <tr><th>mail: </th><td><input type="text" name="mail" value="{{$form->mail}}"></td></tr>
      <tr><th>age: </th><td><input type="text" name="age" value="{{$form->age}}"></td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
    </form>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection
