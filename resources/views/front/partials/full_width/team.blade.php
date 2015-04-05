<!--=== Team v3 ===-->
<div class="container content-sm">
    <div class="headline-center margin-bottom-60">
        <h2>我们的教师团队</h2>
        <p>一对一辅导，六对一服务<br>
            专业心理老师，考前全天心理疏通 </p>
    </div>

    @if($school->tutors->count() < 4)
    <div class="row team-v3">
        <div class="col-md-3 col-sm-6 md-margin-bottom-50">
            <div class="team-img">
                <img class="img-responsive" src="/assets/img/team/img1-md.jpg" alt="">
                <div class="team-hover">
                    <span>Daniel Wearne</span>
                    <small>Technical Director</small>
                    <p>Lorem ipsum dolor sit ame con sectetur adipisci ng e lit.</p>
                    <ul class="list-inline team-social-v3">
                        <li><a href="#"><i class="rounded-x fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="rounded-x fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="rounded-x fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 md-margin-bottom-50">
            <div class="team-img">
                <img class="img-responsive" src="/assets/img/team/img5-md.jpg" alt="">
                <div class="team-hover">
                    <span>Sara Lisbon</span>
                    <small>Designer</small>
                    <p>Lorem ipsum dolor sit ame con sectetur adipisci ng e lit.</p>
                    <ul class="list-inline team-social-v3">
                        <li><a href="#"><i class="rounded-x fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="rounded-x fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="rounded-x fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 sm-margin-bottom-50">
            <div class="team-img">
                <img class="img-responsive" src="/assets/img/team/img3-md.jpg" alt="">
                <div class="team-hover">
                    <span>John Doe</span>
                    <small>Developer</small>
                    <p>Lorem ipsum dolor sit ame con sectetur adipisci ng e lit.</p>
                    <ul class="list-inline team-social-v3">
                        <li><a href="#"><i class="rounded-x fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="rounded-x fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="rounded-x fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="team-img">
                <img class="img-responsive" src="/assets/img/team/img2-md.jpg" alt="">
                <div class="team-hover">
                    <span>Alice Williams</span>
                    <small>Support</small>
                    <p>Lorem ipsum dolor sit ame con sectetur adipisci ng e lit.</p>
                    <ul class="list-inline team-social-v3">
                        <li><a href="#"><i class="rounded-x fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="rounded-x fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="rounded-x fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!--/end row-->
    @else
        <div class="row team-v3">
            @foreach($school->tutors as $tutor)
            <div class="col-md-3 col-sm-6 md-margin-bottom-50">
                <div class="team-img">
                    <img class="img-responsive" src="{{$tutor->user->photo}}" alt="">
                    <div class="team-hover">
                        <a href="{{action('Frontend\TutorsController@show', [$tutor->id])}}"><span>{{$tutor->name}}</span></a>
                        <small>{{$tutor->title}}</small>
                        <p>{{$tutor->bio}}</p>
                        <ul class="list-inline team-social-v3">
                            <li><a href="#"><i class="rounded-x fa fa-weibo"></i></a></li>
                            <li><a href="#"><i class="rounded-x fa fa-qq"></i></a></li>
                            <li><a href="#"><i class="rounded-x fa fa-weixin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach    
        </div>
    @endif
</div>
<!--=== End Team v3 ===-->
