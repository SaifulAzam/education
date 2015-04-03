<ul class="list-group sidebar-nav-v1 margin-bottom-40" id="sidebar-nav-1">
    <li class="{{Request::is( 'tutors/'. $id ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{action('Frontend\TutorsController@show', $id)}}"><i class="fa fa-bar-chart-o"></i> Overall</a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/profile' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{action('Frontend\TutorsController@getProfile', $id)}}"><i class="fa fa-user"></i> Profile</a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/students' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{action('Frontend\TutorsController@getStudents', $id)}}"><i class="fa fa-group"></i> My Students</a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/lessons' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{action('Frontend\TutorsController@getLessons', $id)}}"><i class="fa fa-cubes"></i> My Lessons </a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/comments' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{action('Frontend\TutorsController@getComments', $id)}}"><i class="fa fa-comments"></i> Comments</a>
    </li>
    <li class="{{Request::is( 'tutors/'. $id . '/settings' ) ? 'list-group-item active' : 'list-group-item' }}">
        <a href="{{action('Frontend\TutorsController@getSettings', $id)}}"><i class="fa fa-cog"></i> Settings</a>
    </li>
</ul>