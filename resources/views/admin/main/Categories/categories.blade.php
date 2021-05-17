@extends('admin.layouts.adminMaster')
@section('content')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                @foreach($categories as $category)
                  <div class="col-12 col-md-3 col-lg-4">
                      <img src="{{asset('storage/'.$category->image)}}" alt="" style="width: 250px; height: 250px">
                      <a href="{{route('Admin-Category-Show' , $category->id)}}">
                          <strong>{{$category->title}}</strong>
                      </a>
                      <div>
                          <a href="{{route('Admin-Category-Edit' , $category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                          <form action="{{route('Admin-Category-Delete' , $category->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                          </form>
                      </div>
                  </div>

                @endforeach
            </div>
        </section>
    </section>
@endsection
