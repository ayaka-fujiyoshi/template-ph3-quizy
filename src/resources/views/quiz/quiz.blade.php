<?php
//大問・設問・選択テーブルの結合、選択
$img1=array(
  "takanawa.png",
  "kameido.png",
);
$img2=array(
  "mukainada.png",
);
$results1=array(
  [1, 1, 0, "takanawa.png","たかなわ", 1],
  [1, 1, 1, "takanawa.png","たかわ", 0],
  [1, 1, 2, "takanawa.png","こうわ", 0],
  [1, 2, 0, "kameido.png","かめと", 0],
  [1, 2, 1, "kameido.png","かめど", 0],
  [1, 2, 2, "kameido.png","かめいど", 1],
);
$results2=array(
  [2, 3, 0, "mukainada.png","むこうひら", 0],
  [2, 3, 1, "mukainada.png","むきひら", 0],
  [2, 3, 2, "mukainada.png","むかいなだ", 1]
);
//big_quiz_id, question_id, selection_id, image_name, name, valid 
// echo "<pre>";
// print_r($img1);
// echo "</pre>";


// $correct_array = array();
//   for ($j=0; $j < 6; $j++) { 
//    if ($results[$j][5] === '1'){
//       $correct_array[] = $results[$j][4];
//    }
//   }

// //配列をシャッフル→選択肢の番号をシャッフルしてシャッフルした値を元に出力
// $selection_numbers = [0,1,2]; //ここで番号を用意
// shuffle($selection_numbers);

// $selection_number[0] = 0 + $selection_numbers[0];
// $selection_number[1] = 0 + $selection_numbers[1];
// $selection_number[2] = 0 + $selection_numbers[2];
// $selection_number[3] = 3 + $selection_numbers[0];
// $selection_number[4] = 3 + $selection_numbers[1];
// $selection_number[5] = 3 + $selection_numbers[2];

echo $id;
?>




{{-- 継承レイアウトの作成 --}}
@extends('layouts.quizapp')

@section('title', '難読地名クイズ')
@if ($id === "1")
   @section('menu')
       @parent
       {{$big_questions->name}}
       {{-- 取ってきたテーブルの変数->カラム名 --}}
   @endsection
   
   @section('content')
       aaa
   @endsection

@elseif($id === "2")
@section('menu')
       @parent
       {{$big_questions->name}}
   @endsection
   
   @section('content')
       bbb
   @endsection
@endif
