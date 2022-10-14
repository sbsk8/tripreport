<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**トップページ サムネイル部分表示*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::id();
        $users = DB::table('users');
        $acount = $users->find($user);
        $othertravel = DB::table('destination as d')
            ->select([
                'd.id','d.travel','d.photo','d.recomment',
                DB::raw("(SELECT COUNT(user_id) FROM goods as g WHERE g.destination_id = d.id ) as countnum")
                ])
            ->orderBy('countnum','desc')
            ->where('publish_status','=',2)
            ->limit(4)
            ->get();

        $usertravel = DB::table('destination as d')
            ->select([
                'd.id','d.travel','d.photo','d.recomment',
                DB::raw("(SELECT COUNT(user_id) FROM goods as g WHERE g.destination_id = d.id ) as countnum")
                ])
            ->where('user_id','=',$user)
            ->orderBy('id','desc')
            ->get();

        return view('home',compact('usertravel','othertravel','acount'));
    }


    /**マイページ */
    public function users()
    {
        $user = \Auth::user();
        $user_id = Auth::id(); 
        //お気に入りのデータを取得
        $goods = DB::table('goods as g')->select('g.destination_id','g.user_id','d.travel','d.photo','d.recomment')
                                        ->join('destination as d','d.id','=','g.destination_id')
                                        ->join('users as u','u.id','=','g.user_id')
                                        ->where('g.user_id','=',$user_id)
                                        ->orderBy('g.id','desc')
                                        ->get();
        return view('acount.plofile',compact('goods','user'));
    }


    /**アカウント編集 */
    public function useredit()
    {
        $users = DB::table('users');
        $id = Auth::id();
        $acount = $users->find($id);
        return view('acount.useredit',['acount' =>$acount,'id'=>$id]);
    }

    /**アカウント編集実行 */
    public function userupdate(Request $request,$id)
    {
        $inputs = $request->all();
            if(!$inputs){
                return redirect()->route('users');
            }
            $request->validate([
                'name' => 'required',
                'email' => ['required','email'],
            ]);
            
            if($request->image != null) {
                $path = $request->file('image')->store('public/image');
                $users = DB::table('users');
                $users->find($id);
                $users->update([
                    'image' => $path,
                ]);
            }
        $users = DB::table('users');
        $users->find($id);
        $users->update([
            'name' => $request['name'],
            'email' => $request['email'],

        ]);

        return redirect()->route('users')->with('flash_message','ユーザー情報を編集しました！');
    
    }

    public function userdestroy($user)
    {
        $contents = DB::table('destination');
        $contents->where('user_id','=',$user);
        $contents->delete();

        $users = DB::table('users');
        $users->find($user);
        $users->delete($user);

        return view('acount.userdelete');
    }

}
