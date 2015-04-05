@extends('front.layouts.frontend')
@section('css')
    <link rel="stylesheet" href="/assets/css/pages/portfolio-v1.css">
@endsection
@section('content')
    <!--=== Breadcrumbs v3 ===-->
    <div class="breadcrumbs-v3 img-v1 margin-bottom-40">
        <div class="container text-center">
            <p>优惠信息</p>
            <h1>全城最全的优惠信息</h1>
        </div><!--/end container-->
    </div>
    <!--=== End Breadcrumbs v3 ===-->

    <!--=== Content Part ===-->
    <div class="container">
        @foreach($coupons->chunk(2) as $coupon_2)
        <div class="row">
            @foreach($coupon_2 as $coupon)
            <div class="col-sm-6">
                <div class="view view-tenth">
                    <img class="img-responsive" src="/assets/img/main/{{rand(1,4)}}.jpg" alt="" />
                    <div class="mask">
                        <h2>{{$coupon->title}}</h2>
                        <p>{{$coupon->body}}</p>
                        <a href="{{action('Frontend\CouponsController@show', [$coupon->id])}}" class="info">详细信息</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--/row-->
        @endforeach
                <!--Pagination-->
            <div class="text-center">
                <ul class="pagination">
                    {!! $coupons->render() !!}
                </ul>
            </div>
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection
