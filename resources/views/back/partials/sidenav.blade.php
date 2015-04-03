<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar side-nav">
        <li class="{{Request::is('backend/dashboard') ? 'active' : '' }}"><a href="{{URL::to('backend/dashboard')}}">主页<span class="sr-only">(current)</span></a></li>
        <li class="{{Request::is('backend/articles') ? 'active' : '' }}"><a href="{{URL::to('backend/articles')}}">新闻</a></li>
        <li class="{{Request::is('backend/coupons') ? 'active' : '' }}"><a href="{{URL::to('backend/coupons')}}">优惠信息</a></li>
        <li class="{{Request::is('backend/schools') ? 'active' : '' }}"><a href="{{URL::to('backend/schools')}}">学校</a></li>
        <li class="{{Request::is('backend/tutors') ? 'active' : '' }}"><a href="{{URL::to('backend/tutors')}}">家教</a></li>
        <li class="{{Request::is('backend/students') ? 'active' : '' }}"><a href="{{URL::to('backend/students')}}">学生</a></li>
        <li class="{{Request::is('backend/users') ? 'active' : '' }}"><a href="{{URL::to('backend/users')}}">用户</a></li>
        <li class="{{Request::is('backend/roles') ? 'active' : '' }}"><a href="{{URL::to('backend/roles')}}">权限</a></li>
    </ul>
</div>