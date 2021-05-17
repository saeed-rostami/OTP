@extends('admin.layouts.adminMaster')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">

                <div class="col-md-8 portlets">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="pull-left">Insert New Video</div>
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
                                    <form class="form-horizontal" action="{{route('Admin-Video-Store')}}"
                                          method="post" enctype="multipart/form-data">
                                    @csrf
                                    <!-- Title -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Title</label>
                                            <div class="col-lg-10">
                                                <input type="text" class="form-control" id="title" name="title">
                                            </div>
                                        </div>
                                        <!-- Content -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="content">Description</label>
                                            <div class="col-lg-10">
                                                <textarea class="form-control" id="content"
                                                          name="description"></textarea>
                                            </div>
                                        </div>
                                        <!-- Cateogry -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Category</label>
                                            <div class="col-lg-10">
                                                <label for="select2-categories"></label>
                                                    <select id="select2-categories" class="form-control select"
                                                            name="categories[]"
                                                            multiple="multiple">
                                                        @foreach($categories as $category)
                                                            <option
                                                                value="{{$category->id}}">{{$category->title}}</option>
                                                        @endforeach
                                                    </select>

                                            </div>
                                        </div>


                                        <!-- Tags -->
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="tags">Tags</label>
                                            <div class="col-lg-10">
                                                <label for="select2-tags">

                                                </label>
                                                <select id="select2-tags" class="form-control select"
                                                        name="tags[]"
                                                        multiple="multiple">
                                                    @foreach($tags as $tag)
                                                        <option
                                                            value="{{$tag->id}}">{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="title">Video</label>
                                            <div class="col-lg-10">
                                                <input name="file" type="file" class="form-control" id="file">
                                            </div>
                                        </div>

                                        {{--selected--}}
                                        <div class="form-group">
                                            <label class="control-label col-lg-2" for="tags">Selected Video</label>
                                            <div class="col-lg-10">
                                                <label for="selected"></label><input name="selected"
                                                                                     type="checkbox"
                                                                                     class="form-control"
                                                                                     id="selected">
                                            </div>
                                        </div>

                                        <!-- Buttons -->
                                        <div class="form-group">
                                            <!-- Buttons -->
                                            <div class="col-lg-offset-2 col-lg-9">
                                                <button type="submit" class="btn btn-primary">Publish</button>
                                                {{--<button type="submit" class="btn btn-danger">Save Draft</button>--}}
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
