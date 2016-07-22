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
    public $UID;
    public function __construct()
    {
        $this->middleware('auth');
        $this->UID = auth()->user()->id;
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
        $posts = Posts::latest('created_at')->where('user_id',$this->UID)->paginate(15);
        return view('Backend/posts',compact('posts'));
    }
    public function post(Request $request,$id = 0){
        if(is_numeric($id) && $id>0){
            $post = Posts::find($id);
            // uid != UID
        } else {
            $post = null; $id = 0;
        }
        $ads = [
            'Top'     => Ads::latest('created_at')->where('user_id',$this->UID)->where('area','Top')->get(),
            'Right'   => Ads::latest('created_at')->where('user_id',$this->UID)->where('area','Right')->get(),
            'Article' => Ads::latest('created_at')->where('user_id',$this->UID)->where('area','Article')->get(),
            'Mobile'  => Ads::latest('created_at')->where('user_id',$this->UID)->where('area','Mobile')->get(),
        ];
        $select = [
            'TopOneAd'       => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','TopOneAd')->first(),
            'ArticleOne'     => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','ArticleOne')->first(),
            'ArticleTwo'     => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','ArticleTwo')->first(),
            'ArticleThree'   => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','ArticleThree')->first(),
            'ArticleFour'    => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','ArticleFour')->first(),
            'ArticleFive'    => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','ArticleFive')->first(),
            'RightOne'       => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','RightOne')->first(),
            'RightTwo'       => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','RightTwo')->first(),
            'RightThree'     => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','RightThree')->first(),
            'MobileFooterAd' => Bit::where('post_id',$id)->leftJoin('ads', 'ads.id', '=', 'bitedition.ad_id')->where('edition','MobileFooterAd')->first(),
        ];
        return view('Backend/post',compact('post','ads','select'));
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

        if(is_numeric($input['id']) && $input['id']>0){
            $post_id = $input['id'];
        } else {
            $post_id = $post->id;
        }

        if($input['TopOneAd']!='') $this->savebit($post_id,$input['TopOneAd'],'TopOneAd');
        
        if($input['ArticleOne']!='') $this->savebit($post_id,$input['ArticleOne'],'ArticleOne');
        if($input['ArticleTwo']!='') $this->savebit($post_id,$input['ArticleTwo'],'ArticleTwo');
        if($input['ArticleThree']!='') $this->savebit($post_id,$input['ArticleThree'],'ArticleThree');
        if($input['ArticleFour']!='') $this->savebit($post_id,$input['ArticleFour'],'ArticleFour');
        if($input['ArticleFive']!='') $this->savebit($post_id,$input['ArticleFive'],'ArticleFive');

        if($input['RightOne']!='') $this->savebit($post_id,$input['RightOne'],'RightOne');
        if($input['RightTwo']!='') $this->savebit($post_id,$input['RightTwo'],'RightTwo');
        if($input['RightThree']!='') $this->savebit($post_id,$input['RightThree'],'RightThree');

        if($input['MobileFooterAd']!='') $this->savebit($post_id,$input['MobileFooterAd'],'MobileFooterAd');



        return Redirect::to('/master/posts')->with('message','文章更新');
    }
    private function savebit($post_id,$ad_id,$edition){
        Bit::firstOrCreate([
            'post_id' => $post_id,
            'ad_id'   => $ad_id,
            'edition' => $edition
        ]);
    }
    public function deleteBit(Request $request,$id){
        Bit::where('id', $id)->delete();
        return response()->json(['status'=>'success']);
    }



    public function ads(Request $request){
        $ads = Ads::latest('created_at')->where('user_id',$this->UID)->paginate(15);
        return view('Backend/ads',compact('ads'));
    }
    public function ad(Request $request,$id = 0){
        if(is_numeric($id) && $id>0){
            $ad = Ads::find($id);

            // UID != UID
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
        $ad->area    = $input['area'];
        $ad->title   = $input['title'];
        $ad->content = $input['content'];
        $ad->url     = $input['url'];
        $ad->user_id = auth()->user()->id;
        if($request->hasFile('image')){
            $filename = date('md_').uniqid().'.'.$request->file('image')->getClientOriginalExtension();
            $floder = 'uploads/'.date('Ym');
            if (!file_exists($floder)) mkdir($floder);
            $request->file('image')->move($floder, $filename);
            $ad->image = '/' . $floder . '/' . $filename;
            @unlink($input['oimage']);
        }

        $ad->save();
        return Redirect::to('/master/ads')->with('message','廣告更新');
    }
}


