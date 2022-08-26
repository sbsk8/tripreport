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
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <header>
    @include ('layouts.app')
  </header>

  <main class="newrepo">
    <div class="report">
        <h3>内容確認画面</h3>
    <form action="{{route ('ContentUp') }}" method="POST" enctype="multipart/form-data">
        <!-- <input type="hidden" name="user_id"> -->
        <dl class="confirm">
            {{ csrf_field() }}
            {{ method_field('POST') }}

            <div class="border border-info">
                <div class="formgroup">
                    <label for="image">画像登録</label>
                    <img src="{{ $data['read_temp_path'] }}" class="form-control-image" id="exampleFormControlFile1">
                    <input type="hidden" name="image" value="{{ $data['read_temp_path'] }}">
                </div>

                <div class="formgroup">
                    <label for="title">旅先名</label><br>
                    <p>{{ $data['title'] }}</p>
                    <input type="hidden" name="title" class="formtitle" value="{{ $data['title'] }}">
                </div>

                <div class="formgroup">
                    <label for="star">スター</label>
                    <div class="rate-form">
                        @if($data['rate'] === "5" )
                        <p class="text-warning">★★★★★</p>
                        @elseif($data['rate'] === "4" )
                        <p class="text-warning">★★★★☆</p>
                        @elseif($data['rate'] === "3" )
                        <p class="text-warning">★★★☆☆</p>
                        @elseif($data['rate'] === "2" )
                        <p class="text-warning">★★☆☆☆</p>
                        @else($data['rate'] === "1" )
                        <p class="text-warning">★☆☆☆☆</p>
                        @endif
                        <input type="hidden" name="rate" value="{{ $data['rate'] }}">
                    </div>
                </div>


                <div class="formgroup">
                    <label for="text">メモ</label>
                    <p>{!! nl2br(e($data['content'])) !!}</p>
                        <input type="hidden" name="content" class="form-control" value="{{ $data['content']}}" ></textarea>
                </div>
                <div class="formgroup">
                    <label for="private">公開・非公開</label>
                    <div class="cklist">
                        @if($data['public_check'] === "1" )
                        <p>非公開</p>
                        @else
                        <p>公開</p>
                        @endif
                        <input type="hidden" name="public_check" value="{{ $data['public_check'] }}">
                    </div>
                </div>
            </div>
        </dl>

        <div class="bottan">
        <a class="btn btn-primary btn-lg" href="{{ url('/NewArticle') }}">戻る</a>
            <button type="submit" class="btn btn-primary btn-lg" onclick ="return confirm('この内容で投稿します。よろしいですか？')">投稿</button>
        </div>
    </form>
    </div>
</main>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
    
</body>
</html>