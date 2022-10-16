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
    <h1 class='title'>クイズ大問順番更新ページ</h1>
    {{-- <form action="/admin/order" method="POST"> --}}
      {{-- <table>
        @csrf
        {{-- <input type="hidden" name="id" value="{{$form->id}}"> --}
        @foreach ($items as $item)
        <tr>
          <th>{{$item->name}} order: </th>
          <td><input type="number" name="name" value="{{$item->order}}"></td>
        </tr>
        @endforeach
        <tr><th></th><td><input type="submit" value="send"></td></tr>
      </table> --}}
    @foreach ($items as $item)
      <form method="POST" action="/admin/selectEdit">
        @csrf
        {{-- <input type="hidden" name="_method" value="PATCH" /> --}}
        <input type="hidden" name="order" id="inputId" />
        <input type="hidden" name="id" value="{{$item->id}}" />
      </form>
      <table class="min-w-full text-center">
        <thead class="border-b bg-gray-50">
          <tr>
            <th scope="col" width="10" class="text-sm font-medium text-gray-900 px-6 py-4">
              #
            </th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
              Quiz
            </th>
            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4">
              Up/Down
            </th>
          </tr>
        </thead class="border-b">
        <tbody>
          <tr class="bg-white border-b">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
              {{ $item->order }}
            </td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-left">
              {{ $item->name }}
            </td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
              <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded mr-1 js-up-button" data-id="{{ $item->order }}">↑</button>
              <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded js-down-button" data-id="{{ $item->order }}">↓</button>
            </td>
          </tr>
        </tbody>
      </table>
    @endforeach
    {{-- </form> --}}
  </div>



</body>

<script>
  'use strict';
  {
    //↑ボタン
    const upToSortNumber = (event) => {
      const quizId = Number(event.currentTarget.getAttribute('data-id'));
      const formElement = document.querySelector('form');
      const inputElementForId = document.getElementById('inputId');
      console.log(quizId);
      console.log(quizId-1);
      console.log(formElement);
      console.log(inputElementForId);
  
      inputElementForId.value = quizId-1;
      formElement.submit();
    };
  
    const upButtons = document.getElementsByClassName('js-up-button');
    // console.log(upButtons);
    // document.querySelectorAll('.js-up-button').addEventListener('click', upToSortNumber);
    // ✅ addEventListener to all upButtons
    for (const upButton of upButtons) {
      upButton.addEventListener('click', upToSortNumber);
    }



    //↓ボタン
    const downToSortNumber = (event) => {
      const quizId = Number(event.currentTarget.getAttribute('data-id'));
      const formElement = document.querySelector('form');
  
      const inputElementForId = document.getElementById('inputId');
      console.log(quizId);
      console.log(quizId+1);
      console.log(formElement);
      console.log(inputElementForId);
  
      inputElementForId.value = quizId+1;
      formElement.submit();
    };
  
    const downButtons = document.getElementsByClassName('js-down-button');
    // console.log(downButtons);
    // document.querySelectorAll('.js-down-button').addEventListener('click', downToSortNumber);
    // ✅ addEventListener to all downButtons
    for (const downButton of downButtons) {
      downButton.addEventListener('click', downToSortNumber);
    }

  }
  </script>
</html>
