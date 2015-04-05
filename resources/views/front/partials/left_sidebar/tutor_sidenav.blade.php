<ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
    <li class="{{Request::is( 'tutors/'. $id ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('tutors/'. $id)}}"><i class="fa fa-bar-chart-o"></i> 主页</a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/profile' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('tutors/'. $id . '/profile' )}}"><i class="fa fa-user"></i> 个人信息</a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/students' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('tutors/'. $id . '/students' )}}"><i class="fa fa-group"></i> 学生</a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/lessons' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('tutors/'. $id . '/lessons' )}}"><i class="fa fa-cubes"></i> 课程 </a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/comments' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('tutors/'. $id . '/comments' )}}"><i class="fa fa-comments"></i> 评价</a>
    </li>
</ul>