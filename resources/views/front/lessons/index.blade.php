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
                <!--Blog Post-->
                @foreach($lessons as $lesson)
                    <div class="search-blocks search-blocks-left-green">
                        <div class="row">
                            <div class="col-md-4 search-img">
                                <img alt="" src="/assets/img/new/img5.jpg" class="img-responsive">
                                <ul class="list-unstyled">
                                    <li><i class="icon-briefcase"></i> </li>
                                    <li><i class="icon-map-marker"></i> </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <h2><a href="{{action('Frontend\LessonsController@show', [$lesson->id])}}">{{$lesson->title}}</a></h2>
                                <ul class="list-unstyled search-rating">
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                    <li><i class="icon-star"></i></li>
                                </ul>
                                <p>{{$lesson->body}}</p>
                                <a class="btn-u btn-u-sea" href="{{action('Frontend\LessonsController@show', [$lesson->id])}}">read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                            <!--End Blog Post-->

                    <div class="margin-bottom-20 clearfix"></div>

                    <!--Pagination-->
                    <div class="text-center">
                        <ul class="pagination">
                            {!! $lessons->render() !!}
                        </ul>
                    </div>
                    <!--End Pagination-->
            </div>
            <!-- End Left Sidebar -->

            <!-- Right Sidebar -->
            <div class="col-md-3">
                @include('front.partials.right_sidebar.tags', ['controller' => 'Frontend\LessonsController@filterByTag'])

                @include('front.partials.right_sidebar.recent_posts')

                @include('front.partials.right_sidebar.tab_widget')

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

