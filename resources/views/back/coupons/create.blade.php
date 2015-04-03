@extends('back.layouts.backend')

@section('content')

    <div class="page-header">
        <h3>创建优惠信息</h3>
    </div>
    {!! Form::open(['action' => 'Backend\CouponsController@store']) !!}
        <!-----Title Form Input ---->

        <div class="form-group">
            {!! Form::label('title', '标题：') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <!-----School_name Form Input ---->

        <div class="form-group">
            {!! Form::label('school_names', '学校名字：') !!}
            {!! Form::select('school_names[]', $school_names, null, ['id' => 'school_name', 'class' => 'form-control', 'single']) !!}
        </div>

        <!-----Body Form Input ---->

        <div class="form-group">
            {!! Form::label('body', '主体：') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
        </div>

        <!-----Phone Form Input ---->

        <div class="form-group">
            {!! Form::label('original_price', '原价：') !!}
            {!! Form::text('original_price', null, ['class' => 'form-control']) !!}
        </div>

        <!-----Founding_time Form Input ---->

        <div class="form-group">
            {!! Form::label('coupon_price', '折扣价：') !!}
            {!! Form::text('coupon_price', null, ['class' => 'form-control']) !!}
        </div>

        <!-----class_type Form Input ---->

        <div class = "form-group">
            {!! Form::label('class_type', '教学方式：') !!}
            {!! Form::radio('class_type', 'one_on_one', (Input::old('class_type'))) !!} 一对一
            {!! Form::radio('class_type', 'small_class', (Input::old('class_type'))) !!} 小班
            {!! Form::radio('class_type', 'medium_class', (Input::old('class_type'))) !!} 中班
            {!! Form::radio('class_type', 'big_class', (Input::old('class_type'))) !!} 大班
        </div>

        <!-----Class_count Form Input ---->

        <div class="form-group">
            {!! Form::label('class_count', '课时：') !!}
            {!! Form::text('class_count', null, ['class' => 'form-control']) !!}
        </div>

        <!-----Tags Form Input ---->

        <div class="form-group">
            {!! Form::label('tag_list', '标签：') !!}
            {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
        </div>

        <!-----Add Coupon Form Input ---->

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
        $('#school_name').select2({
            placeholder: '选择学校',
            tags: false
        });
    </script>
@endsection

@stop
