@extends('front.layouts.frontend')

@section('content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs margin-bottom-20">
        <div class="container">
            <h1 class="pull-left">Blog Item 2</h1>
            <ul class="pull-right breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li><a href="">Blog</a></li>
                <li class="active">Blog Item 2</li>
            </ul>
        </div>
    </div><!--/breadcrumbs-->
    <!--=== End Breadcrumbs ===-->

    <!--=== Content Part ===-->
    <div class="container blog-page blog-item">
        <!--Blog Post-->
        <div class="blog margin-bottom-40">
            <div class="blog-img">
                <img class="img-responsive" src="/assets/img/sliders/revolution/bg8.jpg" alt="">
            </div>
            <h2> {{$article->title}}</h2>
            <div class="blog-post-tags">
                <ul class="list-unstyled list-inline blog-info">
                    <li><i class="icon-calendar"></i> {{$article->published_at}}</li>
                    <li><i class="icon-pencil"></i> {{$article->user->nickname}}</li>
                    <li><i class="icon-comments"></i> <a href="#">{{$article->comments->count()}} 评论</a></li>
                    <li><i class="icon-tags"></i>
                        @foreach($article->tags as $tag)
                            {{$tag->name}}
                        @endforeach
                    </li>
                </ul>
            </div>
            <p>{{$article->body}}</p>
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

       @include('front.partials.comments', ['owner' => $article])
    </div><!--/container-->
    <!--=== End Content Part ===-->

@stop