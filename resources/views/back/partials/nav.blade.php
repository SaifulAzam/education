<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">家教集中营</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="{{Request::is('articles') ? 'active' : '' }}"><a href="/articles">新闻</a></li>
                <li class="{{Request::is('schools') ? 'active' : '' }}"><a href="/schools">学校</a></li>
                <li class="{{Request::is('lessons') ? 'active' : '' }}"><a href="/lessons">课程</a></li>
                <li class="{{Request::is('tutors') ? 'active' : '' }}"><a href="/tutors">老师</a></li>
                <li class="{{Request::is('coupons') ? 'active' : '' }}"><a href="/coupons">优惠信息</a></li>
                <li class="{{Request::is('community') ? 'active' : '' }}"><a href="/community">交流区</a> </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Profile</a></li>
                @if (Auth::guest())
                    <li><a href="/auth/login">登入</a></li>
                    <li><a href="/auth/register">注册</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nickname }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/auth/logout">登出</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
