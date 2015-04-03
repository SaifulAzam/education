@extends('back.layouts.backend')

@section('content')

    <div class="page-header">
        <h3>编辑学生信息</h3>
    </div>

    {!! Form::model($student, ['method' => 'PATCH', 'action' => ['Backend\StudentsController@update', $student->id]]) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <!-----Related User Form Input ---->

    <div class="form-group">
        {!! Form::label('user_list', '关联用户') !!}
        <br>
        {{$username}}
    </div>

    <!-----Name Form Input ---->

    <div class="form-group">
        {!! Form::label('name', '真实姓名') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-----Grade Form Input ---->

    <div class="form-group">
        {!! Form::label('grade', '年级') !!}
        {!! Form::text('grade', null, ['class' => 'form-control']) !!}
    </div>

    <!-----Occupation Form Input ---->

    <div class="form-group">
        {!! Form::label('desired_tutor', '希望家教身份') !!}
        {!! Form::radio('desired_tutor', 'college', (Input::old('desired_tutor'))) !!} 大学在校生
        {!! Form::radio('desired_tutor', 'education_center', (Input::old('desired_tutor'))) !!} 教育机构老师
        {!! Form::radio('desired_tutor', 'school', (Input::old('desired_tutor'))) !!} 在职教师
    </div>

    <!-----Tags Form Input ---->

    <div class="form-group">
        {!! Form::label('tag_list', '欠缺科目') !!}
        {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

    <!----- Form Input ---->

    <div class = "form-group">
        {!! Form::submit('submit', ['class' => 'btn btn-primary form-control']) !!}
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
