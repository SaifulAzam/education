@extends('back.layouts.backend')

@section('content')
    <div class="page-header">
        <h3>学生
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{action('Backend\StudentsController@create')}}"
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
                <th>学生姓名</th>
                <th class="col-md-2">邮箱</th>
                <th class="col-md-2">电话</th>
                <th>欠缺科目</th>
                <th class="col-md-1">性别</th>
                <th>可执行</th>
            </tr>
            <tbody>
            @unless($students->isEmpty())
                @foreach ($students as $student)
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
                        <td> <a href="{{action('Backend\StudentsController@edit', [$student->id])}}"
                                class="btn btn-sm btn-success btn-primary iframe">
                                <span class="glyphicon glyphicon-pencil"></span>编辑</a>
                            <a href="{{action('Backend\StudentsController@getDelete', [$student->id])}}"
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