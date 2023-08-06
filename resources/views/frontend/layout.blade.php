<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Title</title>
    @include('frontend.containers.head.icons')
    @include('frontend.containers.head.font')
    @include('frontend.containers.head.css')
</head>
<body class="">

<div id="wrapper">
    @include('frontend.containers.header.index')
    <div id="content">
        @yield('content')
    </div>
    @include('frontend.containers.footer.index')
</div>

</body>
</html>
