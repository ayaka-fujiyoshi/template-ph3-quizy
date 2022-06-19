<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class HelloController extends Controller
// {
//     public function index() {
//         return <<<EOF
// <html>
// <head>
// <title>Hello/Index</title>
// <style>
// body {font-size:16pt; color:999; }
// h1 { font-size:100pt; text-aligin:right; color:#eee;
//     margin:-40px 0px -50px 0px; }
// </style>
// </head>
// <body>
//    <h1>Index</h1>
//    <p>これは、Helloコントローラーのindexアクションです。</p>
// </body>
// </html>
// EOF;
//     }
// }


//ルートパラメータの利用
// class HelloController extends Controller
// {
//     public function index($id='noname', $pass='unknown') {
//         return <<<EOF
// <html>
// <head>
// <title>Hello/Index</title>
// <style>
// body {font-size:16pt; color:999; }
// h1 { font-size:100pt; text-aligin:right; color:#eee;
//     margin:-40px 0px -50px 0px; }
// </style>
// </head>
// <body>
//    <h1>Index</h1>
//    <p>これは、Helloコントローラーのindexアクションです。</p>
//    <ul>
//         <li>ID: {$id}</li>
//         <li>PASS: {$pass}</li>
//    </ul>
// </body>
// </html>
// EOF;
//     }
// }


// //複数アクションの利用
// global $head, $style, $body, $end;
// $head = '<html><head>';
// $style = <<<EOF
// <style>
// body {font-size:16pt; color:999; }
// h1 { font-size:100pt; text-aligin:right; color:#eee;
//     margin:-40px 0px -50px 0px; }
// </style>
// EOF;
// $body = '</head><body>';
// $end = '</body></html>';

// function tag($tag, $txt){
//     return "<{$tag}>" . $txt . "</{$tag}>";
// }

// class HelloController extends Controller
// {
//     public function index() {
//         global $head, $style, $body, $end;
//         $html = $head . tag('title', 'Hello/Index') . $style .
//              $body
//              . tag('h1', 'Index') . tag('p', 'this is Index page')
//              . '<a href="/hello/other">go to Other page</a>'
//              . $end;
//         return $html;
//     }
//     public function other() {
//         global $head, $style, $body, $end;
//         $html = $head . tag('title', 'Hello/Other') . $style .
//              $body
//              . tag('h1', 'Other') . tag('p', 'this is Other page')
//              . $end;
//         return $html;
//     }
// }


// //HelloControllerをシングルアクション化
// class HelloController extends Controller
// {
//     public function __invoke() {
//         return <<<EOF
//     <html>
//     <head>
//     <title>Hello</title>
//     <style>
//     body {font-size:16pt; color:999; }
//     h1 { font-size:100pt; text-aligin:right; color:#eee;
//         margin:-40px 0px -50px 0px; }
//     </style>
//     </head>
//     <body>
//        <h1>Single Action</h1>
//        <p>これは、シングルアクションコントローラーのアクションです。</p>
//     </body>
//     </html>
//     EOF;
//     }
// }


//RequestおよびResponse
use Illuminate\Http\Response;

class HelloController extends Controller
{
    public function index(Request $request, Response $response) {
    $html = <<<EOF
    <html>
    <head>
    <title>Hello/Index</title>
    <style>
    body {font-size:16pt; color:999; }
    h1 { font-size:100pt; text-aligin:right; color:#eee;
        margin:-40px 0px -50px 0px; }
    </style>
    </head>
    <body>
       <h1>Hello</h1>
       <h3>Request</h3>
       <pre>{$request}</pre>
       <h3>Response</h3>
       <pre>{$response}</pre>
    </body>
    </html>
    EOF;
        $response->setContent($html);
        return $response;
    }
}
