<?php
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

<header>
    @include('layouts.app')
</header>

@section('content')

<div class="container acount-cont">
    <label class="acount-label font-weight-bold text-center">アカウント編集</label>
        <div class="card card-container  acount-contener">
            <p id="profile-name" class="profile-name-card"></p>
            <form method="POST" action="{{ route ('userupdate',['id' => $acount->id]) }}" class="form-userup" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="form-group text-center">
                    <img class="img-thumbnail" src="{{Storage::url($acount->image)}}" alt="Thumbnail image" width="35%" height="150" />
                    <input id="my-icon" accept="image/png,image/jpeg" class="form-control-file" name="image" type="file">
                    
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">ユーザ名</label>
                    <input type="text" name="name" class="form-control" id="formGroupExampleInput" value="{{ $acount->name }}" required>
                    @if ($errors->has('name'))
				    <span class="not">{{ $errors->first('name') }}</span>
			    @endif
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput2">メールアドレス</label>
                    <input type="email" name="email" class="form-control" id="formGroupExampleInput2" value="{{ $acount->email }}" required autofocus>
                    @if ($errors->has('email'))
				<span class="not">{{ $errors->first('email') }}</span>
			    @endif
                </div>

                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" onclick ="return confirm('登録された内容を変更します。よろしいですか？')">変更する</button>
            </form><!-- /form -->
            <div class="form-userup bottan">
                <a class="btn btn-lg btn-primary btn-block btn-signin" href="{{ url('/users') }}">戻る</a>
            </div>
        </div><!-- /card-container -->
</div><!-- /container -->


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
