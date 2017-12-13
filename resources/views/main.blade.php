<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('partials._head')


<body>
    @include('partials._nav')

    @yield('content')  
</body>

@include('partials._javascript')

</html>
