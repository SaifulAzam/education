@extends('back.layouts.backend')

@section('content')
    @include('errors.list')
    <div class="page-header">
        <h3>创建新闻</h3>
    </div>
    {!! Form::open(['action' => 'Backend\ArticlesController@store']) !!}
    <!-----Title Form Input ---->

    <div class="form-group">
        {!! Form::label('title', '标题：') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <!-----Body Form Input ---->

    <div class="form-group">
        {!! Form::label('body', '主体：') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control wysihtml5']) !!}
    </div>

    <!-----Published_at Form Input ---->

    <div class="form-group">
        {!! Form::label('published_at', '发布时间') !!}
        {!! Form::input('date', 'published_at', date('Y-m-d'), ['class' => 'form-control']) !!}
    </div>

    <!-----Tags Form Input ---->

    <div class="form-group">
        {!! Form::label('tag_list', '标签：') !!}
        {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

    <!-----Add Article Form Input ---->

    <div class = "form-group">
        {!! Form::submit('发布', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}


@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            tags: true
        });
    </script>
@endsection

@stop
