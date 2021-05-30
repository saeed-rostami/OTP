@livewireStyles
<head>
    {{--<script type="text/javascript"--}}
    {{--src="https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js">--}}
    {{--</script>--}}


    {{--<script--}}
    {{--src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
    {{--integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="--}}
    {{--crossorigin="anonymous"></script>--}}

    {{--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}


    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name')}} - @yield('title') </title>

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>

    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css" />



    <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('js/custom.js')}}"></script>
    <script src="{{asset('js/validation.js')}}"></script>
    <script src="{{asset('js/jquery.sticky-kit.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('js/grid-blog.min.js')}}"></script>
    <script src="{{asset('js/notiflix-aio-2.4.0.min.js')}}"></script>
    <script src="{{asset('js/sessionMessages.js')}}"></script>
    <script src="https://cdn.plyr.io/3.6.8/plyr.js"></script>

    {{--<script src="{{asset('admin/js/select2.full.min.js')}}"></script>--}}
    {{--<script src="{{asset('admin/js/select2.js')}}"></script>--}}


</head>
@livewireScripts

