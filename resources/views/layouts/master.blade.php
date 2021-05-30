<!doctype html>
<html>
@include('layouts.head')
<body>
@include('layouts.header')
@include('layouts.categoriesHeader')
@yield('content')
@include('layouts.footer')
@include('main.partials._sessionMessages')

</body>
</html>
