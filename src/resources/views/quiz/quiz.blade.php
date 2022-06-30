<?php
//大問・設問テーブルの結合、選択
$results=array(
  [1, 1, "takanawa.png"]
  [1, 2, "kameido.png"]
  [2, 3, "mukainada.png"]
) 
//big_quiz_id, image_id, image_name


//設問・選択テーブルの結合、選択
$inner_results=array(
  [1, 1, 0, "たかなわ", 1];
  [1, 1, 1, "たかわ", 0];
  [1, 1, 2, "こうわ", 0];
  [1, 2, 0, "かめと", 0];
  [1, 2, 1, "かめど", 0];
  [1, 2, 2, "かめいど", 1];
  [2, 3, 0, "むこうひら", 0];
  [2, 3, 1, "むきひら", 0];
  [2, 3, 2, "むかいなだ", 1];
)
//question_id, selection_id, name, valid 

$correct_array = array();
  for ($j=0; $j < 6; $j++) { 
   if ($inner_results[$j][4] === '1'){
      $correct_array[] = $inner_results[$j][3];
   }
  }

//配列をシャッフル→選択肢の番号をシャッフルしてシャッフルした値を元に出力
$selection_numbers = [0,1,2]; //ここで番号を用意
shuffle($selection_numbers);

$selection_number[0] = 0 + $selection_numbers[0];
$selection_number[1] = 0 + $selection_numbers[1];
$selection_number[2] = 0 + $selection_numbers[2];
$selection_number[3] = 3 + $selection_numbers[0];
$selection_number[4] = 3 + $selection_numbers[1];
$selection_number[5] = 3 + $selection_numbers[2];

?>

{{-- 継承レイアウトの作成 --}}
@extends('layouts.quizapp')

@if ($id = 1)
   @section('title', '東京の難読地名クイズ')
   @section('image')
   <img src= 'img/{{$value[3]}}'  alt='問題 <?php echo $inner_value['image_id']; ?>の写真' width=auto>
   <img src= 'img/<?php echo $value['image_name']; ?>'  alt='問題 <?php echo $inner_value['image_id']; ?>の写真' width=auto>
   @endsection
   @section('content')
       <p>ここが本文のコンテンツです。</p>
       {{-- ビューコンポーザーを利用する --}}
          <p>Controller value<br>'message' = {{$message}}</p>
          <p>Viewcomposer value<br>'view_message' = {{$view_message}}</p>
   @endsection
   @section('correct_answer')
       copyright 2020 tuyano.
   @endsection
   @section('wrong_answer')
       copyright 2020 tuyano.
   @endsection

@else
   @section('title', '広島の難読地名クイズ')
   @section('image')
       @parent
       インデックスページ
   @endsection
   @section('content')
       <p>ここが本文のコンテンツです。</p>
       {{-- ビューコンポーザーを利用する --}}
          <p>Controller value<br>'message' = {{$message}}</p>
          <p>Viewcomposer value<br>'view_message' = {{$view_message}}</p>
   @endsection
   @section('correct_answer')
       copyright 2020 tuyano.
   @endsection
   @section('wrong_answer')
       copyright 2020 tuyano.
   @endsection
@endif