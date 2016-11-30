<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="/css/flatui/bootstrap.min.css">
        <link rel="stylesheet" href="/css/flatui/flat-ui.min.css">
        @yield('header')
    </head>
    <body>
        @yield('content')

        @yield('footer')
    </body>
    <script type="text/javascript" src="/js/flatui/jquery.min.js"></script>
    <script type="text/javascript" src="/js/flatui/flat-ui.min.js"></script>
    <script type="text/javascript" src="/js/flatui/respond.min.js"></script>
    @yield('script')
</html>
