{{-- 第六章 --}}
@extends('layouts.helloapp')
{{-- <style>
    .pagination { font-size: 10pt;}
    .pagination li { display: inline-block;}
    tr th a:link { color: white;}
    tr th a:visited { color: white;}
    tr th a:hover { color: white;}
    tr th a:active { color: white;}
</style> --}}

@section('title', 'Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

@section('content')
    <table>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Age</th>
        </tr>
     @foreach ($items as $item)
         <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
         </tr>
     @endforeach
    </table>
@endsection
@section('footer')
    copyright 2020 tuyano.
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


@foreach ($items as $item)
         <tr>
            <td>{{$item->getData()}}</td>
            <td>
              {{-- @if ($item->board != null)
                {{$item->board->getData()}}
              @endif --}}
              @if ($item->boards != null)
                 <table width="100%">
                   @foreach ($item->boards as $obj)
                      <tr><td>{{$obj->getData()}}</td></tr>
                   @endforeach
                 </table>
              @endif
            </td>
         </tr>
     @endforeach


     