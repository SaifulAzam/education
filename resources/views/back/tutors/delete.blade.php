@extends('back.layouts.backend')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">确认删除？</a></li>
    </ul>

    {!! Form::open(['class' => 'form-horizontal', 'method' => 'DELETE', 'action' => ['Backend\TutorsController@destroy', $tutor->id]]) !!}

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>老师姓名</th>
                <th class="col-md-2">邮箱</th>
                <th class="col-md-2">电话</th>
                <th>职业</th>
                <th>职教科目</th>
                <th class="col-md-1">学生数量</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>{{$tutor->name}}</td>
                <td class="col-md-2">{{$tutor->user->email}}</td>
                <td class="col-md-2">{{$tutor->user->cellphone}}</td>
                <td>{{$tutor->occupation}}</td>
                <td>
                    @unless($tutor->tags->isEmpty())
                        @foreach($tutor->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    @endunless
                </td>
                <td class="col-md-1">{{$tutor->student_count}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group col-md-2">
        <div class="controls">
            <a href="{{URL::to('backend/tutors')}}">
                <element class="btn btn-warning btn-sm close_popup">
                    <span class="glyphicon glyphicon-ban-circle"></span> 取消</element></a>
            <button type="submit" class="btn btn-sm btn-danger">
                <span class="glyphicon glyphicon-trash"></span> 删除</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection