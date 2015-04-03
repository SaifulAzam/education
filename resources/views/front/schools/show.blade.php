@extends('front.layouts.frontend')

@section('content')

    <!--=== Interactive Slider ===-->
    <div class="breadcrumbs-v3 img-v1 text-center">
        <div class="container">
            <h1>{{ $school->name }} </h1>
            <p>Unify is a clean and fully responsive</p>
        </div>
    </div>
    <!--=== End Interactive Slider ===-->

    <!--=== Title v1 ===-->
    <div class="container content-sm">
        <div class="title-v1 no-margin-bottom">
            <p class="no-margin-bottom">Unify <strong>creative</strong> technology company providing key digital services. <br>
                Focused on helping our clients to build a <strong>successful</strong> business on web and mobile.</p>
            {{ $school->self_intro }}
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
                <h2>WHAT PEOPLE SAY</h2>
                <p>Phasellus vitae ipsum ex. Etiam eu vestibulum ante. <br>
                    Lorem ipsum <strong>dolor</strong> sit amet, consectetur adipiscing elit. Morbi libero libero, imperdiet fringilla </p>
            </div>

            <!-- Testimonials Wrap -->
            <div class="testimonials-v6 testimonials-wrap">
                @unless($school->comments->isEmpty())
                        <div class="row margin-bottom-50">
                            @foreach ($school->comments as $comment)
                            <div class="col-md-6 md-margin-bottom-50">
                                <div class="testimonials-info rounded-bottom">
                                    <img class="rounded-x" src="/assets/img/testimonials/img5.jpg" alt="">
                                    <div class="testimonials-desc">
                                        <p>{{ $comment->comment }}</p>
                                        <strong>{{$comment->user->nickname}}</strong>
                                        <span>Web Developer</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="col-md-6">
                                <div class="testimonials-info rounded-bottom">
                                    <img class="rounded-x" src="/assets/img/testimonials/img6.jpg" alt="">
                                    <div class="testimonials-desc">
                                        <p>Donec quis lorem sit amet nibh tempor porttitor non eu justo. Fusce iaculis scelerisque nibh at rhoncus. Aliquam blandit.</p>
                                        <strong>Sara Lisbon</strong>
                                        <span>Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div><!--/end row-->
                @endunless
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
            </div>
            <!-- End Testimonials Wrap -->
        </div><!--/end container-->
    </div>
    <!--=== End Testimonials v6 ===-->
    <!-- Comment Form -->
    <div class="container content-sm">
        <div class="post-comment">
            <h3>评论一下</h3>
            {!! Form::open(['action' => ['Frontend\SchoolsController@storeComment', $school->id]]) !!}

            <!-----Comment Form Input ---->

            <div class="row margin-bottom-20">
                <div class="col-md-11 col-md-offset-0">
                    {!! Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '8']) !!}
                </div>
            </div>

            <!-----submit Form Input ---->

            <p><button class="btn-u" type="submit">Send Message</button></p>

            {!! Form::close() !!}
        </div>
    </div>
    <!-- End Comment Form -->
@endsection
