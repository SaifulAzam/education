@extends('front.layouts.frontend')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs-v1">
        <div class="container">
            <span>新闻</span>
            <h1>关于教育的最新消息</h1>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->
    <!--=== Content Part ===-->
    <div class="container content-md">
        <div class="row blog-page">
            <!-- Left Sidebar -->
            <div class="col-md-9 md-margin-bottom-40">

                @foreach ($articles as $article)
                <!--Blog Post-->
                <div class="row blog blog-medium margin-bottom-40">
                    <div class="col-md-5">
                        <img class="img-responsive" src="{{ $article->picture }}" alt="">
                    </div>
                    <div class="col-md-7">
                        <h2>{{ $article->title }}</h2>
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="icon-calendar"></i> {{ $article->published_at }}</li>
                            <li><i class="icon-comments"></i> <a href="#">{{$article->comments->count()}} 评论</a></li>
                            <li><i class="icon-tags"></i>
                                @foreach($article->tags as $tag)
                                    {{$tag->name}}
                                @endforeach
                            </li>
                        </ul>
                        <p>{{substr($article->body, 0, 200)}}</p>
                        <p>
                            <a class="btn-u btn-u-small" href="{{action('Frontend\ArticlesController@show', [$article->id])}}">
                                <i class="icon-location-arrow"></i> Read More
                            </a>
                        </p>
                    </div>
                </div>
                    <hr class="margin-bottom-40">
                @endforeach
                <!--End Blog Post-->

                <!--Pagination-->
                <div class="text-center">
                    <ul class="pagination">
                        {!! $articles->render() !!}
                    </ul>
                </div>
                <!--End Pagination-->
            </div>
            <!-- End Left Sidebar -->

            <!-- Right Sidebar -->
            <div class="col-md-3">
                @include('front.partials.right_sidebar.tags', ['controller' => 'Frontend\ArticlesController@filterByTag'])

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
