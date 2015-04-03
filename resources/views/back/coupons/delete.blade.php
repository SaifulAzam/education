@extends('back.layouts.backend')

@section('content')

    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-general" data-toggle="tab">确认删除？</a></li>
    </ul>

    {!! Form::open(['class' => 'form-horizontal', 'method' => 'DELETE', 'action' => ['Backend\CouponsController@destroy', $coupon->id]]) !!}

    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="table-responsive">
        <table id="table" class="table table-striped table-hover">
            <thead>
            <tr>
                <th>学校名字</th>
                <th>标题</th>
                <th>原价</th>
                <th>现价</th>
                <th>折扣</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>{{$coupon->school->name}}</td>
                <td>{{$coupon->title}}</td>
                <td>{{$coupon->original_price}}</td>
                <td>{{$coupon->coupon_price}}</td>
                <td>{{$coupon->discount}}%</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="form-group col-md-2">
        <div class="controls">
            <a href="{{URL::to('backend/coupons')}}">
                <element class="btn btn-warning btn-sm close_popup">
                    <span class="glyphicon glyphicon-ban-circle"></span> 取消</element></a>
            <button type="submit" class="btn btn-sm btn-danger">
                <span class="glyphicon glyphicon-trash"></span> 删除</button>
        </div>
    </div>

    {!! Form::close() !!}

@endsection