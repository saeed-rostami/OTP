<div class="widget category-post-no">
    <h3 class="widget-title">Categories</h3>
    <ul>
        @foreach($categories as $category)
            <li>
                <a href="{{route('Category-Show' , $category->slug)}}">{{$category->title}}</a>
                <span class="post-count pull-right"> {{$category->video_count}}</span>
            </li>
        @endforeach
    </ul>
    <div class="clear"></div>
</div>
