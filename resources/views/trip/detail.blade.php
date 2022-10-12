<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>たびレポート</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
</head>
<body>
    <header>
    @include ('layouts.app')
  </header>

  <main class="newrepo">
    <div class="report">
        <h3>詳細</h3>
        <!-- <input type="hidden" name="user_id"> -->
        <input type="hidden" name ="id" id="id" value="{{ $data->id }}">

        <div class="form-group">
            <label for="image"></label>
            <img src="{{ asset($data->photo) }}" class="img-thumbnail" id="exampleFormControlFile1">
        </div>

        <div class="confirm-text">
            <div class="form-group">
                <h5><label for="title" class="font-weight-bold label">旅先名</label></h5><br>
                <p>{{ $data->travel }}</p>
            </div>

            <div class="form-group">
                <h5><label for="area" class="font-weight-bold label">都道府県</label></h5><br>
                <p>{{ $data->prefecture }}</p>
            </div>

            <div class="form-group">
                <label for="star" class="font-weight-bold label">スター</label>
                    <div class="rate-form">
                      @if($data->recomment === 5 )
                      <p class="text-warning">{{'★★★★★'}}</p>
                      @elseif($data->recomment === 4 )
                      <p class="text-warning">{{'★★★★☆'}}</p>
                      @elseif($data->recomment === 3 )
                      <p class="text-warning">{{'★★★☆☆'}}</p>
                      @elseif($data->recomment === 2 )
                      <p class="text-warning">{{'★★☆☆☆'}}</p>
                      @elseif($data->recomment === 1 )
                      <p class="text-warning">{{'★☆☆☆☆'}}</p>
                      @elseif($data->recomment === 0 )
                      <p class="text-warning">{{'☆☆☆☆☆'}}</p>
                      @endif
                    </div>
            </div>

            <div class="form-group">
                <h5><label for="text" class="font-weight-bold label">メモ</label></h5>
                    <p>{!! nl2br(e($data->comment)) !!}</p>
            </div>
            <div class="form-group">
                <h5><label for="private" class="font-weight-bold label">公開・非公開</label></h5>
                <div class="cklist">
                @if ( $data->publish_status === 1 )
                <p>非公開</p>
                @else
                <p>公開</p>
                @endif
                </div>
            </div>
        </div>

        <div class="display-flex detail-btn">
            <div class="tocomf">
            <button type="button" class="btn btn-primary"><a href="{{ route('home') }}">戻る</a></button>
            </div>
            <div class="tocomf">
            <button type="button" class="btn btn-primary"><a href="{{ route('edit',['id' => $data->id]) }}">編集</a></button>
            </div>
            <div class="tocomf">
            <button type="button" class="btn btn-danger"><a href="{{ route('delete',['id' => $data->id]) }}" onclick ="return confirm('この内容を削除します。よろしいですか？')">削除</a></button>
            </div>
        </div>

    </div>
</main>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
</body>
</html>