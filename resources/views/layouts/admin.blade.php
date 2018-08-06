<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset(BULK_SYSTEM_THEME.'/images/favicon.png') }}" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    @include('adminbsb.partials.css_links')
    @include('adminbsb.partials.pass_to_js')
    <body class="theme-red ls-closed">
        @include('adminbsb.partials.page_loader')
        @include('adminbsb.partials.search_bar')
        @include('adminbsb.partials.top_bar')
        @include('adminbsb.partials.left_sidebar')
        @yield('content')
        @include('adminbsb.partials.js_source')
    </body>
</html>
