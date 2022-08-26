<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
use App\Models\Good;
use App\Models\User;

class Destination extends Model
{
    use HasFactory;


    protected $table = 'destination';

    protected $fillable = [
        'id','user_id',
        'travel',
        'photo',
        'recomment',
        'comment',
        'publish_status',
        'created_at',
        'updated_at'
    ];



    // public function users(){
    //     return $this->belongsToMany('App\Models\User')
    //             ->withTimestamps();
    // }

    // public function favorite_users(){
    //     return $this->belongsToMany(User::class,'goods','destination_id','user_id')->withTimestamps();
    // }


}
