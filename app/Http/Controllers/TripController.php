<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Destination;
use App\Models\User;
use App\Models\Good;


class TripController extends Controller
{
    /**公開一覧 */
    public function otherindex(){
        $othertravel = DB::table('destination as d')
        ->select([
            'd.id','d.travel','d.photo',
            DB::raw("(SELECT COUNT(user_id) FROM goods as g WHERE g.destination_id = d.id ) as countnum")
            ])
        ->orderBy('countnum','desc')
        ->where('publish_status','=',2)
        ->get();
        return view('trip.otherindex',compact('othertravel'));
    }

    /**新規投稿 */
    public function NewArticle(){
        return view('trip.travel');
    }


    /**投稿内容確認 */
    public function confirm(Request $request){

        $inputs = $request->all();

        if(!$inputs){
            return redirect()->route('index');
        }

        $request->validate([
            'title' => 'required',
            'image' => ['required','image'],
            'content' =>'required',
            'public_check' => 'required',
        ]);

        $post_data = $request->except('image');
        $imagefile = $request->file('image');

        $temp_path = $imagefile->store('public/temp');
        $read_temp_path = str_replace('public/', 'storage/', $temp_path); //追加

        $title = $post_data['title'];
        $content = $post_data['content'];
        $public_check = $post_data['public_check'];
        $rate = $post_data['rate'];


        $data = array(
            'temp_path' => $temp_path,
            'read_temp_path' => $read_temp_path, //追加
            'title' => $title,
            'content' => $content,
            'public_check'=> $public_check,
            'rate' =>$rate,
        );
        $request->session()->put('data', $data);
        return view('trip.confirm', compact('data') );
    }

    /**投稿実行 */
    public function ContentUpdate(Request $request) {//getをpostに変更

        $data = $request->session()->get('data');

        $title = $data['title'];
        $content = $data['content'];
        $rate = $data['rate'];
        $public_check = $data['public_check'];
        $user_id = Auth::id();

        $temp_path = $data['temp_path'];
        $read_temp_path = $data['read_temp_path'];

        $filename = str_replace('public/temp/', '', $temp_path);
        //ファイル名は$temp_pathから"public/temp/"を除いたもの
        $storage_path = 'public/productimage/'.$filename;
        //画像を保存するパスは"public/productimage/xxx.jpeg"

        $request->session()->forget('data');

        Storage::move($temp_path, $storage_path);
        //Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動
        $read_path = str_replace('public/', 'storage/', $storage_path);
        //商品一覧画面から画像を読み込むときのパスはstorage/productimage/xxx.jpeg"

        $destination = DB::table('destination');
        $destination->insert([
            'travel' => $title,
            'photo' => $read_path,
            'recomment' =>$rate,
            'comment' => $content,
            'publish_status' => $public_check,
            'user_id' => $user_id,
        ]);
        return view('trip.complite',compact('destination'));
    }


    /**詳細画面 */
    public function detail($id){

        $destination = DB::table('destination');
        $data =$destination->find($id);
        return view('trip.detail',compact('data'));
    }


    /**投稿編集 */
    public function edit($id){
        $destination = DB::table('destination');
        $data =$destination->find($id);
        return view('trip.edit',['data' =>$data]);
    }


    /**編集内容アップデート */
    /**画像をpublicに保存,
     * パスをDBへ保存
     */
    public function editUpdate(Request $request,$id) {

        $inputs = $request->all();

        if(!$inputs){
            return redirect()->route('index');
        }
        $request->validate([
            'title' => 'required',
            'content' =>'required',
            'public_check' => 'required',
        ]);

        if($request->hasFile('image')) {
            $post_data = $request->except('image');
            $imagefile = $request->file('image');

            $temp_path = $imagefile->store('public/temp');
            $read_temp_path = str_replace('public/', 'storage/', $temp_path); //追加
            $filename = str_replace('public/temp/', '', $temp_path);
            $storage_path = 'public/productimage/'.$filename;

            $request->session()->forget('data');
            Storage::move($temp_path, $storage_path);
            //Storageファサードのmoveメソッドで、第一引数->第二引数へファイルを移動
            $read_path = str_replace('public/', 'storage/', $storage_path);
            //商品一覧画面から画像を読み込むときのパスはstorage/productimage/xxx.jpeg"
            $destination = DB::table('destination');
            $destination->find($id);
            $destination->update([
                'photo' => $read_path,
            ]);
        }
        $destination = DB::table('destination');
        $destination->find($id);

        $destination->update([
            'travel' => $request->title,
            'recomment' => $request->rate,
            'comment' => $request->content,
            'publish_status' => $request->public_check,
        ]);

        return view('trip.complite',compact('destination'));
    }


    /**投稿削除 */
    public function delete($id){
        $destination = DB::table('destination');
        $destination->find($id);
        // $column = $contacts::findOrFail($id);
        $destination->delete($id);

        return redirect()->route('home')->with('flash_message','※投稿を削除しました！');
    }

    /**他詳細
     * $id =destination_id
    */
    public function otherdetail($id){
        $user = Auth::id();
        $destination = DB::table('destination');
        $data =$destination->find($id);

        //いいねの引数 DBから検索 いいねされているかどうか
        $good = DB::table('goods')
                ->where('user_id','=',$user)
                ->where('destination_id','=',$id)
                ->first();
        return view('trip.otherdetail',compact('data','good'));
    }


}
