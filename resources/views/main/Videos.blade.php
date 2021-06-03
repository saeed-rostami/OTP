<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="video-item">
        <div class="thumb">
            <div class="hover-efect"></div>
            <small class="time">10:53</small>
            <a href="{{route('Video-Show' , $video->slug)}}"><img src="demo_img/v1.png" alt=""></a>
        </div>
        <div class="video-info">
            <a href="{{route('Video-Show' , $video->slug)}}" class="title">{{$video->title}} </a>
            <div class="d-flex justify-content-around">
               <div class="d-flex">
                  <livewire:like :video="$video"/>
                 <livewire:favorite :video="$video"/>
               </div>

                <div>
                    <span class="views"><i class="fa fa-eye"></i>{{$video->view}} </span>
                    <span class="date"><i class="fa fa-clock-o"></i>{{$video->custom_date}} </span>
                </div>
            </div>


        </div>

    </div>
</div>
