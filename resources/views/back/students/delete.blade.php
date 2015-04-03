@extends('back.layouts.backend')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">确认删除？</a></li>
    </ul>

    {!! Form::open(['class' => 'form-horizontal', 'method' => 'DELETE', 'action' => ['Backend\StudentsController@destroy', $student->id]]) !!}

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>学生姓名</th>
                <th class="col-md-2">邮箱</th>
                <th class="col-md-2">电话</th>
                <th>欠缺科目</th>
                <th class="col-md-1">性别</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>{{$student->name}}</td>
                <td class="col-md-2">{{$student->user->email}}</td>
                <td class="col-md-2">{{$student->user->cellphone}}</td>
                <td>
                    @unless($student->tags->isEmpty())
                        @foreach($student->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    @endunless
                </td>
                <td class="col-md-1">{{$student->user->gender}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group col-md-2">
        <div class="controls">
            <a href="{{URL::to('backend/students')}}">
                <element class="btn btn-warning btn-sm close_popup">
                    <span class="glyphicon glyphicon-ban-circle"></span> 取消</element></a>
            <button type="submit" class="btn btn-sm btn-danger">
                <span class="glyphicon glyphicon-trash"></span> 删除</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection