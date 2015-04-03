@extends('front.layouts.frontend')
@section('css')
    <link rel="stylesheet" href="/assets/css/pages/profile.css">
    <link rel="stylesheet" href="/assets/css/pages/shortcode_timeline2.css">
    <link rel="stylesheet" href="/assets/plugins/scrollbar/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/custom-sky-forms.css">
@endsection
@section('js')
    <script type="text/javascript" src="/assets/plugins/sky-forms-pro/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/circles-master.js"></script>
    <script type="text/javascript" src="/assets/plugins/circles-master/circles.js"></script>
    <script>
        jQuery(document).ready(function() {
            Datepicker.initDatepicker();
            CirclesMaster.initCirclesMaster1();
        });
    </script>
@endsection
@section('content')
    <!--=== Profile ===-->
    <div class="container content profile">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20" src="/assets/img/team/img1-md.jpg" alt="">

                @include('front.partials.left_sidebar.tutor_sidenav', ['id' => $tutor->id])

                @include('front.partials.left_sidebar.task')

                <!--Datepicker-->
                <form action="#" id="sky-form2" class="sky-form">
                    <div id="inline-start"></div>
                </form>
                <!--End Datepicker-->

                <div class="margin-bottom-50"></div>

            </div>
            <!--End Left Sidebar-->
            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments"></i>Users Comments</h2>
                            <a href="#"><i class="fa fa-cog pull-right"></i></a>
                        </div>
                        <div class="panel-body margin-bottom-50">
                            <div class="media media-v2">
                                <a class="pull-left" href="#">
                                    <img class="media-object rounded-x" src="/assets/img/testimonials/img2.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <strong><a href="#">Eva Nelson</a></strong> @EvaNelson
                                        <small>About an hour ago</small>
                                    </h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec malesuada rhoncus tellus blandit facilisis. Morbi faucibus eros facilisis vulputate mollis. Mauris sodales ante lorem, sed fringilla orci rhoncus ac. Donec sit amet eros at libero egestas interdum non quis libero.</p>
                                    <ul class="list-inline results-list pull-left">
                                        <li><a href="#">25 Likes</a></li>
                                        <li><a href="#">10 Share</a></li>
                                    </ul>
                                    <ul class="list-inline pull-right">
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                    </ul>
                                </div>
                            </div><!--/end media media v2-->
                            <div class="media media-v2 margin-bottom-20">
                                <a class="pull-left" href="#">
                                    <img class="media-object rounded-x" src="/assets/img/testimonials/img3.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <strong><a href="#">Frank Lennon</a></strong> @FLennon
                                        <small>4 hours ago</small>
                                    </h4>
                                    <p>I'm incredibly excited to announce that I am joining the amazing <a href="#">@Unify</a> team. To be in touch with the latest update, Sign up and get your own Account page fee free :) Like mine: <a href="#">http://www.unify.com/flennon</a></p>
                                    <ul class="list-inline results-list pull-left">
                                        <li><a href="#">5 Likes</a></li>
                                        <li><a href="#">1 Share</a></li>
                                    </ul>
                                    <ul class="list-inline pull-right">
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                    </ul>

                                    <div class="clearfix"></div>

                                    <div class="media media-v2">
                                        <a class="pull-left" href="#">
                                            <img class="media-object rounded-x" src="/assets/img/testimonials/img7.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <strong><a href="#">Edward Rooster</a></strong> @EdwardRooster
                                                <small>5 hours ago</small>
                                            </h4>
                                            <p>Welcome to Board! :) Your journey starts here. Wish you all the best!</p>
                                            <ul class="list-inline results-list pull-left">
                                                <li><a href="#">0 Likes</a></li>
                                                <li><a href="#">0 Share</a></li>
                                            </ul>
                                            <ul class="list-inline pull-right">
                                                <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                                <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/end media media v2-->
                            <button type="button" class="btn-u btn-u-default btn-block">Load More</button>
                        </div>
                    </div>

                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments"></i>Projects Comments</h2>
                            <a href="#"><i class="fa fa-cog pull-right"></i></a>
                        </div>
                        <div class="panel-body">
                            <div class="media media-v2 margin-bottom-20">
                                <a class="pull-left" href="#">
                                    <img class="media-object rounded-x" src="/assets/img/testimonials/img6.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <strong><a href="#">Lee Parker</a></strong> @LeePark
                                        <small>12 hours ago</small>
                                    </h4>
                                    <p>Pellentesque scelerisque vitae mi quis sollicitudin. Sed pellentesque nulla eleifend hendrerit rhoncus. Aenean rhoncus imperdiet pretium. Nunc vitae egestas eros, vel fringilla arcu. Duis vel libero sit amet metus faucibus venenatis in sit amet nisl. Fusce imperdiet enim risus. Cras orci velit, tempor dignissim ante eget, rhoncus hendrerit nisi. </p>
                                    <ul class="list-inline img-uploaded">
                                        <li><img class="img-responsive" src="/assets/img/main/img12.jpg" alt=""></li>
                                        <li><img class="img-responsive" src="/assets/img/main/img3.jpg" alt=""></li>
                                        <li><img class="img-responsive" src="/assets/img/main/img16.jpg" alt=""></li>
                                    </ul>
                                    <ul class="list-inline results-list pull-left">
                                        <li><a href="#">7 Likes</a></li>
                                        <li><a href="#">2 Share</a></li>
                                    </ul>
                                    <ul class="list-inline pull-right">
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                        <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                    </ul>

                                    <div class="clearfix"></div>

                                    <div class="media media-v2">
                                        <a class="pull-left" href="#">
                                            <img class="media-object rounded-x" src="/assets/img/testimonials/img7.jpg" alt="">
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <strong><a href="#">Edward Rooster</a></strong> @EdwardRooster
                                                <small>7 hours ago</small>
                                            </h4>
                                            <p>How was trip?</p>
                                            <ul class="list-inline results-list pull-left">
                                                <li><a href="#">0 Likes</a></li>
                                                <li><a href="#">0 Share</a></li>
                                            </ul>
                                            <ul class="list-inline pull-right">
                                                <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                                <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                            </ul>

                                            <div class="clearfix"></div>

                                            <div class="media media-v2">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object rounded-x" src="/assets/img/testimonials/img6.jpg" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <strong><a href="#">Lee Parker</a></strong> @LeePark
                                                        <small>9 hours ago</small>
                                                    </h4>
                                                    <p>Amazing!</p>
                                                    <ul class="list-inline results-list pull-left">
                                                        <li><a href="#">0 Likes</a></li>
                                                        <li><a href="#">0 Share</a></li>
                                                    </ul>
                                                    <ul class="list-inline pull-right">
                                                        <li><a href="#"><i class="expand-list rounded-x fa fa-reply"></i></a></li>
                                                        <li><a href="#"><i class="expand-list rounded-x fa fa-heart"></i></a></li>
                                                        <li><a href="#"><i class="expand-list rounded-x fa fa-retweet"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!--/end media media v2-->
                            <button type="button" class="btn-u btn-u-default btn-block">Load More</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
    <!--=== End Profile ===-->



@endsection