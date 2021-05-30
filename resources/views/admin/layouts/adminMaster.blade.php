<!doctype html>
<html>

@include('admin.partials.head')
@include('main.partials._sessionMessages')

<body>

@include('admin.partials.header')
@include('admin.partials.aside')
@yield('content')

</body>
</html>
