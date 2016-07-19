@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table style="width:100%" class="table-hover table-striped">
                        <thead>
                          <tr>
                            <th>標題</th>
                          </tr>
                        </thead>
                        <tbody>
@forelse ($posts as $post)
                          <tr>
                            <td><a href="/article/{{ $post->id }}">{{ $post->title }}</a></td>
                          </tr>
@empty
    <tr><td>無</td></tr>
@endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
