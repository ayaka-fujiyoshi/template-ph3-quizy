{{-- 第六章 --}}
@extends('layouts.helloapp')

@section('title', 'Person.index')

@section('menubar')
    @parent
    インデックスページ
@endsection

{{-- personクラスの拡張の使用 --}}
{{-- @section('content')
    <table>
        <tr>
          <th>Person</th>
          <th>Board</th>
        </tr>
     @foreach ($hasItems as $item)
         <tr>
            <td>{{$item->getData()}}</td>
            <td>
              <table width="100%">
                @foreach ($item->boards as $obj)
                   <tr><td>{{$obj->getData()}}</td></tr>
                @endforeach
              </table>
            </td>
         </tr>
     @endforeach
    </table>
    <div style="margin: 10px;"></div>
    <table>
      <tr><th>Person</th></tr>
      @foreach ($hasItems as $item)
         <tr>
            <td>{{$item->getData()}}</td>
         </tr>
     @endforeach
    </table>
@endsection --}}
@section('content')
    <table>
        <tr>
          <th>Message</th>
          <th>Name</th>
        </tr>
     @foreach ($items as $item)
         <tr>
            <td>{{$item->message}}</td>
            <td>{{$item->person->name}}</td>
         </tr>
     @endforeach
    </table>
@endsection

@section('footer')
    copyright 2020 tuyano.
@endsection
