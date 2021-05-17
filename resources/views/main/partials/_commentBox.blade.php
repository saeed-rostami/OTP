<!-- Comments -->
<div id="comments" class="post-comments single-comments">
    <h3 class="post-box-title"><span>{{$video->approvedComments()->count()}}</span> Comments</h3>
    <ul class="comments-list">
        @foreach($video->approvedComments as $comment)
        <li>
            <div class="post_author">
                <div class="img_in">
                    <img src="{{asset('storage/'.$comment->user->avatar)}}" alt="">
                </div>
                <strong class="author-name">{{$comment->user->full_name}}</strong>
                <time datetime="2017-03-24T18:18">{{$comment->created_at}}</time>
            </div>
            <p>{{$comment->body}}</p>
            {{--<a href="#" class="reply">Reply</a>--}}

            {{--<ul class="children">--}}
                {{--<li>--}}
                    {{--<div class="post_author">--}}
                        {{--<div class="img_in">--}}
                            {{--<a href="#"><img src="demo_img/c2.jpg" alt=""></a>--}}
                        {{--</div>--}}
                        {{--<a href="#" class="author-name">Salam Ahmmed</a>--}}
                        {{--<time datetime="2017-03-24T18:18">July 27, 2014 - 11:00 PM</time>--}}
                    {{--</div>--}}
                    {{--<p>It is a long established fact that a reader will be distracted by the readable--}}
                        {{--content of a page when looking at its layout. The point of using Lorem Ipsum</p>--}}
                    {{--<a href="#" class="reply">Reply</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </li>
            @endforeach

    </ul>


    <h3 class="post-box-title">Add Comments</h3>
    <form action="{{route('Comment-Store' , $video->id)}}" method="post">
        @csrf
        <textarea name="body" class="form-control" rows="8" id="body" placeholder="COMMENT"></textarea>
        <button type="submit" id="contact_submit" class="btn btn-dm">Post Comment</button>
    </form>
</div>
<!-- // Comments -->
