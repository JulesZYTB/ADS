@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('Backend.menu')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">文章編輯</div>
                <div class="panel-body">
<form method="POST" action="{{ url('/master/post') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<input type="hidden" name="id" value="{{ $post->id or 0}}">
  <div class="form-group">
    <label for="title">標題:</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title or ''}}" placeholder="標題" required>
  </div>
  <div class="form-group">
    <label for="content">內文:</label>
    <textarea name="content" id="content">{{ $post->content or ''}}</textarea>
  </div>
  <div class="form-group">
    <label for="youtube">影片連結:</label>
    <input type="url" class="form-control" id="youtube" name="youtube" value="{{ $post->youtube or ''}}" placeholder="影片連結" required>
  </div>
  <div class="form-group">
    <label for="TopOneAd">上方廣告:</label>
    <select name="TopOneAd" id="TopOneAd" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['TopOneAd']->ad_id) && $select['TopOneAd']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="ArticleOne">文章廣告1:</label>
    <select name="ArticleOne" id="ArticleOne" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleOne']->ad_id) && $select['ArticleOne']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="ArticleTwo">文章廣告2:</label>
    <select name="ArticleTwo" id="ArticleTwo" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleTwo']->ad_id) && $select['ArticleTwo']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="ArticleThree">文章廣告3:</label>
    <select name="ArticleThree" id="ArticleThree" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleThree']->ad_id) && $select['ArticleThree']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="ArticleFour">文章廣告4:</label>
    <select name="ArticleFour" id="ArticleFour" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleFour']->ad_id) && $select['ArticleFour']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="ArticleFive">文章廣告5:</label>
    <select name="ArticleFive" id="ArticleFive" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleFive']->ad_id) && $select['ArticleFive']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="RightOne">右側廣告1:</label>
    <select name="RightOne" id="RightOne" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['RightOne']->ad_id) && $select['RightOne']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="RightTwo">右側廣告2:</label>
    <select name="RightTwo" id="RightTwo" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['RightTwo']->ad_id) && $select['RightTwo']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="RightThree">右側廣告3:</label>
    <select name="RightThree" id="RightThree" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['RightThree']->ad_id) && $select['RightThree']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="MobileFooterAd">手機廣告:</label>
    <select name="MobileFooterAd" id="MobileFooterAd" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}"@if(!empty($select['MobileFooterAd']->ad_id) && $select['MobileFooterAd']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
  </div>

  <button type="submit" class="btn btn-default">Submit</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.10/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.10/adapters/jquery.js"></script>
<script type="text/javascript">$('#content').ckeditor();</script>
@endsection