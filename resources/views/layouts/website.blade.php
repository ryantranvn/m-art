<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="description" content="Tân Nhật Quang Electric">
    <meta name="keywords" content="tân nhật quang">
    <meta name="author" content="Ryan">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link rel="shortcut icon" href="{{ asset('website/images/favicon.ico') }}" />
    @include('website.partials.css_links')
    <script src="{{ asset('website/plugins/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('website/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <![endif]-->
    @include('website.partials.pass_to_js')
</head>
<body>
    @include('website.partials.wrap_top')
    @include('website.partials.wrap_search')
    @if (empty($removeNavigation))
        @include('website.partials.wrap_navigation')
    @endif
    @if (empty($removeBanner))
        @include('website.partials.wrap_banner')
    @endif
    @if (empty($removeHotline))
        @include('website.partials.wrap_hotline')
    @endif

    @yield('content')

    <div id="gotoTop"></div>
    @include('website.partials.wrap_footer')
    @include('website.partials.page_loader')
    @include('website.partials.js_source')
</body>
</html>