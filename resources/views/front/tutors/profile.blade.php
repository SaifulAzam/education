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

    @include('front.tutors.profile.edit_social')
    @include('front.tutors.profile.edit_tag')
    @include('front.tutors.profile.edit_job')
    @include('front.tutors.profile.edit_education')
    @include('front.tutors.profile.edit_picture')

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
                    <div class="profile-bio">
                        <div class="row">
                            <div class="col-md-5">
                                <img class="img-responsive md-margin-bottom-10" src=
                                @if($tutor->thumbnail != '')
                                    "/image/{{$tutor->thumbnail}}"
                                @else "/image/person-placeholder.jpg" @endif alt="">
                                <a class="btn-u btn-u-sm" data-toggle="modal" data-target="#edit_picture">Change Picture</a>
                            </div>
                            <div class="col-md-7">
                                <h2>Edward Rooster</h2>
                                <span><strong>Job:</strong> Web Developer</span>
                                <span><strong>Position:</strong> Web Designer</span>
                                <hr>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eget massa nec turpis congue bibendum. Integer nulla felis, porta suscipit nulla et, dignissim commodo nunc. Morbi a semper nulla.</p>
                                <p>Proin mauris odio, pharetra quis ligula non, vulputate vehicula quam. Nunc in libero vitae nunc ultricies tincidunt ut sed leo. Sed luctus dui ut congue consequat. Cras consequat nisl ante, nec malesuada velit pellentesque ac. Pellentesque nec arcu in ipsum iaculis convallis.</p>
                            </div>
                        </div>
                    </div><!--/end row-->

                    <hr>

                    <div class="row">
                        <!--Social Icons v3-->
                        <div class="col-sm-6 sm-margin-bottom-30">
                            <div class="panel panel-profile">
                                <div class="panel-heading overflow-h">
                                    <h2 class="panel-title heading-sm pull-left"><i class="fa fa-pencil"></i> 社区账户 </h2>
                                    <i class="fa fa-cog pull-right" data-toggle="modal" data-target="#edit_social"></i>
                                </div>
                                <div class="panel-body">
                                    <ul class="list-unstyled social-contacts-v2">
                                        <li><i class="rounded-x fa fa-mobile"></i> <a href="#">{{$tutor->user->cellphone}}</a></li>
                                        <li><i class="rounded-x fa fa-envelope"></i> <a href="#">{{$tutor->user->email}}</a></li>
                                        <li><i class="rounded-x fa fa-weibo"></i> <a href="#">{{$tutor->weibo}}</a></li>
                                        <li><i class="rounded-x fa fa-qq"></i> <a href="#">{{$tutor->qq}}</a></li>
                                        <li><i class="rounded-x fa fa-weixin"></i> <a href="#">{{$tutor->weixin}}</a></li>
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
                                    <i class="fa fa-cog pull-right" data-toggle="modal" data-target="#edit_tag"></i>
                                </div>
                                <div class="panel-body">
                                    @foreach($tutor->tags as $tag)
                                        <small>{{$tag->name}}</small>
                                        <small>{{$tag->tutor_score}}</small>
                                        <div class="progress progress-u progress-xxs">
                                            <div style="width: {{$tag->tutor_score}}%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="{{$tag->tutor_score}}" role="progressbar" class="progress-bar progress-bar-u">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!--End Skills-->
                    </div><!--/end row-->

                    <hr>

                    <!--Timeline-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-briefcase"></i> 工作经验</h2>
                            <i class="fa fa-cog pull-right" data-toggle="modal" data-target="#edit_job"></i>
                        </div>
                        <div class="panel-body margin-bottom-40">

                            @if($tutor->jobs->count() == 0)
                                <h4>这家伙很懒</h4>
                            @else
                                @foreach ($tutor->jobs as $job)
                                    <ul class="timeline-v2 timeline-me">
                                        <li>
                                            <time datetime="" class="cbp_tmtime"><span>{{$job->position}}</span> <span>{{$job->starting_time}} <br> {{$job->ending_time}}</span></time>
                                            <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                            <div class="cbp_tmlabel">
                                                <h2>{{$job->company_name}}</h2>
                                                <form id="deleteForm" method="post" action="{{URL::to('tutors/' . $tutor->id . '/deleteJob/' . $job->id)}}">
                                                <button type="submit" class="btn btn-sm btn-danger pull-right">
                                                    <span class="glyphicon glyphicon-trash"></span> 删除</button>
                                                </form>
                                                <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!--End Timeline-->

                    <!--Timeline-->
                    <div class="panel panel-profile">
                        <div class="panel-heading overflow-h">
                            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-mortar-board"></i> 学习履历</h2>
                            <i class="fa fa-cog pull-right" data-toggle="modal" data-target="#edit_education"></i>
                        </div>
                        <div class="panel-body">
                            @if($tutor->educations->count() == 0)
                                <h4>这家伙很懒</h4>
                            @else
                                @foreach ($tutor->educations as $education)
                                    <ul class="timeline-v2 timeline-me">
                                        <li>
                                            <time datetime="" class="cbp_tmtime"><span>{{$education->position}}</span> <span>{{$education->starting_time}} <br> {{$education->ending_time}}</span></time>
                                            <i class="cbp_tmicon rounded-x hidden-xs"></i>
                                            <div class="cbp_tmlabel">
                                                <h2>{{$education->school_name}}</h2>
                                                <form id="deleteForm" method="post" action="{{URL::to('tutors/' . $tutor->id . '/deleteEducation/' . $education->id)}}">
                                                    <button type="submit" class="btn btn-sm btn-danger pull-right">
                                                        <span class="glyphicon glyphicon-trash"></span> 删除</button>
                                                </form>
                                                <p>Winter purslane courgette pumpkin quandong komatsuna fennel green bean cucumber watercress. Peasprouts wattle seed rutabaga okra yarrow cress avocado grape.</p>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <!--End Timeline-->

                </div>
            </div>
            <!-- End Profile Content -->
        </div>
    </div>
    <!--=== End Profile ===-->
@endsection