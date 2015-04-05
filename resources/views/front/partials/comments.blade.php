<div class="blog-item" ng-controller="CommentsController">

    <!-- LOADING ICON =============================================== -->
    <!-- show loading icon if the loading variable is set to true -->
    <p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

    <!-- Recent Comments -->
    <div class="media" ng-hide="loading" ng-init="init('{{{Crypt::encrypt(get_class($owner) . '.' . $owner->getKey())}}}}')">
        <h3>最近评论</h3>
        <div ng-repeat="comment in comments">
            <a class="pull-left" href="#">
                <img class="media-object" src="/assets/img/sliders/elastislide/9.jpg" alt="" />
            </a>
            <div class="media-body">
                <h4 class="media-heading"><% comment.author_name %> <span> <% comment.created_at %> </span></h4>
                <p> <% comment.body %> </p>
            </div>
            <br>
        </div>
        @if(!Auth::guest())
            <div ng-show="typing">
                <!-- Live Preview -->
                <a class="pull-left" href="#">
                    <img class="media-object" src="/assets/img/sliders/elastislide/9.jpg" alt="" />
                </a>
                <div class="media-body">
                    <h4 class="media-heading"> {{Auth::user()->nickname}} <span> {{\Carbon\Carbon::now()}} </span></h4>
                    <p> <% commentData.body %> </p>
                </div>
                <br>
                <!-- End Live Preview -->
            </div>
        @endif
    </div><!--/media-->
    <!-- End Recent Comments -->
    <button class="btn btn-success" ng-show="isMore" ng-click="loadMore()">Load More</button>

    <hr>

        @if(Auth::guest())
            <h3>请登入后评论</h3>
            <a href="/auth/login"><button class="btn-u">登入</button></a>
            <a href="/auth/register"><button class="btn-u">注册</button></a>
        @else
                <!-- Comment Form -->
        <div class="post-comment">
            <h3>评论一下</h3>
            <form ng-submit="submitComment('{{{Crypt::encrypt(get_class($owner) . '.' . $owner->getKey())}}}}', '{{Auth::user()->nickname}}')"> <!-- ng-submit will disable the default form action and use our function -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <!-- COMMENT TEXT -->
                <div class="row margin-bottom-20">
                    <div class="col-md-11 col-md-offset-0">
                        <textarea class="form-control" name="body" row="8" ng-change="change()" ng-model="commentData.body" placeholder="Say what you have to say"></textarea>
                    </div>
                </div>

                <!-- SUBMIT BUTTON -->
                <p><button class="btn-u" type="submit">Send Message</button></p>
            </form>
        </div>
        @endif
                <!-- End Comment Form -->

</div>