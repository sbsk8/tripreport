<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>たびレポート</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>

<body>
<header>
  @include ('layouts.app')
</header>

<main role="main">
  <div class="container">
    <div class="acountlist">アカウント一覧</div>
    <table class = "table">
        <tr class = "table_sb">
            <th>id</th>
            <th>氏名</th>
            <th>メールアドレス</th>
            <th>投稿一覧</th>
            <th>削除</th>
        </tr>
        @foreach($user as $column)
        <tr>
            <td>{{ $column->id }}</td>
            <td>{{ $column->name }}</td>
            <td>{{ $column->email }}</td>
            <!-- /**編集 */ -->
            <td><a href ="#">投稿一覧</a></td>
            <!-- /**削除 */ -->
            <form method="post">
                @csrf
                <td><a href="{{ route ('userdelete',['id' => $column->id ]) }}" onclick ="return confirm('本当に削除しますか？')">削除</a></td>
            <!-- //編集をクリックでIDを送る-->
            </form>
        </tr>
        @endforeach
    </table>
  </div>
</main>

    <footer class="text-muted">
        <div class="container">
        <p class="float-right">
            <a href="#">トップに戻る</a>
        </p>
        </div>
    </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
