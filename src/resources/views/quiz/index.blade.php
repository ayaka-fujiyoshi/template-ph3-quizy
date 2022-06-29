<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>quizy</title>
</head>
<body>
  <ul>
    <li>
      <a href="{{route('quiz', ['id' => 1])}}">ガチで東京の人しか解けない！＃東京の難読地名クイズ</a>
      {{-- route()でid=1と設定 --}}
    </li>
  </ul>
</body>
</html>