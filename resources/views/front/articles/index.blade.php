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
                <!--Blog Post-->
                <div class="row blog blog-medium margin-bottom-40">
                    <div class="col-md-5">
                        <img class="img-responsive" src="/assets/img/main/11.jpg" alt="">
                    </div>
                    <div class="col-md-7">
                        <h2>Pellentesque Habitant Morbi Tristique</h2>
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="icon-calendar"></i> November 02, 2013</li>
                            <li><i class="icon-comments"></i> <a href="#">24 Comments</a></li>
                            <li><i class="icon-tags"></i> Technology, Internet</li>
                        </ul>
                        <p>At vero eos et accusamus et iusto odiomolestias dignis simos ducimus qui blandit occaeca bais praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        <p><a class="btn-u btn-u-small" href="blog_item.html"><i class="icon-location-arrow"></i> Read More</a></p>
                    </div>
                </div>
                <!--End Blog Post-->

                <hr class="margin-bottom-40">

                <!--Blog Post-->
                <div class="row blog blog-medium margin-bottom-40">
                    <div class="col-md-5">
                        <div class="blog-img">
                            <div class="responsive-video">
                                <iframe src="" frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h2>Pellentesque Habitant Morbi Tristique</h2>
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="icon-calendar"></i> November 02, 2013</li>
                            <li><i class="icon-comments"></i> <a href="#">24 Comments</a></li>
                            <li><i class="icon-tags"></i> Technology, Internet</li>
                        </ul>
                        <p>At vero eos et accusamus et iusto odiomolestias dignis simos ducimus qui blandit occaeca bais praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        <p><a class="btn-u btn-u-small" href="blog_item.html"><i class="icon-location-arrow"></i> Read More</a></p>
                    </div>
                </div>
                <!--End Blog Post-->

                <hr class="margin-bottom-40">

                <!--Blog Post-->
                <div class="row blog blog-medium margin-bottom-40">
                    <div class="col-md-5">
                        <div class="carousel slide carousel-v1" id="myCarousel">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img alt="" src="assets/img/main/3.jpg">
                                    <div class="carousel-caption">
                                        <p>Facilisis odio, dapibus ac justo acilisis gestinas.</p>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="blog-img">
                                        <div class="responsive-video">
                                            <iframe src="http://player.vimeo.com/video/9679622" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <img alt="" src="/assets/img/main/13.jpg">
                                    <div class="carousel-caption">
                                        <p>Justo cras odio apibus ac afilisis lingestas de.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-arrow">
                                <a data-slide="prev" href="#myCarousel" class="left carousel-control">
                                    <i class="icon-angle-left"></i>
                                </a>
                                <a data-slide="next" href="#myCarousel" class="right carousel-control">
                                    <i class="icon-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h2>Pellentesque Habitant Morbi Tristique</h2>
                        <ul class="list-unstyled list-inline blog-info">
                            <li><i class="icon-calendar"></i> November 02, 2013</li>
                            <li><i class="icon-comments"></i> <a href="#">24 Comments</a></li>
                            <li><i class="icon-tags"></i> Technology, Internet</li>
                        </ul>
                        <p>At vero eos et accusamus et iusto odiomolestias dignis simos ducimus qui blandit occaeca bais praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.</p>
                        <p><a class="btn-u btn-u-small" href="blog_item.html"><i class="icon-location-arrow"></i> Read More</a></p>
                    </div>
                </div>
                <!--End Blog Post-->

                @foreach ($articles as $article)
                <hr class="margin-bottom-40">

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
