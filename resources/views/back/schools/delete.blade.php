@extends('back.layouts.backend')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">确认删除？</a></li>
    </ul>

    {!! Form::open(['class' => 'form-horizontal', 'method' => 'DELETE', 'action' => ['Backend\SchoolsController@destroy', $school->id]]) !!}

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

        <div class="table-responsive">
            <table id="table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>学校名字</th>
                    <th>学校邮箱</th>
                    <th>学校电话</th>
                    <th>注册日期</th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>{{$school->name}}</td>
                    <td>{{$school->email}}</td>
                    <td>{{$school->phone}}</td>
                    <td>{{$school->created_at}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group col-md-2">
            <div class="controls">
                <a href="{{URL::to('backend/schools')}}">
                    <element class="btn btn-warning btn-sm close_popup">
                        <span class="glyphicon glyphicon-ban-circle"></span> 取消</element></a>
                <button type="submit" class="btn btn-sm btn-danger">
                    <span class="glyphicon glyphicon-trash"></span> 删除</button>
            </div>
        </div>

    {!! Form::close() !!}

@endsection