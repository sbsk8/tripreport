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
    <section class="text-center">
      <p>都道府県から検索</p>
        <form class="search_form">
            <select type="text" class="prefecture" name="area">                          
                @foreach(config('pref') as $key => $score)
                    <option value="{{ $score }}">{{ $score }}</option>
                @endforeach
            </select>
            <p><input type="submit" class="btn btn-sm btn-outline-secondary" value="検索"></p>
        </form>
        <p class="lead atend">"{{ $place }}" でヒットした件数： {{ $count_travel }} 件</p>
    </section>

    <section class="jumbotron text-center">
      <div class="container">
        <h1>検索結果一覧</h1>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          @foreach($serchtravel as $columns)
          <div class="col-md-4">
            <div class="card mb-4 review">
              <img src="{{ asset($columns->photo) }}" class="bd-placeholder-img card-img-top img-thumbnail" width="100%" height="225" />
              <div class="card-body">
                <p class="card-text">{{ $columns->travel }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">いいね数：{{ $columns->countnum }}</small>
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('otherdetail',['id' => $columns->id]) }}">見る</a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>



</main>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
