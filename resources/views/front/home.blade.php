@extends('front.layouts.frontend')

@section('content')
    @include('front.partials.slider')

    <!--=== Content Part ===-->
    <div class="container">
        <!-- Service Blocks -->
        <div class="row">
            <div class="col-md-4">
                <div class="service">
                    <i class="icon-resize-small service-icon"></i>
                    <div class="desc">
                        <h4>Fully Responsive</h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <i class="icon-cogs service-icon"></i>
                    <div class="desc">
                        <h4>HTML5 + CSS3</h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service">
                    <i class="icon-plane service-icon"></i>
                    <div class="desc">
                        <h4>Launch Ready</h4>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus etiam sem...</p>
                    </div>
                </div>
            </div>
        </div><!--/row-->
        <!-- End Service Blokcs -->

        <!-- Recent Works -->
        <div class="headline"><h2>Recent Works</h2></div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img class="img-responsive" src="assets/img/main/2.jpg" alt="" />
                        </div>
                        <a class="btn-more hover-effect" href="#">read more +</a>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="#">Project One</a></h3>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img class="img-responsive" src="assets/img/main/3.jpg" alt="" />
                        </div>
                        <a class="btn-more hover-effect" href="#">read more +</a>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="#">Project Two</a></h3>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img class="img-responsive" src="assets/img/main/9.jpg" alt="" />
                        </div>
                        <a class="btn-more hover-effect" href="#">read more +</a>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="#">Project Three</a></h3>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="thumbnails thumbnail-style thumbnail-kenburn">
                    <div class="thumbnail-img">
                        <div class="overflow-hidden">
                            <img class="img-responsive" src="assets/img/main/10.jpg" alt="" />
                        </div>
                        <a class="btn-more hover-effect" href="#">read more +</a>
                    </div>
                    <div class="caption">
                        <h3><a class="hover-effect" href="#">Project Four</a></h3>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, justo sit amet risus etiam porta sem.</p>
                    </div>
                </div>
            </div>
        </div><!--/row-->
        <!-- End Recent Works -->

        <!-- Info Blokcs -->
        <div class="row">
            <!-- Welcome Block -->
            <div class="col-md-8">
                <div class="headline"><h2>Welcome To Unify</h2></div>
                <div class="row">
                    <div class="col-sm-4">
                        <img class="img-responsive margin-bottom-20" src="assets/img/main/6.jpg" alt="" />
                    </div>
                    <div class="col-sm-8">
                        <p>Unify is an incredibly beautiful responsive Bootstrap Template for corporate and creative professionals. It works on all major web browsers, tablets and phone.</p>
                        <ul class="list-unstyled margin-bottom-20">
                            <li><i class="icon-ok color-green"></i> Donec id elit non mi porta gravida</li>
                            <li><i class="icon-ok color-green"></i> Corporate and Creative</li>
                            <li><i class="icon-ok color-green"></i> Responsive Bootstrap Template</li>
                            <li><i class="icon-ok color-green"></i> Corporate and Creative</li>
                        </ul>
                    </div>
                </div>

                <blockquote class="hero-unify">
                    <p>Award winning digital agency. We bring a personal and effective approach to every project we work on, which is why. Unify is an incredibly beautiful responsive Bootstrap Template for corporate professionals.</p>
                    <small>CEO, Jack Bour</small>
                </blockquote>
            </div><!--/col-md-8-->

            <!-- Latest Shots -->
            <div class="col-md-4">
                <div class="headline"><h2>Latest Shots</h2></div>
                <div id="myCarousel" class="carousel slide carousel-v1">
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="assets/img/main/5.jpg" alt="">
                            <div class="carousel-caption">
                                <p>Facilisis odio, dapibus ac justo acilisis gestinas.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/main/4.jpg" alt="">
                            <div class="carousel-caption">
                                <p>Cras justo odio, dapibus ac facilisis into egestas.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img src="assets/img/main/3.jpg" alt="">
                            <div class="carousel-caption">
                                <p>Justo cras odio apibus ac afilisis lingestas de.</p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-arrow">
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <i class="icon-angle-left"></i>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <i class="icon-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div><!--/col-md-4-->
        </div><!--/row-->
        <!-- End Info Blokcs -->

        <!-- Our Clients -->
        <div id="clients-flexslider" class="flexslider home clients">
            <div class="headline"><h2>Our Clients</h2></div>
            <ul class="slides">
                <li>
                    <a href="#">
                        <img src="assets/img/clients/hp_grey.png" alt="" />
                        <img src="assets/img/clients/hp.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/igneus_grey.png" alt="" />
                        <img src="assets/img/clients/igneus.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/vadafone_grey.png" alt="" />
                        <img src="assets/img/clients/vadafone.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/walmart_grey.png" alt="" />
                        <img src="assets/img/clients/walmart.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/shell_grey.png" alt="" />
                        <img src="assets/img/clients/shell.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/natural_grey.png" alt="" />
                        <img src="assets/img/clients/natural.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/aztec_grey.png" alt="" />
                        <img src="assets/img/clients/aztec.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/gamescast_grey.png" alt="" />
                        <img src="assets/img/clients/gamescast.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/cisco_grey.png" alt="" />
                        <img src="assets/img/clients/cisco.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/everyday_grey.png" alt="" />
                        <img src="assets/img/clients/everyday.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/cocacola_grey.png" alt="" />
                        <img src="assets/img/clients/cocacola.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/spinworkx_grey.png" alt="" />
                        <img src="assets/img/clients/spinworkx.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/shell_grey.png" alt="" />
                        <img src="assets/img/clients/shell.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/natural_grey.png" alt="" />
                        <img src="assets/img/clients/natural.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/gamescast_grey.png" alt="" />
                        <img src="assets/img/clients/gamescast.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/everyday_grey.png" alt="" />
                        <img src="assets/img/clients/everyday.png" class="color-img" alt="" />
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="assets/img/clients/spinworkx_grey.png" alt="" />
                        <img src="assets/img/clients/spinworkx.png" class="color-img" alt="" />
                    </a>
                </li>
            </ul>
        </div><!--/flexslider-->
        <!-- End Our Clients -->
    </div><!--/container-->
    <!-- End Content Part -->


@endsection