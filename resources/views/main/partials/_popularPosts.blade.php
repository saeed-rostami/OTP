<div class="widget recent-post-widget">
    <h3 class="widget-title">Popular Posts</h3>
    <ul class="recent-post">
        <!-- post -->
        @foreach($populars as $video)
        <li>
            <div class="thumb-latest-posts">
                <div class="image-left">
                    <a href="{{route('Video-Show' , $video->slug)}}" class="popular-img"><img src="demo_img/blog-3.png" alt="">
                        <div class="p-overlay"><i class="fa fa-bookmark-o " aria-hidden="true"></i></div>
                    </a>
                </div>
                <div class="p-content">
                    <h3><a href="{{route('Video-Show' , $video->slug)}}">{{$video->title}}</a></h3>
                    <span class="p-date">{{$video->custom_date}}</span>
                </div>
            </div>
            <div class="clear"></div>
        </li> <!-- // post -->
            @endforeach
    </ul>
    <div class="clear"></div>
</div>
