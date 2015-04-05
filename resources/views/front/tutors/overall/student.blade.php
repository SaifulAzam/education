<!--Profile Event-->
<div class="col-sm-6 md-margin-bottom-20">
    <div class="panel panel-profile no-bg">
        <div class="panel-heading overflow-h">
            <h2 class="panel-title heading-sm pull-left"><i class="fa fa-group"></i>学生</h2>
            <a href="{{action('Frontend\TutorsController@getStudents', $id)}}" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">查看全部</a>
        </div>
        <div id="scrollbar2" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">
            @if($tutor->students->count() == 0)
                <h3>这家伙还没有任何学生</h3>
            @else
                @foreach($tutor->students as $student)
                    <div class="profile-event">
                        <div class="date-formats">
                            <span>25</span>
                            <small>05, 2014</small>
                        </div>
                        <div class="overflow-h">
                            <h3 class="heading-xs"><a href="#">{{$student->name}}</a></h3>
                            <p>想要学习的科目：@foreach($student->tags as $tag)
                                                {{$tag->name}},
                                            @endforeach
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!--End Profile Event-->
</div><!--/end row-->