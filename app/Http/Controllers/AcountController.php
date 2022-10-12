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
    public function userdelete($id){
        $contents = DB::table('destination');
        $contents->where('user_id','=',$id);
        $contents->delete();

        $users = DB::table('users');
        $users->find($id);
        $users->delete($id);

        return redirect()->route('userAll')->with('flash_message','※アカウントを削除しました');

    }
    /** 投稿削除 */
    public function addelete($id){
        $destination = DB::table('destination');
        $destination->find($id);
        // $column = $contacts::findOrFail($id);
        $destination->delete($id);
    
        return redirect()->route('home')->with('flash_message','※投稿を削除しました');
    }

}
