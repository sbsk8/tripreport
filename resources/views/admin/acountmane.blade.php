<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>たびレポート</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <script  src="js/trip.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
<header>
  @include ('layouts.app')
</header>

<main>
    <div class="container">
        <div class="adcontener_title">
            <p>アカウント一覧</p>
        </div>

        <table class = "table">
            <tr class = "table_sb">
                <th>id</th>
                <th>氏名</th>
                <th>メールアドレス</th>
                <th>投稿一覧</th>
                <th>削除</th>
            </tr>

            @foreach($users as $column)
            <tr>
                <td>{{ $column->id }}</td>
                <td>{{ $column->name }}</td>
                <td>{{ $column->email }}</td>
                <!-- /**編集 */ -->
                <td><a href ="">投稿一覧</a></td>
                <!-- /**削除 */ -->
                <form method="post">
                    @csrf
                <td><a href="" onclick ="return confirm('本当に削除しますか？')">削除</a></td>
                <!-- //編集をクリックでIDを送る-->
                </form>
            </tr>
            @endforeach
        </table>
    </div>
</main>

<fooder>
    <div class="container">
        <p class="float-right">
          <a href="#">トップに戻る</a>
        </p>
    </div>
    
</fooder>

