@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('Backend.menu')
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">帳號設定</div>
                <div class="panel-body">
                    <div class="text-right">
                        <button type="button" class="btn btn-primary">新增</button>
                    </div>
                    <table class="table-hover table-striped" style="width:100%">
                        <thead>
                          <tr>
                            <th>帳號</th>
                            <th>功能</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Firstname</td>
                            <td>Lastname</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
