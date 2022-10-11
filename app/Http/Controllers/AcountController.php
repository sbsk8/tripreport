<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class AcountController extends Controller
{
    public function userAll(){

        //アカウント情報の式
        $users = DB::table('users')->get();

        return view('admin.acountmane',compact('users'));
    }

    /** アカウント削除 */
    public function userdelete(){

    }
    /** 投稿削除 */
    public function scrapdelete(){

    }

}
