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
        <h3>編集画面</h3>

        <form action="{{route ('editUpdate',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data" class="conf_form">
        <!-- <input type="hidden" name="user_id"> -->
        @csrf
        @method('POST')
        <div class="form-group">
            <div>
                <img src="{{ asset($data->photo) }}" class="form-control-image" id="exampleFormControlFile1">
            </div>
            <div>
                <label for="image"class="font-weight-bold">写真変更</label></br>
                <input type="file" id="exampleFormControlFile1" name="image">
            </div>
        </div>

        <div class="border border-info">
            <div class="form-group">
                <label for="title" class="font-weight-bold">旅先名</label><br>
                <input type="text" name="title" class="form-control" value="{{ $data->travel }}">
            </div>

            <div class="form-group">
                <label for="star" class="font-weight-bold">スター</label>
                <div class="rate-form">
                    <input id="star5" type="radio" name="rate" value="5" <?php if($data->recomment  == "5"){print "checked";}?>>
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4" <?php if($data->recomment  == "4"){print "checked";}?>>
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3" <?php if($data->recomment  == "3"){print "checked";}?>>
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2" <?php if($data->recomment  == "2"){print "checked";}?>>
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1" <?php if($data->recomment  == "1"){print "checked";}?>>
                    <label for="star1">★</label>
                </div>
            </div>


            <div class="form-group">
                <label for="text" class="font-weight-bold">メモ</label>
                    <textarea name="content" class="form-control" style="height: 160px;">{{ $data->comment }}</textarea>
            </div>
            <div class="form-group">
                <label for="private" class="font-weight-bold">公開・非公開</label>
                <div class="cklist">
                    <input type="radio" name="public_check" value="1" <?php if($data->publish_status == "1"){print "checked";}?>>非公開
                    <input type="radio" name="public_check" value="2" <?php if($data->publish_status == "2"){print "checked";}?>>公開
                </div>
            </div>
        </div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
        <div class="tocomf">
            <button type="submit" class="btn btn-primary btn-lg" onclick ="return confirm('この内容で更新します。よろしいですか？')">更新</button>
        </div>

        </form>


    </div>
</main>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>