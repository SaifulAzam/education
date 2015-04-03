@extends('back.layouts.backend')

@section('content')
    <div class="page-header">
        <h3>权限
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{action('Backend\RolesController@create')}}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span>New</a>
                </div>
            </div>
        </h3>
    </div>
    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>用户账号</th>
                <th>创建日期</th>
                <th>可执行</th>
            </tr>
            </thead>

        </table>
    </div>
@endsection