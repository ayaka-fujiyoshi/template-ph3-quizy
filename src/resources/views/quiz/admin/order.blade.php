<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('/quiz/kuizy.css')}}" >
  <title>quizy</title>
</head>
<body>
  <div class='mainWrapper'>
    <h1 class='title'>クイズ設問 更新ページ</h1>
    <form action="/admin/order" method="POST">
      <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        @foreach ($questions as $question)
        {{-- 選択肢 order: 番号 が↓に並ぶように --}}
        <tr>
          <th>
             <a href="{{route('admin.choice', ['id' => $loop->index+1])}}">{{$question->image_name}}</a>
          </th>
          <td>順番: <input type="number" name="order" value="{{$question->order}}"></td>
          <td>
             <a href="{{route('admin.edit', ['id' => $loop->index+1])}}">
               タイトル編集
             </a>
          </td>
          <td>
             <a href="{{route('admin.del', ['id' => $loop->index+1])}}">
               削除画面
             </a>
          </td>
        </tr>
        @endforeach
        <tr><th></th><td><input type="submit" value="send"></td></tr>
      </table>
    </form>
  </div>

</body>
</html>
