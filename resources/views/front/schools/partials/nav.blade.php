<ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
    <li class="{{Request::is( 'schools/'. $id . '/profile' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('schools/'. $id . '/profile' )}}"><i class="fa fa-user"></i> 学校信息</a>
    </li>
    <li class="{{Request::is( 'schools/'. $id . '/students' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('schools/'. $id . '/students' )}}"><i class="fa fa-group"></i> 现有学生</a>
    </li>
    <li class="{{Request::is( 'schools/'. $id . '/tutors' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('schools/'. $id . '/tutors' )}}"><i class="fa fa-group"></i> 现有老师</a>
    </li>
    <li class="{{Request::is( 'schools/'. $id . '/lessons' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('schools/'. $id . '/lessons' )}}"><i class="fa fa-cubes"></i> 现有课程 </a>
    </li>
    <li class="{{Request::is( 'schools/'. $id . '/comments' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{URL::to('schools/'. $id . '/comments' )}}"><i class="fa fa-comments"></i> 评价</a>
    </li>
</ul>