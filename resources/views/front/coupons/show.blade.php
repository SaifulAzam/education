@extends('front.layouts.frontend')
@section('css')
    <link rel="stylesheet" href="/assets/plugins/bxslider/jquery.bxslider.css">
@endsection
@section('js')
    <script type="text/javascript" src="/assets/plugins/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.initBxSlider();
        });
    </script>
@endsection
@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs margin-bottom-40">
        <div class="container">
            <h1 class="pull-left">{{$coupon->title}}</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="/">主页</a></li>
                <li><a href="/coupons">优惠信息</a></li>
                <li class="active">{{$coupon->title}}</li>
            </ul>
        </div><!--/container-->
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container">
        <div class="row portfolio-item margin-bottom-50">
            <!-- Carousel -->
            <div class="col-md-7">
                <div class="carousel slide carousel-v1" id="myCarousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img alt="" src="/assets/img/main/11.jpg">
                            <div class="carousel-caption">
                                <p>Facilisis odio, dapibus ac justo acilisis gestinas.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="" src="/assets/img/main/12.jpg">
                            <div class="carousel-caption">
                                <p>Cras justo odio, dapibus ac facilisis into egestas.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="" src="/assets/img/main/13.jpg">
                            <div class="carousel-caption">
                                <p>Justo cras odio apibus ac afilisis lingestas de.</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-arrow">
                        <a data-slide="prev" href="#myCarousel" class="left carousel-control">
                            <i class="icon-angle-left"></i>
                        </a>
                        <a data-slide="next" href="#myCarousel" class="right carousel-control">
                            <i class="icon-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- End Carousel -->

            <!-- Content Info -->
            <div class="col-md-5">
                <h2>{{$coupon->title}}</h2>
                <p>{{$coupon->body}}</p>
                <ul class="list-unstyled">
                    <li><i class="icon-user color-green"></i> 老师：{{$coupon->tutor ? $coupon->tutor->name : ''}}</li>
                    <li><i class="icon-calendar color-green"></i> 学校：{{$coupon->school ? $coupon->school->name : ''}}</li>
                    <li><i class="icon-tags color-green"></i> 原价：{{$coupon->original_price}}</li>
                    <li><i class="icon-tags color-green"></i> 折扣价：{{$coupon->coupon_price}}</li>
                    <li><i class="icon-compass color-green"></i> 课时：{{$coupon->class_count}}</li>
                    <li><i class="icon-book color-green"></i> 课型：{{$coupon->class_type}}</li>
                </ul>
                <p><a class="btn-u btn-u-large" href="#">我想参加</a></p>
            </div>
            <!-- End Content Info -->
        </div><!--/row-->

        @include('front.partials.comments', ['owner' => $coupon])

    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection