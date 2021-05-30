{{--<li>--}}
    <form wire:submit.prevent="{{$video->isLiked ? 'unlike' : 'like'}}">
        @if (session()->has('likeMessage'))
            <div class="alert alert-warning alert-dismissible show position-absolute" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong class="text-center"> {{ session('likeMessage') }}</strong>

            </div>
        @endif
        <button type="submit" class="btn like border-none" href="">
            <i class="fa {{$video->isLiked ? 'fa-thumbs-up' : 'fa-thumbs-o-up'}}">
                {{$video->likesCount()}}
            </i>
        </button>
    </form>
{{--</li>--}}

