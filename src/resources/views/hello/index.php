<!-- 第三章 -->
<html>
  <head>
    <title>Hello/Index</title>
    <style>
     body {font-size:16pt; color:999; }
     h1 { font-size:100pt; text-aligin:right; color:#eee;
          margin:-40px 0px -50px 0px; }
    </style>
  </head>
  <!-- 
  <body>
  <h1>Index</h1>
  <p>This is a sample page with php-template.</p>
  </body> 
  -->
  <!-- 値をテンプレートに渡す
  <body>
   <h1>Index</h1>
   <p><?php echo $msg;?></p>
   <p><?php echo date("Y年n月j日"); ?></p>
  </body> -->
  <!-- ルートパラメータをテンプレートに渡す -->
  <body>
   <h1>Index</h1>
   <p><?php echo $msg;?></p>
   <p>ID=<?php echo $id; ?></p>
  </body>
</html>