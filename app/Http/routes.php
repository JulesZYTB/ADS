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
	return view('show',compact('post'));
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
