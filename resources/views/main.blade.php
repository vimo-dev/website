<!doctype html>
<html lang="{{ app()->getLocale() }}">

@include('partials._head')


<body>
    @include('partials._nav')

    <div id="content">
        @yield('content')  
    </div>
</body>

@include('partials._javascript')

</html>
