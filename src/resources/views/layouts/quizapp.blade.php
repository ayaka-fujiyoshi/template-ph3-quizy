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
    <h2 class='title'>@yield('title')</h2>
    {{-- @php
     $x = 1;
    @endphp --}}
    {{-- @foreach ($results as $value) --}}
          <!-- 設問番号↓ -->
             <h3>{{$loop->index+1}}.この地名はなんて読む？</h3>
          <!-- 写真↓ -->
             @yield('image')
             {{--  --}}
          <!-- 選択肢↓ -->
          <!-- 1回目は0,1,2を出力したい、2回目は3,4,5を出力したい -->
             @for ($i=($x-1)*3; $i < $x*3; $i++) 
                   <!-- 1回目は$x=1を代入するので、($i=0; $i < 3; $i++)となり、0,1,2まで出力できる -->
                   <!-- 2回目は$x=2を代入するので、($i=3; $i < 6; $i++)となり、3,4,5まで出力できる -->
                      <ul>
                        <li class='buttonOfOptionNumber' input type='button' value='button' onclick="clickSelectedButton<?php echo $i ;?>()" id='answerChoice<?php echo $i ;?>'>
                          @yield('content')
                          {{-- <?php echo $inner_results[$selection_number[$i]]['choice_name'];?> --}}
                        </li>
                      </ul>
             @endfor
          <!-- 解答ボックス↓ -->
             <div id='answerDisplay<?php echo $x; ?>' class='firstIsInvisible'>
                   <li><span>正解!</span></li>
                   @yield('correct_answer')
                   {{-- <li>正解は <?php echo $correct_array[$x-1]; ?> です!</li> --}}
             </div>
             <div id='incorrectAnswerDisplay<?php echo $x; ?>' class='incorrectFirstIsInvisible'>
                   <li><span>不正解!</span></li>
                   @yield('wrong_answer')
                   {{-- <li>正解は <?php echo $correct_array[$x-1]; ?> です!</li> --}}
             </div>
    {{-- @php
     $x++;
    @endphp
    @endforeach --}}
 </div>

</body>
</html>




{{-- <img src= 'img/<?php echo $value['image_name']; ?>'  alt='問題 <?php echo $inner_value['image_id']; ?>の写真' width=auto> --}}
{{-- <?php echo $inner_results[$selection_number[$i]]['choice_name'];?> --}}
{{-- <li>正解は <?php echo $correct_array[$x-1]; ?> です!</li> --}}
{{-- <li>正解は <?php echo $correct_array[$x-1]; ?> です!</li> --}}