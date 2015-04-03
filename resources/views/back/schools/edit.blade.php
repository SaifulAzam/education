@extends('back.layouts.backend')

@section('content')

    <div class="page-header">
        <h3>编辑学校</h3>
    </div>
    {!! Form::model($school, ['method' => 'PATCH', 'action' => ['Backend\SchoolsController@update', $school->id]]) !!}
        <!-----Title Form Input ---->

        <div class="form-group">
            {!! Form::label('name', '校名：') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>

        <!-----Body Form Input ---->

        <div class="form-group">
            {!! Form::label('email', '邮件：') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>

        <!-----Phone Form Input ---->

        <div class="form-group">
            {!! Form::label('phone', '电话：') !!}
            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        </div>

        <!-----Founding_time Form Input ---->

        <div class="form-group">
            {!! Form::label('founding_time', '成立时间：') !!}
            {!! Form::text('founding_time', null, ['class' => 'form-control']) !!}
        </div>

        <!-----Tags Form Input ---->

        <div class="form-group">
            {!! Form::label('tag_list', '标签：') !!}
            {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
        </div>

        <!-----Add Article Form Input ---->

        <div class = "form-group">
            {!! Form::submit('更改', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    {!! Form::close() !!}
@endsection

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder: 'Choose a tag',
            tags: true
        });
    </script>
@endsection

@stop
