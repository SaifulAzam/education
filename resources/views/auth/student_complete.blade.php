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

    <!--=== Content Part ===-->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

                {!! Form::open(['action' => 'Frontend\StudentsController@store', 'class' => 'reg-page']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="reg-header">
                    <h2>完整教师档案</h2>
                    <p>想晚点再填写？ <a href="/home" class="color-green">主页</a></p>
                </div>

                @include('errors.list')
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
                    {!! Form::radio('desired_tutor', '大学在校生', (Input::old('desired_tutor'))) !!} 大学在校生
                    {!! Form::radio('desired_tutor', '教育机构老师', (Input::old('desired_tutor'))) !!} 教育机构老师
                    {!! Form::radio('desired_tutor', '在职教师', (Input::old('desired_tutor'))) !!} 在职教师
                </div>

                <!-----Tags Form Input ---->

                <div class="form-group">
                    {!! Form::label('subject', '欠缺科目') !!}
                    {!! Form::select('subject[]', $tag_list, null, ['id' => 'subject', 'class' => 'form-control', 'multiple']) !!}
                </div>

                <!----- Form Input ---->

                <div class = "form-group">
                    {!! Form::submit('完成', ['class' => 'btn btn-success form-control']) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <!--=== End Content Part ===-->
@endsection

@section('footer')
    <script>
        $('#subject').select2({
            placeholder: 'Choose a tag',
            tags: true
        });
    </script>
@endsection
