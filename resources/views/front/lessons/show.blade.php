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
                            <li><i class="icon-pencil"></i> Diana Anderson</li>
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
                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, mollitia animi, id est laborum et dolorum fug consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna.</p><br>
                    <div class="tag-box tag-box-v2">
                        <p>Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet consectetur adipiscing elit. Fusce condimentum eleifend enim a feugiatt non libero consectetur adipiscing elit magna. Sed et quam lacus. Condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat.</p>
                    </div>
                    <p>Officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, mollitia animi, id est laborum et dolorum fug consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend.</p>
                    <p>Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum</p><br>
                    <blockquote>
                        <p>Award winning digital agency. We bring a personal and effective approach to every project we work on, which is why.</p>
                        <small>CEO Jack Bour</small>
                    </blockquote>
                    <p>Deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, mollitia animi, id est laborum et dolorum fug consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus.</p>
                </div>
                <!--End Blog Post-->

                <hr>

                <!-- Recent Comments -->
                <div class="media">
                    <h3>最近评论</h3>
                    @foreach($lesson->comments as $comment)
                        <a class="pull-left" href="#">
                            <img class="media-object" src="/assets/img/sliders/elastislide/9.jpg" alt="" />
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $comment->user->nickname }} <span>{{ $comment->created_at }} </span></h4>
                            <p> {{$comment->comment}} </p>
                        </div>
                        <br>
                    @endforeach
                </div><!--/media-->
                <!-- End Recent Comments -->

                <hr>

                <!-- Comment Form -->
                <div class="post-comment">
                    <h3>评论一下</h3>
                    {!! Form::open(['action' => ['Frontend\LessonsController@storeComment', $lesson->id]]) !!}

                    <!-----Comment Form Input ---->

                    <div class="row margin-bottom-20">
                        <div class="col-md-11 col-md-offset-0">
                            {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '8']) !!}
                        </div>
                    </div>

                    <!-----submit Form Input ---->

                    <p><button class="btn-u" type="submit">Send Message</button></p>

                    {!! Form::close() !!}
                </div>
                <!-- End Comment Form -->
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
