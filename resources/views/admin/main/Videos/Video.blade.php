@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
                <div class="col-8 d-flex flex-column align-items-center shadow">
                    <strong>
                        {{$video->title}}
                    </strong>
                    <video controls class="w-100 h-100">
                        <source src="{{asset('storage/' . $video->file)}}">
                    </video>
                </div>
        </div>
    </div>
@endsection
