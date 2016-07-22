@extends('layouts.app')

@section('content')
<style type="text/css">
    .videoWrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 */
    padding-top: 25px;
    height: 0;
}
.videoWrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
.RightArea img{
    max-width: 250px;
    margin:5px auto;
}
.TopArea img{
    max-width: 850px;
    width:100%;
    margin: 5px auto;
}
.ArticleArea img{
    max-width: 850px;
    width:100%;
    margin: 5px auto;
}
article img{
    max-width:100%;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h1>{{ $post->title }}</h1>
            <div class="TopArea">@if(!empty($ads['TopOneAd'])) <img src="{{ $ads['TopOneAd']->image }}" />@endif</div>
            <div></div>
            <div>
              <div class="videoWrapper">
                <iframe src="@if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post->youtube, $match))https://www.youtube.com/embed/{{ $match[1] }}@endif" style="width:100%" frameborder="0" allowfullscreen></iframe>
              </div>
              <article>
                {!! $post->content !!}
              </article>
            </div>
            <div class="ArticleArea">
                @if(!empty($ads['ArticleOne'])) <img src="{{ $ads['ArticleOne']->image }}" />@endif
                @if(!empty($ads['ArticleTwo'])) <img src="{{ $ads['ArticleTwo']->image }}" />@endif
                @if(!empty($ads['ArticleThree'])) <img src="{{ $ads['ArticleThree']->image }}" />@endif
                @if(!empty($ads['ArticleFour'])) <img src="{{ $ads['ArticleFour']->image }}" />@endif
                @if(!empty($ads['ArticleFive'])) <img src="{{ $ads['ArticleFive']->image }}" />@endif
            </div>
        </div>
        <div class="col-md-3">
            <div>推薦閱讀
@foreach($posts as $row) <div><a href="/article/{{ $row->id }}">{{ $row->title }}</a></div> @endforeach
            </div>
            <div class="RightArea">
                @if(!empty($ads['RightOne'])) <img src="{{ $ads['RightOne']->image }}" />@endif
                @if(!empty($ads['RightTwo'])) <img src="{{ $ads['RightTwo']->image }}" />@endif
                @if(!empty($ads['RightThree'])) <img src="{{ $ads['RightThree']->image }}" />@endif
            </div>
        </div>
    </div>
</div>
<div style="position:fixed;bottom:0px;left:0px;height:50px;width:100%;text-align:center;background:#cacaca;z-index:1000;border:none;" class="ad-btm visible-xs">@if(!empty($ads['MobileFooterAd'])) <img src="{{ $ads['MobileFooterAd']->image }}" />@endif</div>
@endsection


