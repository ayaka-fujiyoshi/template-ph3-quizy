{{-- 第六章 --}}
@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
    ボード・ページ
@endsection

{{-- personクラスの拡張の使用 --}}
@section('content')
    <table>
        <tr>
          <th>Data</th>
        </tr>
     @foreach ($items as $item)
         <tr>
            <td>{{$item->getData()}}</td>
         </tr>
     @endforeach
    </table>
@endsection
@section('footer')
    copyright 2020 tuyano.
@endsection
