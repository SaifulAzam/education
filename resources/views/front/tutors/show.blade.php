@extends('front.layouts.frontend')

@section('css')
    <link rel="stylesheet" href="/assets/plugins/scrollbar/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/sky-forms.css">
    <link rel="stylesheet" href="/assets/plugins/sky-forms-pro/custom-sky-forms.css">
    <link rel="stylesheet" href="/assets/css/pages/profile.css">
@endsection

@section('js')
    <script type="text/javascript" src="/assets/plugins/sky-forms-pro/jquery-ui.min.js"></script>
    <script type="text/javascript" src="/assets/plugins/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            Datepicker.initDatepicker();
        });
    </script>
@endsection

@section('content')
    <!--=== Profile ===-->
    <div class="container content profile">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20" src="{{$tutor->user->photo}}" alt="">

                @include('front.partials.left_sidebar.tutor_sidenav', ['id' => $tutor->id])

                <div class="margin-bottom-50"></div>

                <!--Datepicker-->
                <form action="#" id="sky-form2" class="sky-form">
                    <div id="inline-start"></div>
                </form>
                <!--End Datepicker-->
            </div>
            <!--End Left Sidebar-->

            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    <!--Service Block v3-->
                    <div class="row margin-bottom-10">
                        <div class="col-sm-6 sm-margin-bottom-20">
                            <div class="service-block-v3 service-block-u">
                                <i class="icon-users"></i>
                                <span class="service-heading">总访问量</span>
                                <span class="counter">2,230</span>

                                <div class="clearfix margin-bottom-10"></div>

                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>上周访问量</small>
                                        <h4 class="counter">125</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>上个月访问量</small>
                                        <h4 class="counter">400</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="service-block-v3 service-block-blue">
                                <i class="icon-screen-desktop"></i>
                                <span class="service-heading">总共指导过学生</span>
                                <span class="counter">1,20</span>

                                <div class="clearfix margin-bottom-10"></div>

                                <div class="row margin-bottom-20">
                                    <div class="col-xs-6 service-in">
                                        <small>上周学生关注量</small>
                                        <h4 class="counter">19</h4>
                                    </div>
                                    <div class="col-xs-6 text-right service-in">
                                        <small>上个月学生关注量</small>
                                        <h4 class="counter">40</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/end row-->
                    <!--End Service Block v3-->

                    <hr>

                    <div class="row margin-bottom-20">
                        @include('front.tutors.overall.lesson', ['id' => $tutor->id])

                        @include('front.tutors.overall.student', ['id' => $tutor->id])
                    <hr>
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div><!--/container-->
    <!--=== End Profile ===-->
@endsection

