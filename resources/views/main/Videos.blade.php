@extends('layouts.master')

@section('content')
    <div id="all-output" class="col-md-12">
        <div class="row">

            <!-- video-item -->
            @foreach($videos as $video)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="video-item">
                        <div class="thumb">
                            <div class="hover-efect"></div>
                            <small class="time">10:53</small>
                            <a href="{{route('Video-Show' , $video->slug)}}"><img src="demo_img/v1.png" alt=""></a>
                        </div>
                        <div class="video-info">
                            <a href="{{route('Video-Show' , $video->slug)}}" class="title">{{$video->title}} </a>
                            <a class="channel-name" href="#">Rabie Elkheir<span>
                            <i class="fa fa-check-circle"></i></span></a>
                            <span class="views"><i class="fa fa-eye"></i>{{$video->view}} </span>
                            <span class="date"><i class="fa fa-clock-o"></i>{{$video->created_at}} </span>
                        </div>
                    </div>
                </div>
                <!-- // video-item -->
            @endforeach
        </div><!-- // row -->
    </div>



    {{$videos->links()}}

@endsection
