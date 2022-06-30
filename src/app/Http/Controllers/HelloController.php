<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


//ビューコンポーザーを利用する
class HelloController extends Controller
{
    public function index() 
    {
        return view('hello.index',['message'=>'Hello!']);
    }
}