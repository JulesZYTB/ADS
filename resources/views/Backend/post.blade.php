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
    <label for="youtube">上方廣告:</label>
    <select name="bit[0]" class="form-control">
      <option value="">無</option>
@foreach($ads as $ad) <option value="{{ $ad->id }}">{{ $ad->title }}</option> @endforeach
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