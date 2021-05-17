@extends('admin.layouts.adminMaster')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="container">
                <h3 class="text-center">آرشیو ویدئو ها</h3>
                @if($videos->isEmpty())
                    <h2 class="text-center"> یافت نشد</h2>
                @endif
                <div class="row">
                    @foreach($videos as $video)
                        <div class="col-md-3 shadow">
                            <p><a href="{{route('Admin-Video-Show' , $video->id)}}">
                                    {{$video->title}}
                                </a></p>
                            <video controls class="w-100 h-100">
                                <source src="{{asset('storage/' . $video->file)}}">
                            </video>
                            <div class="d-flex justify-content-around">
                                <a href="{{route('Admin-Video-Edit', $video->id)}}" type="button"
                                   class="btn btn-sm btn-info">به
                                    روزرسانی</a>

                                <form action="{{route('Admin-Video-Delete' , $video->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-sm btn-danger">حذف</button>
                                </form>


                                <form action="{{route('Admin-Video-Select' , $video->id)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-{{$video->is_selected ? 'success disabled' : 'warning'}}">
                                        @if($video->is_selected)
                                            ویدئو منتخب

                                        @else
                                            تنظیم
                                        @endif

                                    </button>
                                </form>


                                <span class="text-muted"> {{$video->created_at}}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </section>
@endsection
