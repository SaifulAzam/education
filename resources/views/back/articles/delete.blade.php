@extends('back.layouts.backend')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">确认删除？</a></li>
    </ul>

    {!! Form::open(['class' => 'form-horizontal', 'method' => 'DELETE', 'action' => ['Backend\ArticlesController@destroy', $article->id]]) !!}

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th class="col-md-6">标题</th>
                <th>发布时间</th>
                <th>标签</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="col-md-6">{{$article->title}}</td>
                <td>{{$article->published_at}}</td>
                <td>
                    @foreach($article->tags as $tag)
                        {{$tag->name}}
                    @endforeach
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group col-md-2">
        <div class="controls">
            <a href="{{URL::to('backend/articles')}}">
                <element class="btn btn-warning btn-sm close_popup">
                    <span class="glyphicon glyphicon-ban-circle"></span> 取消 </element></a>
            <button type="submit" class="btn btn-sm btn-danger">
                <span class="glyphicon glyphicon-trash"></span> 删除</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection