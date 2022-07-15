<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  {{-- cssファイルの呼び出し --}}
  <link rel="stylesheet" href="{{asset('/quiz/kuizy.css')}}" >
  <title>@yield('title')</title>
</head>
<body>

   <div class='mainWrapper'>
      @section('menu')
      @if ($id === "1")
        <!-- タイトル↓ -->
         <h2 class='title'>@show</h2>
         <div class="content">
            @yield('content')
         </div>
         @php 
          $x = 1;
         @endphp
         @foreach ($img1 as $value)
          @php
           $n = $loop->index;
          @endphp
               <!-- 設問番号↓ -->
                  <h3>{{$loop->index+1}}.この地名はなんて読む？</h3>
               <!-- 写真↓ -->
                  <img src={{asset("/quiz/img/$value")}} alt='問題{{$value}}の写真' width=auto>
               <!-- 選択肢↓ -->
           
               @for($i=($x-1)*3; $i < $x*3; $i++) 
                  <ul>
                    <li class='buttonOfOptionNumber' input type='button' value='button' onclick="clickSelectedButton{{$i}}()" id='answerChoice{{$i}}'>
                      @php echo $results1[$i][4]; @endphp
                    </li>
                  </ul>
               @endfor
               <!-- 解答ボックス↓ -->
                  <div id='answerDisplay<?php echo $x; ?>' class='firstIsInvisible'>
                        <li><span>正解!</span></li>
                  </div>
                  <div id='incorrectAnswerDisplay<?php echo $x; ?>' class='incorrectFirstIsInvisible'>
                        <li><span>不正解!</span></li>
                  </div>
                  
         @php
          $x++;
         @endphp
        @endforeach 
      {{-- @elseif($id === "2")
         <h2 class='title'>広島の難読地名クイズ</h2>
         @php 
          $x = 1;
         @endphp
         @foreach ($img2 as $value)
          @php
           $n = $loop->index;
          @endphp
               <!-- 設問番号↓ -->
                  <h3>{{$loop->index+1}}.この地名はなんて読む？</h3>
               <!-- 写真↓ -->
                  <img src={{asset("/quiz/img/$value")}} alt='問題{{$value}}の写真' width=auto>
               <!-- 選択肢↓ -->
               @for($i=($x-1)*3; $i < $x*3; $i++) 
                  <ul>
                    <li class='buttonOfOptionNumber' input type='button' value='button' onclick="clickSelectedButton{{$i}}()" id='answerChoice{{$i}}'>
                      @php echo $results1[$i][4]; @endphp
                    </li>
                  </ul>
               @endfor
               <!-- 解答ボックス↓ -->
                  <div id='answerDisplay<?php echo $x; ?>' class='firstIsInvisible'>
                        <li><span>正解!</span></li>
                  </div>
                  <div id='incorrectAnswerDisplay<?php echo $x; ?>' class='incorrectFirstIsInvisible'>
                        <li><span>不正解!</span></li>
                  </div>
         @php
          $x++;
         @endphp
         @endforeach
      @endif
 </div>
</body>
</html>





{{-- 継承レイアウトの作成 --}}
@extends('layouts.quizapp')

@section('title', '難読地名クイズ')
@if ($id === "1")
   @section('menu')
       @parent
       {{$big_questions->big_question}}
   @endsection
   
   @section('content')
       aaa
   @endsection

@elseif($id === "2")
@section('menu')
       @parent
       {{$big_questions->big_question}}
   @endsection
   
   @section('content')
       bbb
   @endsection
@endif



$big_questions = DB::table('big_questions')->where('id', $id)->first();
        return view('quiz.quiz',['big_questions'=>$big_questions, 'id'=>$id]);