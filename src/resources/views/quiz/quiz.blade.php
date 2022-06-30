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

{{-- 継承レイアウトの作成
@extends('layouts.quizapp') --}}
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
    
   @if ($id === "1")
     <!-- タイトル↓ -->
      <h2 class='title'>東京の難読地名クイズ</h2>
      @php 
       $x = 1;
      @endphp
      @foreach ($img1 as $value)
       @php
        $n = $loop->index;
       @endphp
      {{-- <pre>@php print_r($value);@endphp</pre> --}}
            <!-- 設問番号↓ -->
               <h3>{{$loop->index+1}}.この地名はなんて読む？</h3>
            <!-- 写真↓ -->
               <img src={{asset("/quiz/img/$value")}} alt='問題{{$value}}の写真' width=auto>
               {{-- <img src={{asset("/quiz/img/takanawa.png")}} alt='問題 たかなわ の写真' width=auto> --}}
            <!-- 選択肢↓ -->
            {{-- @for($i=0; $results1[$i][1] === $n; $i++) --}}
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

   @elseif($id === "2")
      <h2 class='title'>広島の難読地名クイズ</h2>
      @php 
       $x = 1;
      @endphp
      @foreach ($img2 as $value)
       @php
        $n = $loop->index;
       @endphp
      {{-- <pre>@php print_r($value);@endphp</pre> --}}
            <!-- 設問番号↓ -->
               <h3>{{$loop->index+1}}.この地名はなんて読む？</h3>
            <!-- 写真↓ -->
               <img src={{asset("/quiz/img/$value")}} alt='問題{{$value}}の写真' width=auto>
               {{-- <img src={{asset("/quiz/img/takanawa.png")}} alt='問題 たかなわ の写真' width=auto> --}}
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



 