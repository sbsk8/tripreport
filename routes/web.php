<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TripController;
use App\Http\Controllers\GoodController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/**記事詳細 */
Route::get('/detail/{id}',[App\Http\Controllers\TripController::class,'detail'])->name('detail');
Route::post('/detail/{id}',[App\Http\Controllers\TripController::class,'detail'])->name('detail');
/**他　投稿詳細 */
Route::get('/otherdetail/{id}',[App\Http\Controllers\TripController::class,'otherdetail'])->name('otherdetail');
Route::post('/otherdetail/{id}',[App\Http\Controllers\TripController::class,'otherdetail'])->name('otherdetail');
/**公開投稿一覧 */
Route::get('/otherindex',[App\Http\Controllers\TripController::class,'otherindex'])->name('otherindex');
Route::post('/otherindex',[App\Http\Controllers\TripController::class,'otherindex'])->name('otherindex');
/**新規投稿画面 */
Route::get('/NewArticle',[App\Http\Controllers\TripController::class,'NewArticle'])->name('NewArticle');
Route::post('/NewArticle',[App\Http\Controllers\TripController::class,'NewArticle'])->name('NewArticle');
/**新規投稿確認画面 */
Route::get('/confirm',[App\Http\Controllers\TripController::class,'confirm'])->name('confirm');
Route::post('/confirm',[App\Http\Controllers\TripController::class,'confirm'])->name('confirm');
/**新規投稿実行 */
Route::get('/ContentUpdate',[App\Http\Controllers\TripController::class,'ContentUpdate'])->name('ContentUp');
Route::post('/ContentUpdate',[App\Http\Controllers\TripController::class,'ContentUpdate'])->name('ContentUp');
/**投稿編集 */
Route::get('/edit/{id}',[App\Http\Controllers\TripController::class,'edit'])->name('edit');
Route::post('/edit/{id}',[App\Http\Controllers\TripController::class,'edit'])->name('edit');
/**編集内容実行 */
Route::get('/editUpdate/{id}',[App\Http\Controllers\TripController::class,'editUpdate'])->name('editUpdate');
Route::post('/editUpdate/{id}',[App\Http\Controllers\TripController::class,'editUpdate'])->name('editUpdate');
/**投稿削除 */
Route::get('/delete/{id}',[App\Http\Controllers\TripController::class,'delete'])->name('delete');
Route::post('/delete/{id}',[App\Http\Controllers\TripController::class,'delete'])->name('delete');



/**アカウントマイページへ遷移 */
Route::get('/users',[App\Http\Controllers\HomeController::class,'users'])->name('users');
Route::post('/users',[App\Http\Controllers\HomeController::class,'users'])->name('users');
/**アカウント編集・実行 */
Route::get('/useredit',[App\Http\Controllers\HomeController::class,'useredit'])->name('useredit');
Route::post('/useredit',[App\Http\Controllers\HomeController::class,'useredit'])->name('useredit');

Route::get('/userupdate/{id}',[App\Http\Controllers\HomeController::class,'userupdate'])->name('userupdate');
Route::post('/userupdate/{id}',[App\Http\Controllers\HomeController::class,'userupdate'])->name('userupdate');
/**アカウント削除 */
Route::get('/userdestroy/{user}',[App\Http\Controllers\HomeController::class,'userdestroy'])->name('userdestroy');
Route::post('/userdestroy/{user}',[App\Http\Controllers\HomeController::class,'userdestroy'])->name('userdestroy');



/** いいねボタン処理 */
Route::post('/good',[App\Http\Controllers\GoodController::class,'favorite'])->name('good');



Route::post('/like/{id}',[App\Http\Controllers\GoodController::class,'like'])->name('like');

Route::get('/serchlisult',[App\Http\Controllers\TripController::class,'serch'])->name('serch');
Route::post('/serchlisult',[App\Http\Controllers\TripController::class,'serch'])->name('serch');

/**管理者権限 */
Route::get('/manegimant',[App\Http\Controllers\AcountController::class,'userAll'])->name('userAll');
Route::post('/manegimant',[App\Http\Controllers\AcountController::class,'userAll'])->name('userAll');
Route::get('/manegimant/del/{id}',[App\Http\Controllers\AcountController::class,'addelete'])->name('addelete');
Route::post('/manegimant/del/{id}',[App\Http\Controllers\AcountController::class,'addelete'])->name('addelete');
Route::get('/manegimant/userdel/{id}',[App\Http\Controllers\AcountController::class,'userdelete'])->name('userdelete');
Route::post('/manegimant/userdel/{id}',[App\Http\Controllers\AcountController::class,'userdelete'])->name('userdelete');
