@extends('front.layouts.frontend')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs margin-bottom-40">
        <div class="container">
            <h1 class="pull-left">Registration</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Pages</a></li>
                <li class="active">Registration</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                {!! Form::open(['action' => 'Frontend\TutorsController@store', 'class' => 'reg-page']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="reg-header">
                    <h2>完整教师档案</h2>
                    <p>想晚点再填写？ <a href="/home" class="color-green">主页</a></p>
                </div>

                @include('errors.list')

                <!-----Name Form Input ---->

                <div class="form-group">
                    <div class="col-md-4">
                        {!! Form::label('name', '真实姓名') !!}
                    </div>
                    <div class="col-md-6">
                        {!! Form::text('name', null, ['class' => 'form-control margin-bottom-20']) !!}
                    </div>
                </div>

                <!-----Occupation Form Input ---->

                <div class="form-group">
                    <div class="col-md-4">
                    {!! Form::label('occupation', '您的身份') !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::radio('occupation', 'college', (Input::old('occupation'))) !!} 大学在校生
                    {!! Form::radio('occupation', 'education_center', (Input::old('occupation'))) !!} 教育机构老师
                    {!! Form::radio('occupation', 'school', (Input::old('occupation'))) !!} 在职教师
                    </div>
                </div>

                <!-----Capable_grade Form Input ---->

                <div class = "form-group">
                    <div class="col-md-4">
                    {!! Form::label('capable_grade', '擅长年级') !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::radio('capable_grade', 'preschool', (Input::old('capable_grade'))) !!} 学前教育
                    {!! Form::radio('capable_grade', 'elementary', (Input::old('capable_grade'))) !!} 小学教育
                    {!! Form::radio('capable_grade', 'middle_school', (Input::old('capable_grade'))) !!} 中学教育
                    {!! Form::radio('capable_grade', 'high_school', (Input::old('capable_grade'))) !!} 高中教育
                    </div>
                </div>

                <!-----Tags Form Input ---->

                <div class="form-group">
                    <div class="col-md-4">
                    {!! Form::label('tag_can_teach', '擅长科目') !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::select('tag_can_teach[]', $tag_can_teach, null, ['id' => 'tag_can_teach', 'class' => 'form-control', 'multiple']) !!}
                    </div>
                </div>

                <!-----Self_intro Form Input ---->

                <div class="form-group">
                    <div class="col-md-4">
                    {!! Form::label('self_intro', '自我介绍') !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::textarea('self_intro', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!----- Form Input ---->

                <div class = "form-group">
                    {!! Form::submit('submit', ['class' => 'btn btn-primary form-control']) !!}
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('#tag_can_teach').select2({
            placeholder: 'Choose a tag',
            tags: true
        });
    </script>
@endsection