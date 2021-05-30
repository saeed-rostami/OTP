@extends('layouts.master')

@section('content')
    <section class="container">
        <h2 class="text-center">اطلاعات ویدئو درخواستی خود را وارد کنید</h2>
        <div class="mt-2">
            <form action="{{route('Video-Request-Store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4">
                        <label>Title</label>

                        <label>
                            <input name="title" type="text" class="form-control">
                        </label>
                    </div>

                    <div class="col-12 col-md-4">
                        <label>Description</label>
                        <label>
                            <textarea name="description" type="text" class="form-control"></textarea>
                        </label>
                    </div>

                    اگر لینک ویدئو مورد نظرتان را دارید میتوانید آن را برایمان ارسال کنید
                    <div class="col-12 col-md-4">
                        <label>Link</label>
                        <label>
                            <input name="link" type="text" class="form-control">
                        </label>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <button class="btn btn-success" type="submit">Send</button>
                </div>
            </form>
        </div>
        <hr>
        <section class="mt-2 text-center">
            <h1>لیست درخواست های شما</h1>

         <div class="alert-info">
             @foreach($requests as $request)
                 <p>{{$request->title}}</p>
                 <p>{{$request->created_at}}</p>
             @endforeach
         </div>
        </section>
    </section>

@endsection
