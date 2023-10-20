<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Title</title>
    @include('frontend.containers.head.meta')
    @include('frontend.containers.head.icons')
    @include('frontend.containers.head.font')
    @include('frontend.containers.head.css')
</head>
<body class="">

<div id="wrapper">
    @include('frontend.containers.header.index')
    <main id="content">
        @yield('content')
    </main>
    @include('frontend.containers.footer.index')
</div>
@include('frontend.containers.scripts.index')
</body>
</html>
