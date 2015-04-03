@extends('back.layouts.backend')

@section('content')
    <div class="page-header">
        <h3>
            学校
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{action('Backend\SchoolsController@create')}}"
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
                <th>学校名字</th>
                <th>学校邮箱</th>
                <th>学校电话</th>
                <th>注册日期</th>
                <th>可执行</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($schools as $school)
                <tr>
                    <td>{{$school->name}}</td>
                    <td>{{$school->email}}</td>
                    <td>{{$school->phone}}</td>
                    <td>{{$school->created_at}}</td>
                    <td> <a href="{{action('Backend\SchoolsController@edit', [$school->id])}}"
                            class="btn btn-sm btn-success btn-primary iframe">
                            <span class="glyphicon glyphicon-pencil"></span>编辑</a>
                         <a href="{{action('Backend\SchoolsController@getDelete', [$school->id])}}"
                           class="btn btn-sm btn-danger btn-primary iframe">
                            <span class="glyphicon glyphicon-trash"></span>删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection