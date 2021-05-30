@extends('admin.layouts.adminMaster')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="">

        @foreach($comments as $comment)
            <div class="d-flex justify-content-around my-1">
                <h class="text-dark text-bold">{{$comment->body}}</p>
                <p>{{$comment->created_at}}</p>

                <form action="{{route('Admin-Comment-Update', $comment->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="commentId" value="{{$comment->id}}">
                    <button class="btn-sm btn-success" type="submit"> تایید</button>
                </form>

                <form action="{{route('Admin-Comment-Delete' , $comment->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="commentId" value="{{$comment->id}}">
                    <button class="btn-sm btn-danger">پاک کردن</button>

                </form>
            </div>
        @endforeach
    </div>
    </section>
</section>
@endsection
