<?php
//大問・設問テーブルの結合、選択
$results=array(
  [1, 1, "takanawa.png"],
  [1, 2, "kameido.png"],
  [2, 3, "mukainada.png"]
);
//big_quiz_id, image_id, image_name
echo "<pre>";
print_r($results[1][2]);
echo "</pre>";


//設問・選択テーブルの結合、選択
$inner_results=array(
  [1, 1, 0, "たかなわ", 1],
  [1, 1, 1, "たかわ", 0],
  [1, 1, 2, "こうわ", 0],
  [1, 2, 0, "かめと", 0],
  [1, 2, 1, "かめど", 0],
  [1, 2, 2, "かめいど", 1],
  [2, 3, 0, "むこうひら", 0],
  [2, 3, 1, "むきひら", 0],
  [2, 3, 2, "むかいなだ", 1]
);
//question_id, selection_id, name, valid 
echo "<pre>";
print_r($inner_results[1][2]);
echo "</pre>";


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

{{-- 継承レイアウトの作成
@extends('layouts.quizapp') --}}

@if ($id = 1)
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
    <!-- タイトル↓ -->
    <h2 class='title'>東京の難読地名クイズ</h2>
    @php
     $x = 1;
    @endphp
    @foreach ($results as $value)
          <!-- 設問番号↓ -->
             <h3>{{$loop->index+1}}.この地名はなんて読む？</h3>
          <!-- 写真↓ -->
             <img src={{asset("/quiz/img/takanawa.png")}} alt='問題 たかなわ の写真' width=auto>
          <!-- 選択肢↓ -->
          <!-- 1回目は0,1,2を出力したい、2回目は3,4,5を出力したい -->
             @for ($i=($x-1)*3; $i < $x*3; $i++) 
                   <!-- 1回目は$x=1を代入するので、($i=0; $i < 3; $i++)となり、0,1,2まで出力できる -->
                   <!-- 2回目は$x=2を代入するので、($i=3; $i < 6; $i++)となり、3,4,5まで出力できる -->
                      <ul>
                        <li class='buttonOfOptionNumber' input type='button' value='button' onclick="clickSelectedButton<?php echo $i ;?>()" id='answerChoice<?php echo $i ;?>'>
                          
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
 </div>
</body>
</html>

@else
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
</head>
<body>
<div class='mainWrapper'>
 <!-- タイトル↓ -->
 <h2 class='title'>広島の難読地名クイズ</h2>
 @php
  $x = 1;
 @endphp
 @foreach ($results as $value)
       <!-- 設問番号↓ -->
          <h3>{{$loop->index+1}}.この地名はなんて読む？</h3>
       <!-- 写真↓ -->
       {{-- <img src= 'img/<?php echo $value['image_name']; ?>'  alt='問題 <?php echo $inner_value['image_id']; ?>の写真' width=auto> --}}
          {{--  --}}
       <!-- 選択肢↓ -->
       <!-- 1回目は0,1,2を出力したい、2回目は3,4,5を出力したい -->
          @for ($i=($x-1)*3; $i < $x*3; $i++) 
                <!-- 1回目は$x=1を代入するので、($i=0; $i < 3; $i++)となり、0,1,2まで出力できる -->
                <!-- 2回目は$x=2を代入するので、($i=3; $i < 6; $i++)となり、3,4,5まで出力できる -->
                   <ul>
                     <li class='buttonOfOptionNumber' input type='button' value='button' onclick="clickSelectedButton<?php echo $i ;?>()" id='answerChoice<?php echo $i ;?>'>

                       {{-- <?php echo $inner_results[$selection_number[$i]]['choice_name'];?> --}}
                     </li>
                   </ul>
          @endfor
       <!-- 解答ボックス↓ -->
          <div id='answerDisplay<?php echo $x; ?>' class='firstIsInvisible'>
                <li><span>正解!</span></li>
                {{-- <li>正解は <?php echo $correct_array[$x-1]; ?> です!</li> --}}
          </div>
          <div id='incorrectAnswerDisplay<?php echo $x; ?>' class='incorrectFirstIsInvisible'>
                <li><span>不正解!</span></li>
                {{-- <li>正解は <?php echo $correct_array[$x-1]; ?> です!</li> --}}
          </div>
 @php
  $x++;
 @endphp
 @endforeach
</div>
</body>
</html>
@endif