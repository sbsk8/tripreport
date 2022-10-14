<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Destination;
use App\Models\User;


class AcountController extends Controller
{

    public function userAll(){
        $user = DB::table('users')->get();

        return view('admin.acountmane',['user' =>$user]);
    }

    /**管理者権限投稿削除 */
    public function addelete($id){
        $contents = DB::table('destination');
        $contents->find($id);
        $contents->delete();
        return redirect()->route('home')->with('flash_message','※投稿を削除しました');
    }

    /**ユーザー削除 */
    public function userdelete($id){
        $contents = DB::table('destination');
        $contents->where('user_id','=',$id);
        $contents->delete();

        $users = DB::table('users');
        $users->find($id);
        $users->delete($id);
        return redirect()->route('userAll')->with('flash_message','※ユーザーを削除しました');
    }


}