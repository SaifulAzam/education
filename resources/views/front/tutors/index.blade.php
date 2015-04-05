@extends('front.layouts.frontend')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs-v1">
        <div class="container">
            <span>老师中心</span>
            <h1>集合了不同的家庭教师的信息</h1>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
    <!--=== Content Part ===-->
    <div class="container content-md">
        <div class="row blog-page">
            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-40">
                <!--Blog Post-->
                @foreach($tutors as $tutor)
                    <div class="search-blocks search-blocks-left-green">
                        <div class="row">
                            <div class="col-md-4 search-img">
                                <img alt="" src="{{$tutor->user->photo}}" class="img-responsive">
                                <ul class="list-unstyled">
                                    <li><i class="icon-briefcase"></i> {{$tutor->occupation}} </li>
                                    <li><i class="icon-map-marker"></i> {{$tutor->student_count}} </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <h2><a href="{{action('Frontend\TutorsController@show', [$tutor->id])}}">{{$tutor->name}}</a></h2>
                                <ul class="list-unstyled search-rating">
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                </ul>
                                <p>{{$tutor->bio}}</p>
                                <a class="btn-u btn-u-sea" href="{{action('Frontend\TutorsController@show', [$tutor->id])}}">read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                            <!--End Blog Post-->

                    <div class="margin-bottom-20 clearfix"></div>

                    <!--Pagination-->
                    <div class="text-center">
                        <ul class="pagination">
                            {!! $tutors->render() !!}
                        </ul>
                    </div>
                    <!--End Pagination-->
            </div>
            <!-- End Left Sidebar -->

            <!-- Right Sidebar -->
            <div class="col-md-3">
                @include('front.partials.right_sidebar.tags', ['controller' => 'Frontend\TutorsController@filterByTag'])

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



