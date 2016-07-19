@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('Backend.menu')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">廣告編輯</div>
                <div class="panel-body">
<form method="POST" action="{{ url('/master/ad') }}" enctype="multipart/form-data">
{{ csrf_field() }}
  <input type="hidden" name="id" value="{{ $ad->id or 0}}">
  <div class="form-group">
    <label for="title">廣告標題:</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ $ad->title or ''}}" placeholder="廣告標題" required>
  </div>
  <div class="form-group">
    <label for="content">廣告內文:</label>
    <input type="text" class="form-control" id="content" name="content" value="{{ $ad->content or ''}}" placeholder="廣告內文">
  </div>
  <div class="form-group">
    <label for="url">廣告網址:</label>
    <input type="url" class="form-control" id="url" name="url" value="{{ $ad->url or ''}}" placeholder="ex:http://www.google.com.tw/" required>
  </div>
  <div class="form-group">
    <label for="image">圖片</label>
    <input type="file" id="image" name="image">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
