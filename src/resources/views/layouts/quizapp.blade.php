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
        <!-- タイトル↓ -->
         <h2 class='title'>@show</h2>
         <div class="content">
            @yield('content')
         </div>
 </div>
</body>
</html>

