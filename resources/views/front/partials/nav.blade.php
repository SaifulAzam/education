<!--=== Top ===-->
<div class="top">
    <div class="container">
        <ul class="loginbar pull-right">
            @if (Auth::guest())
                <li class="devider"></li>
                <li><a href="/auth/login">登入</a></li>
                <li class="devider"></li>
                <li><a href="/auth/register">注册</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nickname }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::user()->hasRole('admin'))
                        <li><a href="/backend/dashboard">后台</a></li>
                        @endif
                        @if(Auth::user()->isSchoolAdmin('子轩教育'))
                            <li><a href="{{action('Frontend\SchoolsController@getProfile', '1')}}">学校后台</a></li>
                        @endif
                            @if(Auth::user()->tutor))
                                <li><a href="{{action('Frontend\TutorsController@show', $currentUser->tutor->id)}}">老师后台</a></li>
                            @endif
                        <li><a href="/auth/logout">登出</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div><!--/top-->
<!--=== End Top ===-->
<!--=== Header ===-->
<div class="header">
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <img id="logo-header" src="/assets/img/logo1-default.png" alt="Logo">
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{Request::is('articles') ? 'active' : '' }}"><a href="/articles">新闻</a></li>
                    <li class="{{Request::is('schools') ? 'active' : '' }}"><a href="/schools">学校</a></li>
                    <li class="{{Request::is('lessons') ? 'active' : '' }}"><a href="/lessons">课程</a></li>
                    <li class="{{Request::is('tutors') ? 'active' : '' }}"><a href="/tutors">老师</a></li>
                    <li class="{{Request::is('coupons') ? 'active' : '' }}"><a href="/coupons">优惠信息</a></li>
                </ul>
                <div class="search-open">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn-u" type="button">Go</button>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div><!-- /navbar-collapse -->
        </div>
    </div>
</div><!--/header-->
<!--=== End Header ===-->


