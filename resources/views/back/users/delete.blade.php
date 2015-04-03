@extends('back.layouts.backend')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">确认删除？</a></li>
    </ul>

    {!! Form::open(['class' => 'form-horizontal', 'method' => 'DELETE', 'action' => ['Backend\UsersController@destroy', $user->id]]) !!}

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>用户账号</th>
                <th class="col-md-2">邮箱</th>
                <th class="col-md-2">电话</th>
                <th>身份</th>
                <th>创建日期</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>{{$user->username}}</td>
                <td class="col-md-2">{{$user->email}}</td>
                <td class="col-md-2">{{$user->cellphone}}</td>
                <td>
                    @if($user->is_tutor)
                        教师
                    @else
                        学生
                    @endif
                </td>
                <td class="col-md-3">{{$user->created_at}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group col-md-2">
        <div class="controls">
            <a href="{{URL::to('backend/users')}}">
                <element class="btn btn-warning btn-sm close_popup">
                    <span class="glyphicon glyphicon-ban-circle"></span> 取消</element></a>
            <button type="submit" class="btn btn-sm btn-danger">
                <span class="glyphicon glyphicon-trash"></span> 删除</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection