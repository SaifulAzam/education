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

    <div class="container">
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
                    <div class="col-md-3">
                    {!! Form::label('occupation', '您的身份') !!}
                    </div>
                    <div class="col-md-7">
                        <ul style="list-style-type: none">
                            <li>{!! Form::radio('occupation', '大学在校生', (Input::old('occupation'))) !!} 大学在校生</li>
                            <li>{!! Form::radio('occupation', '教育机构老师', (Input::old('occupation'))) !!} 教育机构老师</li>
                            <li>{!! Form::radio('occupation', '在职教师', (Input::old('occupation'))) !!} 在职教师</li>
                        </ul>
                    </div>

                </div>


                <!-----Capable_grade Form Input ---->

                <div class = "form-group">
                    <div class="col-md-3">
                    {!! Form::label('capable_grade', '擅长年级') !!}
                    </div>
                    <div class="col-md-7">
                        <ul style="list-style-type: none">
                            <li>{!! Form::radio('capable_grade', '学前教育', (Input::old('capable_grade'))) !!} 学前教育</li>
                            <li>{!! Form::radio('capable_grade', '小学教育', (Input::old('capable_grade'))) !!} 小学教育</li>
                            <li>{!! Form::radio('capable_grade', '中学教育', (Input::old('capable_grade'))) !!} 中学教育</li>
                            <li>{!! Form::radio('capable_grade', '高中教育', (Input::old('capable_grade'))) !!} 高中教育</li>
                        </ul>
                    </div>
                </div>

                <!-----Tags Form Input ---->

                <div class="form-group">
                    <div class="col-md-4">
                    {!! Form::label('tag_can_teach', '擅长科目') !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::select('tag_can_teach[]', $tag_list, null, ['id' => 'tag_can_teach', 'class' => 'form-control', 'multiple']) !!}
                    </div>
                </div>

                <!-----Self_intro Form Input ---->

                <div class="form-group">
                    <div class="col-md-4">
                    {!! Form::label('bio', '自我介绍') !!}
                    </div>
                    <div class="col-md-6">
                    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <!----- Form Input ---->

                <div class = "form-group">
                    {!! Form::submit('完成', ['class' => 'btn btn-success form-control']) !!}
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