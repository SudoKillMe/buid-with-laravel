@extends('layout')

@section('header')
<style media="screen">
/*body{
    padding-top:53px;
}*/
.bg-blue{
    height: 400px;
    background: rgb(30,87,153);
    background: -moz-linear-gradient(45deg,  rgba(30,87,153,1) 0%, rgba(41,137,216,1) 50%, rgba(125,185,232,1) 100%);
    background: -webkit-linear-gradient(45deg,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 50%,rgba(125,185,232,1) 100%);
    background: linear-gradient(45deg,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 50%,rgba(125,185,232,1) 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=1 );
    box-sizing: border-box;
    padding: 53px;
    text-align: center;
    position: relative;
}
.vigilant{
    position: absolute;
    top:50%;left:50%;
    transform: translate(-50%, -50%);
}
.vigilant-content{
    color: #fff;
}

/*.bg-blue p,.bg-blue h5{
    margin:0;
    padding:0;
}*/

.text-warp{
    height:400px;
    position: relative;
}
.gussci-text{
    padding: 20px;
    color: #ecf0f1;
    position: absolute;
    bottom: 0;right: 0;
}

.tabs{
    margin-bottom: 0
}
.fixed-top-top{
    top: 53px;
}
.content-wrap{
    height:1000px;
}
.left, .right{
    box-sizing: border-box;
    padding: 20px;
    height: 1000px;
}
.tip{
    margin-bottom: 5px;
/*    border-bottom: 1px dashed #ddd; */
}
.tip-item{
    margin-right: 15px;
}

.input-icon{
    position: absolute;
    right:20px;
    top:50%;
    transform: translateY(-50%);
}

.login-form .larger-margin-bottom{
    margin-bottom: 16px
}

.error-info {
    background: #1abc9c;
    display: inline-block;
    padding: 10px;
    color: #fff;
    text-align: center;
    border-radius: 4px;
    position: fixed;
    top:10px;
    left:50%;
    transform:translateX(-50%);
    z-index: 1031;
}
/*hack*/
@media (min-width: 768px) {
    .modal-dialog{
        width: 500px;
        margin: 40px auto;
    }
}

.list-group-item {
    margin-bottom: 10px;
    border: none;
    border-bottom: 1px dashed #ddd;
}
.list-group-item-text{
    font-size: 13px;
    line-height: 1.9;
    word-break: break-all;
    word-wrap: break-word;
    max-height: 100px;
    overflow: hidden;
    text-overflow: ellipse;
    display: none;
}

/*hack*/
</style>

@endsection

@section('content')

<div class="bg-blue">
    <div class="vigilant">
        <h5 class="vigilant-content">Talk is cheap, show me the CODE</h5>
        <p class="author white-font">-- Linus Torvalds</p>
    </div>
</div>
<!-- 中间图片 -->
<!-- <div class="jumbotron show-pic">
</div> -->

<!-- 中部导航栏 -->
<nav class="navbar navbar-default tabs bg-white" role="navigation">
    <div class="container-fluid container">
        <!-- 右侧临界点的转换按钮 -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
                <span class="sr-only">Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">SOMEONE</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">日记</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">技术相关 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">PHP</a></li>
                        <li><a href="#">Laravel</a></li>
                        <li><a href="#">Javascript</a></li>
                        <li><a href="#">CSS</a></li>
                        <li class="divider"></li>
                        <li><a href="#">全部</a></li>
                    </ul>
                </li>
                <li><a href="#">工具</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="/articles/create">写篇文章</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- 内容区 -->
<div class="container content">
    <div class="row content-wrap">
        <div class="left col-sm-8 col-xs-12">
            <div class="list-group">
                @if (!empty($articles))
                @foreach ($articles as $article)
                <a href="/articles/{{ $article->id }}" class="list-group-item">
                    <h5 class="list-group-item-heading">{{ $article->title }}</h5>
                    <p class="tip">
                        <span class="tip-item palette-headline"><span class="fui-time"></span> {{ $article->updated_at }}</span>
                        <span class="tip-item palette-headline"><span class="fui-eye"></span> {{ $article->view_count }}人阅读</span>
                        <span class="tip-item palette-headline"><span class="fui-bubble"></span> {{ $article->view_count }}人评论</span>
                    </p>
                    <p class="list-group-item-text short-content" data-value="{{ $article->content }}">内容加载中...</p>
                </a>
                @endforeach
                @endif
            </div>
        </div>
        <div class="right col-sm-4 col-xs-12">
            <!-- todolist -->
            <div class="todo">
                <div class="todo-search">
                    <h6>我的任务</h6>
                </div>
                <ul>
                    <li class="todo-done">
                        <div class="todo-icon">
                        </div>
                        <div class="todo-content">
                            <h4 class="todo-name">
                                些一片博客
                            </h4>
                            11-30号之前完成
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- 登录modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-tip" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" name="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center" id="login-tip">登录</h4>
            </div>
            <div class="modal-body">
                <form class="login-form" action="/login" method="post">
                    {{ csrf_field() }}
                    <div class="control-group larger-margin-bottom">
                        <input type="text" class="login-field form-control input-hg" name="name" placeholder="Enter your name" id="login-name">
                        <span class="icon-user input-icon"></span>
                    </div>
                    <div class="control-group larger-margin-bottom">
                        <input type="password" class="login-field form-control input-hg" name="password" placeholder="Enter your password" id="login-name">
                        <span class="icon-lock input-icon"></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-hg btn-block">登录</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- 登录modal -->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="register-tip" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" name="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center" id="register-tip">注册</h4>
            </div>
            <div class="modal-body">
                <form class="login-form" action="/register" method="post">
                    {{ csrf_field() }}
                    <div class="control-group larger-margin-bottom">
                        <input type="text" class="login-field form-control input-hg" name="name" placeholder="Enter your name" id="register-name">
                        <span class="icon-user input-icon"></span>
                    </div>
                    <div class="control-group larger-margin-bottom">
                        <input type="password" class="login-field form-control input-hg" name="password" placeholder="Enter your password" id="register-password">
                        <span class="icon-lock input-icon"></span>
                    </div>
                    <div class="control-group larger-margin-bottom">
                        <input type="password" class="login-field form-control input-hg" name="c-password" placeholder="Confirm your password" id="confirm-password">
                        <span class="icon-lock input-icon"></span>
                    </div>
                    <button type="submit" class="btn btn-primary btn-hg btn-block">注册</button>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
<script src='/js/markdown.min.js'></script>
<script>
    $(function () {

        $tab = $('.tabs');
        $height = $('.bg-blue').innerHeight() - $tab.height();
        $(document).scroll(function () {
            console.log($height);
            console.log( $(this).scrollTop());
            if ( $(this).scrollTop() >= $height ) {
               $tab.addClass('navbar-fixed-top fixed-top-top');
            } else {
                $tab.removeClass('navbar-fixed-top fixed-top-top');
            }
        });

        $('.short-content').each(function () {
           var html = markdown.toHTML($(this).attr('data-value'));
           var pure_text = $(html).text();
           //console.log(pure_text);
           $(this).text(pure_text);
           // $(this).html(html);
           $(this).show();
        }); 
    });

</script>
@endsection
