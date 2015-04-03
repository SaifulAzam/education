@extends('front.layouts.frontend')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs-v1">
        <div class="container">
            <span>教育机构</span>
            <h1>集合了不同的教育中心的信息</h1>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
    <!--=== Content Part ===-->
    <div class="container content-md">
        <div class="row blog-page">
            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-40">
                <!-- Sort Menu -->
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            所在区域 <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{action('Frontend\SchoolsController@filterByLocation', 'East')}}">城东</a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByLocation', 'South')}}">城南</a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByLocation', 'West')}}">城西</a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByLocation', 'North')}}">城北</a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByLocation', 'LiangNong')}}">梁弄</a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByLocation', 'SiMen')}}">泗门</a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByLocation', 'ZhangTing')}}">丈亭</a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            成立时间 <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{action('Frontend\SchoolsController@filterByTime', '1')}}"> 一年 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByTime', '2')}}"> 两年 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByTime', '3')}}"> 三年 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByTime', '5')}}"> 五年 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByTime', '10')}}"> 十年 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@filterByTime', '11')}}"> 十年以上 </a></li>
                        </ul>
                    </div>

                    <div class="btn-group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            排列方式 <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{action('Frontend\SchoolsController@sortBy', 'good_count')}}"> 最多好评 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@sortBy', 'overall')}}"> 评分最高 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@sortBy', 'viewer_count')}}"> 访问最多 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@sortBy', 'student_count')}}"> 学生最多 </a></li>
                            <li><a href="{{action('Frontend\SchoolsController@sortBy', 'tutor_count')}}"> 老师最多 </a></li>
                        </ul>
                    </div>
                </div>
                <br><br>
                <!-- Sort Menu End -->
                <!--Blog Post-->
                @foreach($schools as $school)
                <div class="search-blocks search-blocks-left-green">
                    <div class="row">
                        <div class="col-md-4 search-img">
                            <img alt="" src="/assets/img/new/img1.jpg" class="img-responsive">
                            <ul class="list-unstyled">
                                <li><i class="icon-briefcase"></i> {{$school->location}}</li>
                                <li><i class="icon-map-marker"></i> {{$school->founding_time}}</li>
                            </ul>
                        </div>
                        <div class="col-md-8">
                            <h2><a href="{{action('Frontend\SchoolsController@show', [$school->id])}}">{{$school->name}}</a></h2>
                            <ul class="list-unstyled search-rating">
                                <li><i class="icon-star"></i></li>
                                <li><i class="icon-star"></i></li>
                                <li><i class="icon-star"></i></li>
                                <li><i class="icon-star"></i></li>
                                <li><i class="icon-star"></i></li>
                            </ul>
                            <p>{{$school->self_intro}}</p>
                            <a class="btn-u btn-u-sea" href="{{action('Frontend\SchoolsController@show', [$school->id])}}">read more</a>
                            <ul class="list-unstyled blog-tags text-right">
                                <li>好评数 {{ $school->good_count }}</li>
                                <li>评分 {{ $school->overall }}</li>
                                <li>人气 {{ $school->viewer_count }}</li>
                                <li>学生人数 {{ $school->student_count }}</li>
                                <li>教师人数 {{ $school->tutor_count }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
                <!--End Blog Post-->

                <div class="margin-bottom-20 clearfix"></div>

                <!--Pagination-->
                <div class="text-center">
                    <ul class="pagination">
                        {!! $schools->render() !!}
                    </ul>
                </div>
                <!--End Pagination-->
            </div>
            <!-- End Left Sidebar -->

            <!-- Right Sidebar -->
            <div class="col-md-3">
                @include('front.partials.right_sidebar.tags', ['controller' => 'Frontend\SchoolsController@filterByTag'])

                @include('front.partials.right_sidebar.recent_posts')

                @include('front.partials.right_sidebar.tab_widget')

                @include('front.partials.right_sidebar.photo_stream')

                @include('front.partials.right_sidebar.recent_weibo')
            </div>
            <!-- End Right Sidebar -->
        </div><!--/row-->
    </div><!--/container-->
    <!--=== End Content Part ===-->
@endsection
