@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h1>{{ $post->title }}</h1>
            <div>ads</div>
            <div></div>
            <div>{!! $post->content !!}</div>
            <div>ads</div>
        </div>
        <div class="col-md-3">
            <div>推薦閱讀</div>
            <div>ads</div>
        </div>
    </div>
</div>
@endsection
