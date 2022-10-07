<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Destination;
use App\Models\Good;
use App\Post;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($colomn)
    {
        Auth::id()->$this->good($colomn);
        return 'ok!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($colomn)
    {
        Auth::id()->$this->noGood($colomn);

        return 'ok!';
    }

    public function favorite(Request $request) {
        $user = Auth::id();
        $destination = $request->input('destination_id');
        $goods = DB::table('goods');
        $good = $goods->where('user_id',"=",$user)
            ->where('destination_id',"=",$destination)
            ->first();
        if($good) {         //もしすでにデータにあればお気に入り取り消し
            DB::table('goods')->where('destination_id',$destination)
            ->where('user_id',$user)
            ->delete(); 
        }else {             //データになければお気に入り登録
            $goods = DB::table('goods');
            $goods->insert([
                'user_id' => Auth::id(),
                'destination_id' => $destination,
            ]);
        }
        return response(\Illuminate\Http\Response::HTTP_OK); //jsonデータをjqueryに返す
    }

}
