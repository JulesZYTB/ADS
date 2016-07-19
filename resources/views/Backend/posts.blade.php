@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('Backend.menu')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">文章列表</div>
                <div class="panel-body">
                    <div class="text-right">
                        <a href="/master/post" class="btn btn-primary">新增</a>
                    </div>
                    <table class="table-hover table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th>標題</th>
                            <th>功能</th>
                          </tr>
                        </thead>
                        <tbody>
@forelse ($posts as $post)
                          <tr>
                            <td>
                                <div>{{ $post->title }}</div>
                                <div>link</div>
                            </td>
                            <td><a href="/master/{{ $post->id }}/post" class="btn btn-xs btn-primary">修改</a></td>
                          </tr>
@empty
    <tr><td colspan="2">無</td></tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
