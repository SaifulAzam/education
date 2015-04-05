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
                <div class="profile-body margin-bottom-20">
                    <!--Profile Blog-->
                    @if($school->students->count() == 0)
                        <h3>这家伙还没有任何学生</h3>
                    @else
                        @foreach(array_chunk($school->students->all(), 2) as $students)
                            <div class="row margin-bottom-20">
                                @foreach($students as $student)
                                    <div class="col-sm-6 sm-margin-bottom-20">
                                        <div class="profile-blog">
                                            <img class="rounded-x" src="{{$student->user->photo}}" alt="">
                                            <div class="name-location">
                                                <strong>{{$student->name}}</strong>
                                                <span><i class="fa fa-map-marker"></i><a href="#">California,</a> <a href="#">US</a></span>
                                            </div>
                                            <div class="clearfix margin-bottom-20"></div>
                                            <p>想要学习的科目：@foreach($student->tags as $tag)
                                                    {{$tag->name}},
                                                @endforeach</p>
                                            <hr>
                                            <ul class="list-inline share-list">
                                                <li><i class="fa fa-clock"></i>学习时间：三天</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div><!--/end row-->
                            <!--End Profile Blog-->
                        @endforeach
                    @endif

                    <button type="button" class="btn-u btn-u-default btn-block text-center">Load More</button>
                    <!--End Profile Blog-->
                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
    <!--=== End Profile ===-->
@endsection