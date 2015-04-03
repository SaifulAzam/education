@extends('back.layouts.backend')

@section('content')
    <div class="page-header">
        <h3>
            优惠信息
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{action('Backend\CouponsController@create')}}"
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
                <th>学校名字</th>
                <th>标题</th>
                <th>原价</th>
                <th>现价</th>
                <th>折扣</th>
                <th>可执行</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($coupons as $coupon)
                <tr>
                    <td>{{$coupon->school->name}}</td>
                    <td>{{$coupon->title}}</td>
                    <td>{{$coupon->original_price}}</td>
                    <td>{{$coupon->coupon_price}}</td>
                    <td>{{$coupon->discount}}%</td>
                    <td> <a href="{{action('Backend\CouponsController@edit', [$coupon->id])}}"
                            class="btn btn-sm btn-success btn-primary iframe">
                            <span class="glyphicon glyphicon-pencil"></span>编辑</a>
                        <a href="{{action('Backend\CouponsController@getDelete', [$coupon->id])}}"
                           class="btn btn-sm btn-danger btn-primary iframe">
                            <span class="glyphicon glyphicon-trash"></span>删除</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection