<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    欢迎 {{$_SESSION['adminname']}} 回来 ！
    <a href="{{U('Login/out')}}">退出</a>
    <br>
    <ul>
      <li>
        <a href="{{U('Cate/add')}}">分类添加</a>
      </li>
      <li>
        <a href="{{U('Cate/index')}}">分类展示</a>
      </li>
      <li>
        <a href="{{U('Goods/add')}}">商品添加</a>
      </li>
    </ul>








  </body>
</html>
