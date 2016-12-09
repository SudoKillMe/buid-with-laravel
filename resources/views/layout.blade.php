<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="/css/flatui/bootstrap.min.css">
        <link rel="stylesheet" href="/css/flatui/flat-ui.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <style>
            .bg-transparent{
                background: rgba(0,0,0,.1);
            }
            .navbar-default .navbar-nav>li>.white-font, .white-font {
                color: rgba(196,227,255,0.8);
            }
            .navbar-default .navbar-nav>li>.white-font:hover,.white-font:hover{
                color: rgba(255,255,255,1);
            }
            .bg-white{
                background: #fff;
                border-bottom: 1px solid #eee;
            }

        </style>
        @yield('header')
    </head>
    <body>
        <!-- 顶部导航栏 -->
        <nav class="navbar navbar-default navbar-fixed-top bg-transparent" role="navigation">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="javascript:void(0)" class="white-font">欢迎来到我的个人小站</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="/" class="index white-font"><span class="icon-home"></span> 首页</a>
                    </li>
                </ul>
            <!--     @if (!empty($user))
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="white-font">你好，<span>{{ $user->name }}</span></a></li>
                    <li><a href="/logout" class="white-font">退出登录</a></li>
                </ul>
                @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="javascript:void(0)" class="white-font">你好，游客</a></li>
                    <li data-toggle="modal" data-target="#login-modal"><a href="#" class="white-font">登录</a></li>
                    <li data-toggle="modal" data-target="#register-modal"><a href="#" class="white-font">注册</a></li>
                </ul>
                @endif -->
            </div>
        </nav> 
        @yield('content')

        @yield('footer')
    </body>
    <script type="text/javascript" src="/js/flatui/jquery.min.js"></script>
    <script type="text/javascript" src="/js/flatui/flat-ui.min.js"></script>
    <script type="text/javascript" src="/js/flatui/respond.min.js"></script>
    <script src="/js/util.js"></script>
    @yield('script')
</html>
