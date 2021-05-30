{{--<li>--}}
    <form wire:submit.prevent="{{$video->isFavored ? 'unfavored' : 'favored'}}">
        <button type="submit" class="btn favorite border-none" href="#"><i class="text-danger fa
                              {{$video->isFavored ? 'fa-heart' : 'fa-heart-o'}} "></i></button>
        @if (session()->has('favoriteMessage'))
        <div class="alert alert-warning alert-dismissible show position-absolute" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong class="text-center"> {{ session('favoriteMessage') }}</strong>
        </div>
            @endif
    </form>
{{--</li>--}}
