<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{str_replace('-', ' | ', config('app.name'))}}</title>
    <link rel="icon" href="{{url("image/logo/chl_logo.png")}}">
    <x-back-end._header-link/>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body class="sb-nav-fixed">
@include("layouts.back-end._header")
{{--<div id="layoutSidenav" class="bg-image-dashboard" style="background-image: linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(117, 19, 93, 0.73)), url({{url("image/bg/chl-2.jpg")}});">--}}
<div id="layoutSidenav" class="bg-image-dashboard">
    <div id="layoutSidenav_nav">
        @include("layouts.back-end._left-sidebar")
    </div>
    <div id="layoutSidenav_content">
        <main>
            <x-auth._session_response/>
            @yield('mainContent')
            <div id='ajax_loader' style="position: fixed; left: 50%; top: 40%;z-index: 1000; display: none">
                <img width="50%" src="{{url('image/ajax loding/ajax-loading-gif-transparent-background-2.gif')}}"/>
            </div>
        </main>
        @include("layouts.back-end._footer")
    </div>
</div>
<x-back-end._footer-script/>
</body>
</html>
