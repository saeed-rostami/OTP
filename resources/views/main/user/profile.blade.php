@extends('layouts.master')

@section('content')
    <section class="container">
        <div class="mt-2">
            <form action="{{route('User-Update-Profile' , $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-md-6">
                        <label>Name</label>

                        <input name="name" type="text" class="form-control" placeholder="{{$user->name ? $user->name :
                     'First Name'}}" value="{{$user->name}}">
                    </div>
                    <div class="col-12 col-md-6">
                        <label>Family</label>
                        <input name="family" type="text" class="form-control" placeholder="{{$user->family ?
                     $user->family :
                     'Last Name'}}" value="{{$user->family}}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-6">
                        <label>Mobile</label>
                        <input type="text" class="form-control" placeholder="{{$user->mobile}}" disabled="disabled"
                               inputmode="numeric"
                               pattern="[0-9]*" name="mobile">
                    </div>
                    <div class="col-12 col-md-6">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="{{$user->email ? $user->email :
                     'Email'}}" value="{{$user->email}}">
                    </div>
                </div>


                <div class="row">
                    <div class="col-12 col-md-6">
                        <label>Avatar</label>
                        <input id="featured_image" type="file" name="avatar" class="file" value="{{$user->avatar}}">
                        <img src="{{asset('storage/'.$user->avatar)}}" alt="" width="200" height="150"
                             class="mt-4 img-fluid img-thumbnail">

                    </div>
                    <div class="col-12 col-md-6">
                        <button class="btn btn-success" type="submit">Confirm</button>
                    </div>
                </div>
            </form>
            @if($user->avatar)
            <form action="{{route('Delete-Avatar' , $user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger" type="submit">Delete Avatar</button>
            </form>
                @endif
        </div>
    </section>
@endsection
