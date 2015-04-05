<!--Profile Post-->
<div class="col-sm-6">
    <div class="panel panel-profile no-bg">
        <div class="panel-heading overflow-h">
            <h2 class="panel-title heading-sm pull-left"><i class="glyphicon glyphicon-book"></i>职教课程</h2>
            <a href="{{action('Frontend\TutorsController@getLessons', $id)}}" class="btn-u btn-brd btn-brd-hover btn-u-dark btn-u-xs pull-right">查看全部</a>
        </div>
        <div id="scrollbar" class="panel-body no-padding mCustomScrollbar" data-mcs-theme="minimal-dark">
            @if($tutor->lessons->count() == 0)
                <h3>这家伙还没有任何课程</h3>
            @else
                @foreach($tutor->lessons as $index=>$lesson)
                <div class="profile-post color-one">
                    <span class="profile-post-numb">@if($index+1 < 10) 0{{$index + 1}} @else {{$index + 1}} @endif</span>
                    <div class="profile-post-in">
                        <h3 class="heading-xs"><a href="{{action('Frontend\LessonsController@show', [$lesson->id])}}">{{$lesson->title}}</a></h3>
                        <p>{{substr($lesson->body, 0, 50)}}</p>
                    </div>
                </div>
                @endforeach
             @endif

        </div>
    </div>
</div>
<!--End Profile Post-->