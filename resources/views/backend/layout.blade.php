<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Dashboard</title>
    @include('backend.containers.head.icons')
    @include('backend.containers.head.font')
    @include('backend.containers.head.css')
    @include('backend.containers.head.js')
</head>
<body class="">
<!-- Preloader -->
<div class="preloader">
    <img class="logo" src="../../assets/media/image/logo/logo.png" alt="logo">
    <img class="dark-logo" src="../../assets/media/image/logo/dark-logo.png" alt="logo dark">
    <div class="preloader-icon"></div>
</div>
<!-- ./ Preloader -->
@include('backend.containers.sidebar.left')

<!-- Layout wrapper -->
<div class="layout-wrapper">
    @include('backend.containers.header.index')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        @include('backend.containers.sidebar.navigation')
        <div class="content-body">
            <div class="content">
                @include('backend.containers.header.page')
                @yield('content')
            </div>
        </div>
    </div>
</div>

@include('backend.containers.footer.index')
@include('backend.containers.scripts.index')


</body>
</html>
