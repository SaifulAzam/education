@extends('back.layouts.backend')

@section('content')
    <div class="page-header">
        <h3>
            新闻
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{action('Backend\ArticlesController@create')}}"
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
                <th class="col-md-4">标题</th>
                <th>发布时间</th>
                <th>标签</th>
                <th>可执行</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td class="col-md-4">
                        <a href="{{action('Backend\ArticlesController@show', $article->id)}}">{{$article->title}}</a>
                    </td>
                    <td>{{$article->published_at}}</td>
                    <td>
                        @foreach($article->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </td>
                    <td> <a href="{{action('Backend\ArticlesController@edit', [$article->id])}}"
                            class="btn btn-sm btn-success btn-primary iframe">
                            <span class="glyphicon glyphicon-pencil"></span>编辑</a>
                        <a href="{{action('Backend\ArticlesController@getDelete', [$article->id])}}"
                           class="btn btn-sm btn-danger btn-primary iframe">
                            <span class="glyphicon glyphicon-trash"></span>删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection