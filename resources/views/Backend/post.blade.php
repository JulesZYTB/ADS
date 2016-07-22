@extends('layouts.app')

@section('content')
<style type="text/css">.tooltip-inner{max-width:340px;}.tooltip-inner img{max-width:320px;}</style>
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
@foreach($ads['Top'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['TopOneAd']->ad_id) && $select['TopOneAd']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['TopOneAd']->id)) <div id="AdArea_{{ $select['TopOneAd']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['TopOneAd']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['TopOneAd']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="ArticleOne">文章廣告1:</label>
    <select name="ArticleOne" id="ArticleOne" class="form-control">
      <option value="">無</option>
@foreach($ads['Article'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleOne']->ad_id) && $select['ArticleOne']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['ArticleOne']->id)) <div id="AdArea_{{ $select['ArticleOne']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['ArticleOne']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['ArticleOne']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="ArticleTwo">文章廣告2:</label>
    <select name="ArticleTwo" id="ArticleTwo" class="form-control">
      <option value="">無</option>
@foreach($ads['Article'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleTwo']->ad_id) && $select['ArticleTwo']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['ArticleTwo']->id)) <div id="AdArea_{{ $select['ArticleTwo']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['ArticleTwo']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['ArticleTwo']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="ArticleThree">文章廣告3:</label>
    <select name="ArticleThree" id="ArticleThree" class="form-control">
      <option value="">無</option>
@foreach($ads['Article'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleThree']->ad_id) && $select['ArticleThree']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['ArticleThree']->id)) <div id="AdArea_{{ $select['ArticleThree']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['ArticleThree']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['ArticleThree']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="ArticleFour">文章廣告4:</label>
    <select name="ArticleFour" id="ArticleFour" class="form-control">
      <option value="">無</option>
@foreach($ads['Article'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleFour']->ad_id) && $select['ArticleFour']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['ArticleFour']->id)) <div id="AdArea_{{ $select['ArticleFour']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['ArticleFour']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['ArticleFour']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="ArticleFive">文章廣告5:</label>
    <select name="ArticleFive" id="ArticleFive" class="form-control">
      <option value="">無</option>
@foreach($ads['Article'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['ArticleFive']->ad_id) && $select['ArticleFive']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['ArticleFive']->id)) <div id="AdArea_{{ $select['ArticleFive']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['ArticleFive']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['ArticleFive']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="RightOne">右側廣告1:</label>
    <select name="RightOne" id="RightOne" class="form-control">
      <option value="">無</option>
@foreach($ads['Right'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['RightOne']->ad_id) && $select['RightOne']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['RightOne']->id)) <div id="AdArea_{{ $select['RightOne']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['RightOne']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['RightOne']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="RightTwo">右側廣告2:</label>
    <select name="RightTwo" id="RightTwo" class="form-control">
      <option value="">無</option>
@foreach($ads['Right'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['RightTwo']->ad_id) && $select['RightTwo']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['RightTwo']->id)) <div id="AdArea_{{ $select['RightTwo']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['RightTwo']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['RightTwo']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="RightThree">右側廣告3:</label>
    <select name="RightThree" id="RightThree" class="form-control">
      <option value="">無</option>
@foreach($ads['Right'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['RightThree']->ad_id) && $select['RightThree']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['RightThree']->id)) <div id="AdArea_{{ $select['RightThree']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['RightThree']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['RightThree']->id }}" class="delbit">刪除</a> </div> @endif
  </div>
  <div class="form-group">
    <label for="MobileFooterAd">手機廣告:</label>
    <select name="MobileFooterAd" id="MobileFooterAd" class="form-control">
      <option value="">無</option>
@foreach($ads['Mobile'] as $ad) <option value="{{ $ad->id }}"@if(!empty($select['MobileFooterAd']->ad_id) && $select['MobileFooterAd']->ad_id == $ad->id) selected @endif>{{ $ad->title }}</option> @endforeach
    </select>
    @if(!empty($select['MobileFooterAd']->id)) <div id="AdArea_{{ $select['MobileFooterAd']->id }}"> 
      <a data-toggle="tooltip" data-html="true" title="<img src='{{ $select['MobileFooterAd']->image }}' />">圖片</a> | 
      <a href="javascript:;" data-id="{{ $select['MobileFooterAd']->id }}" class="delbit">刪除</a> </div> @endif
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
<script type="text/javascript">
$(function(){
  $('#content').ckeditor();
  $('[data-toggle="tooltip"]').tooltip();
  $('.delbit').bind('click',function(){
    var id = $(this).data('id');
    $.post('/master/bit/'+id+'/delete',{_method: 'delete', _token :'{{ csrf_token() }}'},function(data){
      if(data.status=='success'){
        $('#AdArea_'+id).prev("select").val("");
        $('#AdArea_'+id).remove();    
      } else {
        console.log('delete error!');
      }
    },'json');
    
  });
});

</script>
@endsection