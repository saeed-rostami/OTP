@extends('admin.layouts.adminMaster')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <table class="table table-hover table-striped table-dark">
                <thead>
                <tr class="text-warning">
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col"> Description</th>
                    <th scope="col"> User</th>
                    <th scope="col"> Date</th>
                    <th scope="col"> Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)

                    <tr>
                        <th scope="row">{{$request->id}}</th>
                        <th scope="row"> {{$request->title}}</th>
                        <td><a role="button" href="#open-modal" data-id="{{$request->id}}" class="showDescription btn
                        btn-success">Show</a></td>

                        <td>{{$request->user->full_name}}</td>
                        <td>{{$request->created_at}}</td>


                        <td>
                            <form action="{{route('Admin-Request-Delete' , $request->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn
                             btn-outline-danger">Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    <div id="open-modal" class="modal-window">
                        <div>
                            <a href="#" title="Close" class="modal-close">Close</a>
                            <div>
                                <strong id="modal-desc"></strong>
                            </div>
                        </div>
                    </div>

                @endforeach

                </tbody>
            </table>


        </section>
    </section>



@endsection

@push('custom.css')
    <link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">
@endpush
