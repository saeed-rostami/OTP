@extends('layouts.master')

@section('content')

    <section class="container my-2">
        <div class="col-8 offset-2">
            <video class="player" playsinline controls>
                <source src="{{asset('storage/' . $selected_video->file)}}" type="video/mp4" />
                <source src="/path/to/video.webm" type="video/webm" />

                <!-- Captions are optional -->
                <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />
            </video>
        </div>
    </section>

    <div id="all-output" class="col-md-12">
        <div class="row">
            <!-- video-item -->
        @foreach($videos as $video)
            @include('main.Videos')
            <!-- // video-item -->
            @endforeach
        </div><!-- // row -->
    </div>



    {{$videos->links()}}

@endsection

