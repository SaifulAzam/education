@extends('back.layouts.backend')

@section('content')
    <div class="page-header">
        <h3>用户
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{action('Backend\UsersController@create')}}"
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
                <th class="col-md-2">邮箱</th>
                <th class="col-md-2">电话</th>
                <th>身份</th>
                <th>创建日期</th>
                <th>可执行</th>
            </tr>
            <tbody>
            @unless($users->isEmpty())
                @foreach ($users as $user)
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
                        <td> <a href="{{action('Backend\UsersController@edit', [$user->id])}}"
                                class="btn btn-sm btn-success btn-primary iframe">
                                <span class="glyphicon glyphicon-pencil"></span>编辑</a>
                            <a href="{{action('Backend\UsersController@getDelete', [$user->id])}}"
                               class="btn btn-sm btn-danger btn-primary iframe">
                                <span class="glyphicon glyphicon-trash"></span>删除</a>
                        </td>
                    </tr>
                @endforeach
            @endunless
            </tbody>
            </thead>

        </table>
    </div>
@endsection