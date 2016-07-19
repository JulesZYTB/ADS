@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('Backend.menu')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">廣告列表</div>
                <div class="panel-body">
                    <div class="text-right">
                        <a href="/master/ad" class="btn btn-primary">新增</a>
                    </div>
                    <table class="table-hover table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th>標題</th>
                            <th>功能</th>
                          </tr>
                        </thead>
                        <tbody>
@forelse ($ads as $ad)
                          <tr>
                            <td>
                                <div>{{ $ad->title }}</div>
                                <div>{{ $ad->content }}</div>
                                <div>{{ $ad->url }}</div>
                            </td>
                            <td><a href="/master/{{ $ad->id }}/ad" class="btn btn-xs btn-primary">修改</a></td>
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
