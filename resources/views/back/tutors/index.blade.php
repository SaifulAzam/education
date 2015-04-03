@extends('back.layouts.backend')

@section('content')
    <div class="page-header">
        <h3>家教
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{action('Backend\TutorsController@create')}}"
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
                <th>老师姓名</th>
                <th class="col-md-2">邮箱</th>
                <th class="col-md-2">电话</th>
                <th>职业</th>
                <th>职教科目</th>
                <th class="col-md-1">学生数量</th>
                <th>可执行</th>
            </tr>
            </thead>
            <tbody>
            @unless($tutors->isEmpty())
                @foreach ($tutors as $tutor)
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
                        <td> <a href="{{action('Backend\TutorsController@edit', [$tutor->id])}}"
                                class="btn btn-sm btn-success btn-primary iframe">
                                <span class="glyphicon glyphicon-pencil"></span>编辑</a>
                            <a href="{{action('Backend\TutorsController@getDelete', [$tutor->id])}}"
                               class="btn btn-sm btn-danger btn-primary iframe">
                                <span class="glyphicon glyphicon-trash"></span>删除</a>
                        </td>
                    </tr>
                @endforeach
            @endunless

            </tbody>
        </table>
    </div>
@endsection