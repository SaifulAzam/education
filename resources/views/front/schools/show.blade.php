@extends('front.layouts.frontend')

@section('content')

    <!--=== Interactive Slider ===-->
    <div class="breadcrumbs-v3 img-v1 text-center">
        <div class="container">
            <a href="{{URL::to('schools/'. $school->id . '/profile' )}}"><h1>{{ $school->name }} </h1></a>
        </div>
    </div>
    <!--=== End Interactive Slider ===-->

    <!--=== Title v1 ===-->
    <div class="container content-sm">
        <div class="title-v1 no-margin-bottom">
            <h3>个性化教育领跑者——子轩教育</h3>
            <p class="no-margin-bottom">
                我们来自中国经济发展速度最快的沿海城市 ，我们寻求二三线城市志同道合的你们，同等的消费level、同样的教育idea、同款的题海book，足以让我们“心”照不宣，我们是你的中国好拍档。远亲不如近邻，和子轩一起创造教育界的传奇。
                .</p>
        </div>
    </div>
    <!--=== End Title v1 ===-->

    @include('front.partials.full_width.service_block')

    @include('front.partials.full_width.container')

    @include('front.partials.full_width.parallax')

    @include('front.partials.full_width.team')

    <!--=== Testimonials v6 ===-->
    <div class="bg-color-light">
        <div class="container content-sm">
            <div class="headline-center margin-bottom-60">
                <a href="{{URL::to('schools/'. $school->id . '/comments' )}}"><h2>就读过的学生对我们的评价</h2></a>
                <p></p>
            </div>

            <!-- Testimonials Wrap -->
            <div class="testimonials-v6 testimonials-wrap">
                @unless($school->comments->isEmpty())
                    @foreach ($school->comments()->paginate(4)->chunk(2) as $comments)
                        <div class="row margin-bottom-50">
                            @foreach($comments as $comment)
                            <div class="col-md-6 md-margin-bottom-50">
                                <div class="testimonials-info rounded-bottom">
                                    <img class="rounded-x" src="/assets/img/testimonials/img5.jpg" alt="">
                                    <div class="testimonials-desc">
                                        <p>{{ $comment->body }}</p>
                                        <strong>{{$comment->author_name}}</strong>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div><!--/end row-->
                    @endforeach
                @endunless
                @if(false)
                <div class="row margin-bottom-20">
                    <div class="col-md-6 md-margin-bottom-50">
                        <div class="testimonials-info rounded-bottom">
                            <img class="rounded-x" src="/assets/img/testimonials/img3.jpg" alt="">
                            <div class="testimonials-desc">
                                <p>Donec quis lorem sit amet nibh tempor porttitor non eu justo. Fusce iaculis scelerisque nibh at rhoncus. Aliquam blandit.</p>
                                <strong>Alice Williams</strong>
                                <span>Web Developer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="testimonials-info rounded-bottom">
                            <img class="rounded-x" src="/assets/img/testimonials/img2.jpg" alt="">
                            <div class="testimonials-desc">
                                <p>Donec quis lorem sit amet nibh tempor porttitor non eu justo. Fusce iaculis scelerisque nibh at rhoncus. Aliquam blandit.</p>
                                <strong>Jane Wearne</strong>
                                <span>Technical Direector</span>
                            </div>
                        </div>
                    </div>
                </div><!--/end row-->
                @endif
            </div>
            <!-- End Testimonials Wrap -->
        </div><!--/end container-->
    </div>
    <!--=== End Testimonials v6 ===-->

@endsection
