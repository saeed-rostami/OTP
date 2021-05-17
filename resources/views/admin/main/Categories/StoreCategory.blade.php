@extends('admin.layouts.adminMaster')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <div class="row">

                <div class="col-md-8 portlets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-left">Insert New Category</div>
                            <div class="widget-icons pull-right">
                                <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                                <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="padd">

                                <div class="form quick-post">
                                    <!-- Edit profile form (not working)-->
                                    <form action="{{route('Admin-Category-Store')}}" class="form-horizontal"
                                          method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Title -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Title</label>
                                            <div class="col-lg-10">
                                                <input name="title" type="text" class="form-control" id="title">
                                            </div>
                                        </div>


                                        <!-- Icon -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Icon</label>
                                            <div class="col-lg-10">
                                                <input name="icon" type="text" class="form-control" id="title">
                                            </div>
                                        </div>


                                        <!-- IMage -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Image</label>
                                            <div class="col-lg-10">
                                                <input name="image" type="file" class="form-control" id="title">
                                            </div>
                                        </div>


                                        <!-- Buttons -->
                                        <div class="form-group">
                                            <!-- Buttons -->
                                            <div class="col-lg-offset-2 col-lg-9">
                                                <button type="submit" class="btn btn-primary">Publish</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                            <div class="widget-foot">
                                <!-- Footer goes here -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </section>
@endsection
