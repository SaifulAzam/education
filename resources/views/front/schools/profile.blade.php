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
    <script>
        $('#tag_list').select2({
            placeholder: '选择擅长科目',
            tags: false
        });
    </script>
@endsection
@section('content')

    @include('front.schools.partials.edit_social')
    @include('front.schools.partials.edit_tag')
    @include('front.schools.partials.edit_picture')
    @include('front.schools.partials.edit_basic')

    <!--=== Profile ===-->
    <div class="container content profile">
        <div class="row">
            <!--Left Sidebar-->
            <div class="col-md-3 md-margin-bottom-40">
                <img class="img-responsive profile-img margin-bottom-20" src="{{$school->photo}}" alt="">

                @include('front.schools.partials.nav', ['id' => $school->id])

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
                    <div class="profile-bio">
                        <div class="row">
                            <div class="col-md-5">
                                <img class="img-responsive md-margin-bottom-10" src="{{$school->photo}}" alt="">
                                @if($currentUser)
                                    @if($currentUser->isSchoolAdmin($school->name))
                                        <a class="btn-u btn-u-sm" data-toggle="modal" data-target="#edit_picture">上传头像</a>
                                    @endif
                                @endif
                            </div>
                            <div class="col-md-7">
                                @if($currentUser)
                                    @if($currentUser->isSchoolAdmin($school->name))
                                        <i class="fa fa-cog pull-right" data-toggle="modal" data-target="#edit_basic"></i>
                                    @endif
                                @endif
                                <h2>{{$school->name}}</h2>
                                <span><strong>成立时间：</strong> {{$school->founding_time}}</span>
                                <span><strong>地址：</strong> {{$school->address}}</span>
                                <span><strong>城区：</strong> {{$school->location}}</span>
                                <span><strong>现有学生数量：</strong> {{$school->student_count}}</span>

                                <hr>
                                <p>{{$school->bio}}</p>
                            </div>
                        </div>
                    </div><!--/end row-->

                    <hr>

                    <div class="row">
                        <!--Social Icons v3-->
                        <div class="col-sm-6 sm-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> 联系方式 </h2>
                                    @if($currentUser)
                                        @if($currentUser->isSchoolAdmin($school->name))
                                            <i class="fa fa-cog pull-right" data-toggle="modal" data-target="#edit_social"></i>
                                        @endif
                                    @endif
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled social-contacts-v2">
                                        <li><i class="rounded-x fa fa-mobile"></i> <a href="#">{{$school->phone}}</a></li>
                                        <li><i class="rounded-x fa fa-envelope"></i> <a href="#">{{$school->email}}</a></li>
                                        <li><i class="rounded-x fa fa-weibo"></i> <a href="#">{{$school->weibo}}</a></li>
                                        <li><i class="rounded-x fa fa-qq"></i> <a href="#">{{$school->qq}}</a></li>
                                        <li><i class="rounded-x fa fa-weixin"></i> <a href="#">{{$school->weixin}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End Social Icons v3-->

                        <!--Skills-->
                        <div class="col-sm-6 sm-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-lightbulb-o"></i> 擅长科目</h2>
                                    @if($currentUser)
                                        @if($currentUser->isSchoolAdmin($school->name))
                                            <i class="fa fa-cog pull-right" data-toggle="modal" data-target="#edit_tag"></i>
                                        @endif
                                    @endif
                                </div>
                                <div class="panel-body">
                                    @foreach($school->tags as $tag)
                                        <small>{{$tag->name}}</small>
                                        <small>{{$tag->tutor_score}}</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$tag->tutor_score}}" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--End Skills-->
                    </div><!--/end row-->

                    <hr>

                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
    <!--=== End Profile ===-->
@endsection