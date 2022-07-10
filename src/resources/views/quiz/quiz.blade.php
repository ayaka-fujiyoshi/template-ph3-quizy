<?php
//大問・設問・選択テーブルの結合、選択
// $img1=array(
//   "takanawa.png",
//   "kameido.png",
// );
// $img2=array(
//   "mukainada.png",
// );
// $results1=array(
//   [1, 1, 0, "takanawa.png","たかなわ", 1],
//   [1, 1, 1, "takanawa.png","たかわ", 0],
//   [1, 1, 2, "takanawa.png","こうわ", 0],
//   [1, 2, 0, "kameido.png","かめと", 0],
//   [1, 2, 1, "kameido.png","かめど", 0],
//   [1, 2, 2, "kameido.png","かめいど", 1],
// );
// $results2=array(
//   [2, 3, 0, "mukainada.png","むこうひら", 0],
//   [2, 3, 1, "mukainada.png","むきひら", 0],
//   [2, 3, 2, "mukainada.png","むかいなだ", 1]
// );

echo $id;
?>




{{-- 継承レイアウトの作成 --}}
@extends('layouts.quizapp')

@section('title', '難読地名クイズ')
@section('menu')
   @parent
   {{$big_questions->name}}の難読地名クイズ
     {{-- 取ってきたテーブルの変数->カラム名 --}}
@endsection

@if ($id === "1")
  {{-- 東京 --}}
   @section('content')
       <table>
        @foreach ($questions as $question)
          <!-- 設問番号↓ -->
          <h3>{{$loop->index+1}}.この地名はなんて読む？</h3>
          <!-- 写真↓ -->
             <img src="{{ asset('/quiz/img/' . $question->image) }}" alt="問題". {{ $question->image }} width=auto>
          <!-- 選択肢↓ -->
           @foreach ($choices->where('question_id', $question->id) as $choice)
             <ul>
                <li class='buttonOfOptionNumber' input type='button' value='button' onclick="clickSelectedButton{{$choice->selection_id}}()" id='answerChoice{{$choice->selection_id}}'>
                  {{$choice->name}}
                </li>
             </ul>
           @endforeach
        @endforeach
       </table>
   @endsection
   
   
@elseif($id === "2")
  {{-- 広島 --}}
   @section('content')
       bbb
   @endsection
@endif


{{-- 
<style>
    th {background-color: #999; color: #fff; padding: 5px 10px;}
    td {border: solid 1px #aaa; color: #999; padding: 5px 10px;}
</style>
<table>
  @foreach ($choices->where('question_id', $question->id) as $choice)
     <tr>
       <td>{{$choice->selection_id}}</td>
       <td>{{$choice->name}}</td>
       <td>{{$choice->valid}}</td>
     </tr> 
  @endforeach
</table>
--}}