<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\User;
use App\Model\Posts;
use App\Model\Ads;
use App\Model\Bit;
use Redirect;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Backend/users');
    }



    public function posts(Request $request){
        $posts = Posts::latest('created_at')->paginate(15);
        return view('Backend/posts',compact('posts'));
    }
    public function post(Request $request,$id = 0){
        if(is_numeric($id) && $id>0){
            $post = Posts::find($id);
        } else {
            $post = null;
        }
        $ads = Ads::latest('created_at')->get();
        return view('Backend/post',compact('post','ads'));
    }
    public function poststore(Request $request){
        $input = $request->all();

        if(is_numeric($input['id']) && $input['id']>0){
            $post = Posts::find($input['id']);
        } else {
            $post = new Posts;
        }
        $post->title   = $input['title'];
        $post->user_id = auth()->user()->id;
        $post->content = $input['content'];
        $post->youtube = $input['youtube'];
        $post->save();
        return Redirect::to('/master/posts')->with('message','文章更新');
    }



    public function ads(Request $request){
        $ads = Ads::latest('created_at')->paginate(15);
        return view('Backend/ads',compact('ads'));
    }
    public function ad(Request $request,$id = 0){
        if(is_numeric($id) && $id>0){
            $ad = Ads::find($id);
        } else {
            $ad = null;
        }
        return view('Backend/ad',compact('ad'));
    }
    public function adstore(Request $request){
        $input = $request->all();

        if(is_numeric($input['id']) && $input['id']>0){
            $ad = Ads::find($input['id']);
        } else {
            $ad = new Ads;
        }
        $ad->title   = $input['title'];
        $ad->content = $input['content'];
        $ad->url     = $input['url'];
        $ad->save();
        return Redirect::to('/master/ads')->with('message','廣告更新');
    }
}


