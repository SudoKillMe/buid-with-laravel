<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="/css/flatui/bootstrap.min.css">
        <link rel="stylesheet" href="/css/flatui/flat-ui.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <style>
            body{
                font:Microsoft YaHei,Tahoma,Helvetica,'SimSun',sans-serif;
                margin:0;padding:0 0 50px;
                position: relative;
                min-height:1000px;
            }
            .bg-transparent{
                /*background: rgba(0,0,0,.1);*/
                background: -moz-linear-gradient(45deg,  rgba(30,87,153,1) 0%, rgba(41,137,216,1) 50%, rgba(125,185,232,1) 100%);
                background: -webkit-linear-gradient(45deg,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 50%,rgba(125,185,232,1) 100%);
                background: linear-gradient(45deg,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 50%,rgba(125,185,232,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=1 );
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
            
            .footer{
                position: absolute;
                bottom:0;
                width: 100%;
                background: rgba(255,255,255,.1);
                color: #666;
                border-top: 1px solid #f2f2f2;
                line-height: 50px;
                font-size: 14px;
            }
            .copyright{
                text-align: center;
                margin:0;
                line-height: inherit;
                font-size: 13px;
                
            }
            .contact-git, .contact-weibo {
                cursor: pointer;
                color : #666;
            }
            .contact-git::after, .contact-weibo::before {
                content: '';
                display: inline-block;
                width:15px;
            }
            .contact{
                font-size: 13px;
                float:left;
                line-height: inherit;
               
            }
            .support{
                float: right;
                line-height: inherit;
                margin-right: 50px;
            }
        </style>
        @yield('header')
    </head>
    <body>
        <!-- 顶部导航栏 -->
        <nav class="navbar navbar-default navbar-fixed-top bg-transparent top" role="navigation">
            <div class="container">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="javascript:void(0)" class="white-font">欢迎来到我的个人小站</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if ($user = session('user'))
                    <li><a class="white-font">你好，<span>{{ $user->name }}</span></a></li>
                    <li><a href="/user/logout" class="white-font">退出登录</a></li>
                    @else
                    <li class="dropdown">
                        <a class="white-font">你好 , 游客</a>
                    </li>
                    @endif
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

        <div class="footer">
            <div class="container">
                <span class="support">本站基于laravel构建</span>
                <span class="contact"><a href="https://github.com/SudoKillMe" class="contact-git" target="_blank"><i class="icon-github"></i>&nbsp;我的GitHub </a> - <a href="http://weibo.com/langcundong" class="contact-weibo" target="_blank"><i class="icon-weibo"></i>&nbsp;我的微博 </a></span>
                <p class="copyright">copyright &copy;&nbsp; 2015-2016 techer </p>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="/js/flatui/jquery.min.js"></script>
    <script type="text/javascript" src="/js/flatui/flat-ui.min.js"></script>
    <script type="text/javascript" src="/js/flatui/respond.min.js"></script>
    <script src="/js/util.js"></script>
    <script>
        // $(function () {
        //     $topbar = $('.top');
        //     $height = $topbar.height();
        //     $(document).scroll(function () {
        //         if ( $(this).scrollTop() >= $height ) {
        //             $topbar.removeClass('bg-transparent');
        //         } else {
        //             $topbar.addClass('bg-transparent');
        //         }
                
        //     });
        // });
    </script>
    @yield('script')
</html>
