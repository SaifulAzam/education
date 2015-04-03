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
            <h1 class="pull-left">Portfolio Item 1</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Portfolio</a></li>
                <li class="active">Portfolio Item 1</li>
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
                <h2>Portfolio Item Information</h2>
                <p>At vero eos et accusamus et iusto odio dignissimos <a href="#">ducimus qui blanditiis</a> praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus.</p>
                <p>Molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus.</p>
                <ul class="list-unstyled">
                    <li><i class="icon-user color-green"></i> Jack Baur</li>
                    <li><i class="icon-calendar color-green"></i> 14,2003 February</li>
                    <li><i class="icon-tags color-green"></i> Websites, Google, HTML5/CSS3</li>
                </ul>
                <p><a class="btn-u btn-u-large" href="#">VISIT THE PROJECT</a></p>
            </div>
            <!-- End Content Info -->
        </div><!--/row-->

        <div class="tag-box tag-box-v2">
            <p>Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat.</p>
        </div>

        <div class="margin-bottom-20 clearfix"></div>
    </div><!--/container-->
    <!--=== End Content Part ===-->

@endsection