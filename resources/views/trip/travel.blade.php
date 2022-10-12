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
        <h3>新規投稿</h3>
    <form method="POST" action="{{route ('confirm') }}" enctype="multipart/form-data">
        <!-- <input type="hidden" name="user_id"> -->
        @csrf
        @method('POST')

        <div class="border border-info">
            <div class="formgroup">
                <label for="image">画像登録</label></br>
                <input type="file" id="exampleFormControlFile1" class="imgfile" name="image" value="{{old('image') }}">
                @if ($errors->has('image'))
				    <span class="not">{{ $errors->first('image') }}</span>
			    @endif
            </div>

        
            <div class="formgroup">
                <label for="title">旅先名</label><br>
                @if ($errors->has('title'))
				<span class="not">{{ $errors->first('title') }}</span>
			    @endif
                <input type="text" name="title" class="form-control" value="{{ old('title')  }}">

            </div>

            <div class="formgroup">
                <label for="title">都道府県</label>
                @if ($errors->has('area'))
				    <span class="not">{{ $errors->first('area') }}</span>
			    @endif
                <select type="text" class="prefecture" name="area">                          
                    @foreach(config('pref') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">スター</label>
                <div class="rate-form">
                    <input id="star5" type="radio" name="rate" value="5">
                    <label for="star5">★</label>
                    <input id="star4" type="radio" name="rate" value="4">
                    <label for="star4">★</label>
                    <input id="star3" type="radio" name="rate" value="3">
                    <label for="star3">★</label>
                    <input id="star2" type="radio" name="rate" value="2">
                    <label for="star2">★</label>
                    <input id="star1" type="radio" name="rate" value="1"checked>
                    <label for="star1">★</label>
                </div>
                @if ($errors->has('rate'))
				<span class="not">{{ $errors->first('rate') }}</span>
			    @endif
            </div>

            <div class="formgroup">
                <label for="text">メモ</label>
                @if ($errors->has('content'))
				    <span class="not">{{ $errors->first('content') }}</span>
			    @endif
                <textarea name="content" class="form-control" >{{ old('content') }}</textarea>

            </div>
            <div class="formgroup">
                <label for="private">公開・非公開</label>
                <div class="cklist">
                    <input type="radio" name="public_check" value="1" checked>非公開
                    <input type="radio" name="public_check" value="2">公開
                </div>
            </div>
        </div>

        <div class="tocomf">
            <button type="submit" class="btn btn-primary btn-lg">投稿</button>
        </div>
    </form>
    </div>
</main>


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>