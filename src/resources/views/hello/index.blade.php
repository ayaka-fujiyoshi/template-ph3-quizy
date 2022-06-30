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
