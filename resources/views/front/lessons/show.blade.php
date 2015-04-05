@extends('front.layouts.frontend')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs margin-bottom-40">
        <div class="container">
            <h1 class="pull-left">课程</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">主页</a></li>
                <li><a href="">课程</a></li>
                <li class="active">{{$lesson->title}}</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container">
        <div class="row blog-page blog-item">
            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-60">
                <!--Blog Post-->
                <div class="blog margin-bottom-40">
                    <h2> {{$lesson->title}}</h2>
                    <div class="blog-post-tags">
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="icon-calendar"></i> {{$lesson->created_at}}</li>
                            <li><i class="icon-pencil"></i> {{$lesson->tutor->name}}</li>
                            <li><i class="icon-comments"></i> <a href="#">{{$lesson->comments->count()}}</a></li>
                        </ul>
                        <ul class="list-unstyled list-inline blog-tags">
                            <li>
                                <i class="icon-tags"></i>
                                @foreach($lesson->tags as $tag)
                                    {{$tag->name}}
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <div class="blog-img">
                        <img class="img-responsive" src="/assets/img/posts/2.jpg" alt="">
                    </div>
               </div>
                <!--End Blog Post-->

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">课程信息</h3>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <span class="badge">{{$lesson->tutor->name}}</span>
                                教师：
                            </li>
                            @if($lesson->school)
                            <li class="list-group-item">
                                <span class="badge">{{$lesson->school->name}}</span>
                                学校：
                            </li>
                            @endif
                            <li class="list-group-item">
                                <span class="badge">{{$lesson->price}}</span>
                                价格：
                            </li>
                            <li class="list-group-item">
                                <span class="badge">{{$lesson->class_count}}</span>
                                课时：
                            </li>
                            <li class="list-group-item">
                                <span class="badge">{{$lesson->class_type}}</span>
                                上课类型：
                            </li>
                            <li class="list-group-item">
                                简介：<br> {{$lesson->body}}
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <a><button class="btn btn-success">我想参加</button></a>
                    </div>
                </div>


                @include('front.partials.comments', ['owner' => $lesson])
            </div>
            <!-- End Left Sidebar -->

            <!-- Right Sidebar -->
            <div class="col-md-3 magazine-page">

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
