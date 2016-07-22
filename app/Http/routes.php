<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$posts = App\Model\Posts::latest('created_at')->paginate(15);
    return view('welcome',compact('posts'));
});
Route::get('/article/{id}',function(Request $request,$id){
	$post = App\Model\Posts::find($id);
    $posts = App\Model\Posts::orderBy(DB::raw('RAND()'))->take(7)->get();
	$ads = [
        'TopOneAd'=> App\Model\Bit::where('post_id',$id)->where('edition','TopOneAd')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'ArticleOne'=> App\Model\Bit::where('post_id',$id)->where('edition','ArticleOne')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'ArticleTwo'=> App\Model\Bit::where('post_id',$id)->where('edition','ArticleTwo')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'ArticleThree'=> App\Model\Bit::where('post_id',$id)->where('edition','ArticleThree')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'ArticleFour'=> App\Model\Bit::where('post_id',$id)->where('edition','ArticleFour')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'ArticleFive'=> App\Model\Bit::where('post_id',$id)->where('edition','ArticleFive')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'RightOne'=> App\Model\Bit::where('post_id',$id)->where('edition','RightOne')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'RightTwo'=> App\Model\Bit::where('post_id',$id)->where('edition','RightTwo')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'RightThree'=> App\Model\Bit::where('post_id',$id)->where('edition','RightThree')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
        'MobileFooterAd'=> App\Model\Bit::where('post_id',$id)->where('edition','MobileFooterAd')->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->first(),
    ];
	return view('show',compact('post','ads','posts'));
});

Route::auth();

Route::get('/home', 'HomeController@index');



Route::get('/master/ads', 'HomeController@ads');
Route::get('/master/ad', 'HomeController@ad');
Route::get('/master/{id}/ad', 'HomeController@ad');
Route::post('/master/ad', 'HomeController@adstore');

Route::get('/master/posts', 'HomeController@posts');
Route::get('/master/post', 'HomeController@post');
Route::get('/master/{id}/post', 'HomeController@post');
Route::post('/master/post', 'HomeController@poststore');

Route::delete('/master/bit/{id}/delete','HomeController@deleteBit');
