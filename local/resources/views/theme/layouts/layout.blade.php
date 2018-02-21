<!DOCTYPE html>
{{--
Template Name: Laravel Project
Version: 2.11.97
Author: TSH97
Website: https://www.facebook.com/transachhai97
Contact: transachhai97@gmail.com
 --}}
<html lang="en">
{{-- BEGIN HEAD --}}
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

    @include('theme.sub.style')

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
</head>
{{-- END HEAD --}}
<body class="page-header-fixed page-sidebar-fixed page-sidebar-closed-hide-logo page-content-white page-md">
    <div class="page-wrapper">
        {{-- BEGIN HEADER --}}
        @include('theme.main.header')
        {{-- BEGIN HEADER --}}
        {{-- BEGIN HEADER & CONTENT DIVIDER --}}
        <div class="clearfix"> </div>
        {{-- END HEADER & CONTENT DIVIDER --}}
        {{-- BEGIN CONTAINER --}}
        <div class="page-container">
            @include('theme.layouts.sidebar')
            {{-- BEGIN CONTENT --}}
            <div class="page-content-wrapper">
                {{-- BEGIN CONTENT BODY --}}
                <div class="page-content">
                    {{-- BEGIN PAGE HEADER --}}
                    {{-- @include('theme.quick.quick_theme') --}}
                    {{-- BEGIN PAGE BAR --}}
                    {{-- @yield('page-bar') --}}
                    {{-- END PAGE BAR --}}
                    {{-- BEGIN PAGE TITLE --}}
                    {{-- <h1 class="page-title">@yield('title')</h1> --}}
                    {{-- END PAGE TITLE --}}
                    {{-- END PAGE HEADER --}}
                    {{-- BEGIN DASHBOARD --}}

                    @yield('content')

                    {{-- END DASHBOARD --}}
                </div>
                {{-- END CONTENT BODY --}}
            </div>
            {{-- END CONTENT --}}
            {{-- BEGIN QUICK SIDEBAR --}}
            {{-- @include('theme.quick.quick_sidebar') --}}
            {{-- END QUICK SIDEBAR --}}
        </div>
        {{-- END CONTAINER --}}
        {{-- BEGIN FOOTER --}}
        @include('theme.main.footer')
        {{-- END FOOTER --}}
    </div>
    {{-- BEGIN QUICK NAV --}}
    {{-- @include('theme.quick.quick_nav') --}}
    {{-- END QUICK NAV --}}

    @include('theme.sub.script')

</body>

</html>