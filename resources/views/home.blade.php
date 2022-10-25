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

  <main role="main">

    <section class="jumbotron text-center" <?= $acount->role === 1 ? '': 'style = "display:none"';?>>
      <div class="container">
        <h1>管理者メニュー</h1>
      </div>
    </section>

    <div class="admincon"  <?= $acount->role === 1 ? '': 'style = "display:none"';?>>
      <ul class="container">
        <li><a href="{{ route('userAll') }}">アカウント管理</a></li>
        <li><a href="#">お問い合わせ内容確認</a></li>
      </ul>
    </div>

    <section class="jumbotron text-center" <?= $acount->role === 0 ? '': 'style = "display:none"';?>>
      <div class="container">
        <h1>自分の投稿をみる</h1>
        <p class="lead atend">自分の旅を記録しよう！</p>
        <a class="text-width" href="{{ route('NewArticle') }}">{{__('きろくする' )}}</a>
      </div>
    </section>

    <div class="album py-5 bg-light" <?= $acount->role === 0 ? '': 'style = "display:none"';?>>
      <div class="container">
        <div class="row">
          @foreach($usertravel as $column)
          <div class="col-md-4">
            <div class="card mb-4 review">
              <img src="{{ asset($column->photo) }}" class="bd-placeholder-img card-img-top img-thumbnail" width="100%" height="225" />
              <div class="card-body">
                <p class="card-text">{{ $column->travel }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="text-muted">いいね数：{{ $column->countnum}}</small>
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
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('detail',['id' => $column->id]) }}">見る</a></button>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
          <div class="text-center">
            {{ $usertravel->links() }}
          </div>
        </div>
      </div>
    </div>

    <section class="jumbotron text-center">
      <div class="container">
        <h1>公開されている投稿</h1>
        <p class="lead atend">他の人の投稿を見てみよう！</p>
      </div>
    </section>
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row">
          @foreach($othertravel as $columns)
          <div class="col-md-4">
            <div class="card mb-4 review">
            <img src="{{ asset($columns->photo) }}" class="bd-placeholder-img card-img-top img-thumbnail" width="100%" height="225" />
              <div class="card-body">
                <p class="card-text">{{ $columns->travel }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">いいね数：{{ $columns->countnum }}</small>
                    <small class="text-muted">
                        @if($columns->recomment === 5 )
                        <p class="text-warning">{{'★★★★★'}}</p>
                        @elseif($columns->recomment === 4 )
                        <p class="text-warning">{{'★★★★☆'}}</p>
                        @elseif($columns->recomment === 3 )
                        <p class="text-warning">{{'★★★☆☆'}}</p>
                        @elseif($columns->recomment === 2 )
                        <p class="text-warning">{{'★★☆☆☆'}}</p>
                        @elseif($columns->recomment === 1 )
                        <p class="text-warning">{{'★☆☆☆☆'}}</p>
                        @else($columns->recomment === 0 )
                        <p class="text-warning">{{'☆☆☆☆☆'}}</p>
                        @endif
                    </small>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('otherdetail',['id' => $columns->id]) }}">見る</a></button>
                  </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="float-right">
          <a href="{{ route('otherindex') }}">公開一覧を見る</a>
        </div>
      </div>
    </div>

  </main>

  <footer class="text-muted">
    <div class="container">
      <p class="float-right">
        <a href="#">トップに戻る</a>
      </p>
    </div>
  </footer>


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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
