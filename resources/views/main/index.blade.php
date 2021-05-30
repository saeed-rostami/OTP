@extends('layouts.master')

@section('content')
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

