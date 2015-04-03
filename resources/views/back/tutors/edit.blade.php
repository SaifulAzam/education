@extends('back.layouts.backend')

@section('content')

    <div class="page-header">
        <h3>编辑教师信息</h3>
    </div>

    {!! Form::model($tutor, ['method' => 'PATCH', 'action' => ['Backend\TutorsController@update', $tutor->id]]) !!}
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

    <!-----Occupation Form Input ---->

    <div class="form-group">
        {!! Form::label('occupation', '您的身份') !!}
        {!! Form::radio('occupation', 'college', (Input::old('occupation'))) !!} 大学在校生
        {!! Form::radio('occupation', 'education_center', (Input::old('occupation'))) !!} 教育机构老师
        {!! Form::radio('occupation', 'school', (Input::old('occupation'))) !!} 在职教师
    </div>

    <!-----Capable_grade Form Input ---->

    <div class = "form-group">
        {!! Form::label('capable_grade', '擅长年级') !!}
        {!! Form::radio('capable_grade', 'preschool', (Input::old('capable_grade'))) !!} 学前教育
        {!! Form::radio('capable_grade', 'elementary', (Input::old('capable_grade'))) !!} 小学教育
        {!! Form::radio('capable_grade', 'middle_school', (Input::old('capable_grade'))) !!} 中学教育
        {!! Form::radio('capable_grade', 'high_school', (Input::old('capable_grade'))) !!} 高中教育
    </div>

    <!-----Tags Form Input ---->

    <div class="form-group">
        {!! Form::label('tag_list', '擅长科目') !!}
        {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

    <!-----Self_intro Form Input ---->

    <div class="form-group">
        {!! Form::label('self_intro', '自我介绍') !!}
        {!! Form::textarea('self_intro', null, ['class' => 'form-control']) !!}
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
