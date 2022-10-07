<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>たびレポート</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
    <header>
        @include ('layouts.app')
    </header>

    <div class="mypage">
        <img id="profile-img" class="profile-img-card rounded-circle" src="{{Storage::url($user->image)}}" height="200" weight="100" />
        
        <div class="username">
            <p>ようこそ</p>
            <p>{{ Auth::user()->name }} さん</p>
        </div>

        <div class="acount-contens">
          <button class="acountdetail-btn btn-info"><a href="{{ route ('useredit',['user' => $user]) }}">アカウント編集</a></button>
          <button class="acountdetail-btn btn-info"><a href="{{ route ('userdestroy',['user' => $user]) }}" onclick ="return confirm('全ての記録がなくなります。本当に削除しますか？')">アカウント削除</a></button>
        </div>
    </div>


    <main role="main">
    <section class="jumbotron text-center">
      <div class="container">
        <h1>お気に入りした投稿</h1>
        <p class="lead atend">気になる記事はクリックして詳細を見てみよう！</p>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          @foreach($goods as $column)
          <div class="col-md-4">
            <div class="card mb-4 review">
              <img src="{{ asset($column->photo) }}" class="bd-placeholder-img card-img-top img-thumbnail" width="100%" height="225" />
              <div class="card-body">
                <p class="card-text">{{ $column->travel }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">
                      @if($column->recomment === 5 )
                      <p class="text-warning">{{'★★★★★'}}</p>
                      @elseif($column->recomment === 4 )
                      <p class="text-warning">{{'★★★★☆'}}</p>
                      @elseif($column->recomment === 3 )
                      <p class="text-warning">{{'★★★☆☆'}}</p>
                      @elseif($column->recomment === 2 )
                      <p class="text-warning">{{'★★☆☆☆'}}</p>
                      @elseif($column->recomment === 1 )
                      <p class="text-warning">{{'★☆☆☆☆'}}</p>
                      @elseif($column->recomment === 0 )
                      <p class="text-warning">{{'☆☆☆☆☆'}}</p>
                      @endif
                  </small>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('otherdetail',['id' => $column->destination_id]) }}">見る</a></button>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="container">
      <p class="float-right">
        <a href="#">トップに戻る</a>
      </p>
    </div>

  </main>
  <script>
  window.onpageshow = function(event) {
    if (
           event.persisted
        || window.performance && window.performance.navigation.type == 2
    ) {
        window.location.reload();
    }
  };
  </script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>