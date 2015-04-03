@extends('back.layouts.backend')

@section('content')
    <div class="page-header">
        <h3 class="blog-post-title">{{$article->title}}
            <div class="pull-right">
                <div class="pull-right">
                    <a href="{{action('Backend\ArticlesController@edit', $article->id)}}"
                       class="btn btn-sm btn-success btn-primary iframe"><span
                                class="glyphicon glyphicon-pencil"></span>编辑</a>
                </div>
            </div>
        </h3>
        <p class="blog-post-meta">{{$article->published_at}} by <a href="#">{{$article->user->nickname}}</a></p>
    </div>
    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <p>{{$article->body}}</p>
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>标签</h4>
                <ol class="list-unstyled">
                <li>
                    @foreach($article->tags as $tag)
                        {{$tag->name}}
                    @endforeach
                </li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#">March 2014</a></li>
                    <li><a href="#">February 2014</a></li>
                    <li><a href="#">January 2014</a></li>
                    <li><a href="#">December 2013</a></li>
                    <li><a href="#">November 2013</a></li>
                    <li><a href="#">October 2013</a></li>
                    <li><a href="#">September 2013</a></li>
                    <li><a href="#">August 2013</a></li>
                    <li><a href="#">July 2013</a></li>
                    <li><a href="#">June 2013</a></li>
                    <li><a href="#">May 2013</a></li>
                    <li><a href="#">April 2013</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="#">GitHub</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

    </div><!-- /.container -->
    </div>



@endsection