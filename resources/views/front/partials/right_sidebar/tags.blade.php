<!-- Blog Tags -->
<div class="headline headline-md"><h2>标签</h2></div>
<ul class="list-unstyled blog-tags margin-bottom-30">
    @foreach($tags as $tag)
        <li><a href="{{action($controller, $tag->id)}}"><i class="icon-tags"></i>{{$tag->name}}</a></li>
    @endforeach
</ul>
<!-- End Blog Tags -->