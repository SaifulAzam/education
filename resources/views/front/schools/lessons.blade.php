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

    @include('front.schools.partials.add_lesson')
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
            <!-- Profile Content -->
            <div class="col-md-9">
                <div class="profile-body">
                    @if($currentUser)
                        @if($currentUser->isSchoolAdmin($school->name))
                            <i class="fa fa-plus btn" data-toggle="modal" data-target="#add_lesson"></i>
                        @endif
                    @endif
                                    <!--Projects-->
                            @if($school->lessons->count() == 0)
                                <h3>此学校还没有任何课程</h3>
                            @else
                                @foreach(array_chunk($school->lessons->all(), 2) as $lessons)
                                    <div class="row">
                                        @foreach($lessons as $lesson)
                                            <div class="col-sm-6">
                                                <div class="easy-block-v1">
                                                    <img class="img-responsive" src="/assets/img/main/img12.jpg" alt="">
                                                    <div class="easy-block-v1-badge rgba-red">
                                                        @foreach($lesson->tags as $tag)
                                                            {{$tag->name}}
                                                        @endforeach
                                                            @if($currentUser)
                                                                @if($currentUser->isSchoolAdmin($school->name))
                                                                <form id="deleteForm" method="post" action="{{URL::to('schools/' . $school->id . '/deleteLesson/' . $lesson->id)}}">
                                                                    <button type="submit" class="fa fa-trash pull-right"></button>
                                                                </form>
                                                                <button class="fa fa-pencil pull-right" data-toggle="modal" data-target="#edit_lesson"></button>
                                                                @endif
                                                            @endif
                                                    </div>
                                                </div>
                                                <div class="projects">
                                                    <h2><a class="color-dark" href="{{action('Frontend\LessonsController@show', [$lesson->id])}}">{{$lesson->title}}</a></h2>
                                                    <ul class="list-unstyled list-inline blog-info-v2">
                                                        <li>By: <a class="color-green" href="#">{{$school->name}}</a></li>
                                                        <li><i class="fa fa-clock-o"></i> {{$lesson->published_at}}</li>
                                                    </ul>
                                                    <p>{{$lesson->body}}</p>
                                                    <br>
                                                    <h3 class="heading-xs">Project Completeness <span class="pull-right">77%</span></h3>
                                                    <div class="progress progress-u progress-xxs">
                                                        <div class="progress-bar progress-bar-u" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%">
                                                        </div>
                                                    </div>
                                                    <ul class="list-inline blog-info-v2">
                                                        <li>
                                                            <strong>12%</strong>
                                                            <span>Funded</span>
                                                        </li>
                                                        <li>
                                                            <strong>17%</strong>
                                                            <span>Pludged</span>
                                                        </li>
                                                        <li>
                                                            <strong>25</strong>
                                                            <span>days to go</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="project-share">
                                                    <ul class="list-inline comment-list-v2 pull-left">
                                                        <li><i class="fa fa-eye"></i> <a href="#">25</a></li>
                                                        <li><i class="fa fa-comments"></i> <a href="#">32</a></li>
                                                        <li><i class="fa fa-retweet"></i> <a href="#">77</a></li>
                                                    </ul>
                                                    <ul class="list-inline star-vote pull-right">
                                                        <li><i class="color-green fa fa-star"></i></li>
                                                        <li><i class="color-green fa fa-star"></i></li>
                                                        <li><i class="color-green fa fa-star"></i></li>
                                                        <li><i class="color-green fa fa-star-half-o"></i></li>
                                                        <li><i class="color-green fa fa-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                @endforeach
                            @endif
                            <button type="button" class="btn-u btn-u-default btn-u-sm btn-block">Load More</button>
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
    <!--=== End Profile ===-->


@endsection