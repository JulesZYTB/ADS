@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table-hover table-striped">
                        <thead>
                          <tr>
                            <th>標題</th>
                            <th>發布時間</th>
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
