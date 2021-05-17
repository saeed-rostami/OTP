@extends('layouts.master')

@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-4">

            @include('main.partials._popularPosts')

            <!--  News tag widget -->
                <div class="widget tag-widget">
                    <h3 class="widget-title">Popular Posts</h3>

                    <div class="tag-details">
                        <a href="#">Shop</a>
                        <a href="#">Woman</a>
                        <a href="#">Clothing</a>
                        <a href="#">Travelling</a>
                        <a href="#">Electronics</a>
                        <a href="#">Kids</a>
                        <a href="#">Jewelry</a>
                        <a href="#">Food</a>
                        <a href="#">Furniture</a>
                        <a href="#">interior</a>
                        <a href="#">Design</a>
                        <a href="#">News</a>
                    </div>

                </div>
                <!--//  News tag widget -->

                <!--  Categories widget -->
            @include('main.partials._categoriesSidebar')
            <!-- //  Categories widget -->

            </div>
            <div class="col-md-8">
                <div id="single-page">
                    <div class="content">
                        <h1 class="title">{{$video->title}} </h1>
                        <div>
                            <video controls class="w-100 h-100">
                                <source src="{{asset('storage/' . $video->file)}}">
                            </video>
                        </div>
                        <div class="video-share">
                            <ul class="like">
                                <li><a>{{$video->view}} <i class="fa fa-eye"></i></a></li>

                                <livewire:like :video="$video"/>

                                <livewire:favorite :video="$video"/>

                            </ul>


                            <ul class="social_link">
                                <li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                </li>
                                <li><a class="youtube" href="#"><i class="fa fa-youtube-play"
                                                                   aria-hidden="true"></i></a>
                                </li>
                                <li><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                </li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                </li>
                                <li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </li>
                                <li><a class="rss" href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                            </ul><!-- // Social -->
                        </div><!-- // video-share -->
                        <!-- // Video Player -->

                        <p>
                            {{$video->description}}
                        </p>
                    </div><!-- // content  -->
                </div><!-- // single-page  -->

                @include('main.partials._commentBox')

            </div><!-- // col-md-8 //Blog -->
        </div>
    </section>
@endsection
