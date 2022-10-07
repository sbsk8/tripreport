<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Destination;
use App\Models\User;


class Good extends Model
{
    use hasFactory;

    protected $table = 'Goods';

    protected $fillable = [
        'id',
        'user_id',
        'destination_id',

    ];

//   public function user()
//   {  //usersテーブルとリレーションを定義
//       return $this->belongsTo('App\Models\User');  //belongsToでstatic、定数、オーバーライドされたクラスにアクセス
//   }
//   public function destination()
//   { //Destinationテーブルとリレーションを定義
//       return $this->belongsTo('App\Models\Destination');
//   }

}
