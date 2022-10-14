<?php
ini_set('display_errors',1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>たびレポート</title>
</head>
<body>
    <header>
    @include ('layouts.app')
  </header>

  <main class="newrepo">
    <div class="report">
        <h3>詳細</h3>
        <form method ="POST">
            @csrf
        <!-- <input type="hidden" name="user_id"> -->
        <input type="hidden" name="id" value="{{ $data->id }}">

        <div class="form-group">
            <label for="image"></label>
            <img src="{{ asset($data->photo) }}" class="img-thumbnail" id="exampleFormControlFile1">
        </div>

        <div class="confirm-text">
            <div class="form-group">
                <label for="title" class="font-weight-bold label">旅先名</label><br>
                <p class="ans">{{ $data->travel }}</p>
            </div>

            <div class="form-group">
                <label for="area" class="font-weight-bold label">都道府県</label><br>
                <p class="ans">{{ $data->prefecture }}</p>
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
                <label for="text" class="font-weight-bold label">メモ</label>
                    <p class="ans">{!! nl2br(e($data->comment)) !!}</p>
            </div>

        </div>
        <!-- /**いいね機能  //javaのgoodbutton発火 すでにいいねされていたらいいね取り消す*/ -->
        <div class="goodbutton">  
        @if($good !== null)
            <a class="btn btn-secondary like-toggle liked" data-destination-id="{{ $data->id }}">☆いいね！</a>
        @else
            <a class="btn btn-secondary like-toggle" data-destination-id="{{ $data->id }}">☆いいね！</a>
        @endif
        </div>
        <div class="goodcount">
        </div>

        <div class="bottan">
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="javascript:history.back();">戻る</button>
        </div>
        </form>
        <div class="tocomf"  <?= $acount->role === 1 ? '': 'style = "display:none"';?>>
            <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('addelete',['id' => $data->id]) }}" onclick ="return confirm('この内容を削除します。よろしいですか？')">この投稿を管理者権限で削除</a></button>
        </div>

    </div>
</main>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        $('.like-toggle').on('click',function() {
            $this = $('.like-toggle');    //aタグ
            const $destinationId = $this.data('destination-id');
            $.ajax({
                type:"POST",
                url:"/good",
                dataType:"json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    "destination_id":$destinationId
                }
            }).done(function (data){
                console.log("成功");
                $this.toggleClass("liked");
            }).fail(function (data){
                console.log("失敗しました");
                console.log(data);
            });
        });
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="/css/style.css">
</body>
</html>