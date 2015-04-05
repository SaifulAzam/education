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
    <div class="container content profile" ng-controller="CommentsController">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20" src="{{$tutor->user->photo}}" alt="">

                @include('front.partials.left_sidebar.tutor_sidenav', ['id' => $tutor->id])

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
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-comments"></i>学生评价</h2>
                        </div>
                        <div class="panel-body margin-bottom-50" ng-hide="loading" ng-init="init('{{{Crypt::encrypt(get_class($tutor) . '.' . $tutor->getKey())}}}}')">
                            <!-- LOADING ICON =============================================== -->
                            <!-- show loading icon if the loading variable is set to true -->
                            <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>
                            <div class="media media-v2" ng-repeat="comment in comments">
                                <a class="pull-left" href="#">
                                    <img class="media-object rounded-x" src="/assets/img/testimonials/img2.jpg" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <strong><a href="#"><% comment.author_name %> </a></strong>
                                        <small><% comment.created_at %></small>
                                    </h4>
                                    <p><% comment.body %></p>
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
                            <button type="button" class="btn-u btn-u-default btn-block" ng-show="isMore" ng-click="loadMore()">Load More</button>
                        </div>
                    </div>
                    @if(Auth::guest())
                        <h3>请登入后评论</h3>
                        <a href="/auth/login"><button class="btn-u">登入</button></a>
                        <a href="/auth/register"><button class="btn-u">注册</button></a>
                        @else
                                <!-- Comment Form -->
                        <div class="post-comment">
                            <h3>评论一下</h3>
                            <form ng-submit="submitComment('{{{Crypt::encrypt(get_class($tutor) . '.' . $tutor->getKey())}}}}', '{{Auth::user()->nickname}}')"> <!-- ng-submit will disable the default form action and use our function -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <!-- COMMENT TEXT -->
                                <div class="row margin-bottom-20">
                                    <div class="col-md-11 col-md-offset-0">
                                        <textarea class="form-control" name="body" ng-change="change()" ng-model="commentData.body" placeholder="Say what you have to say"></textarea>
                                    </div>
                                </div>

                                <!-- SUBMIT BUTTON -->
                                <p><button class="btn-u" type="submit">Send Message</button></p>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
    <!--=== End Profile ===-->



@endsection