@extends('layout')

@section('header')
<style media="screen">
body{
    padding-top:53px;
}
.show-pic{
    height: 400px;
    /*background: url(/img/laoshu.jpg) 0 / cover;*/
    margin-bottom: 0;
    background: rgba(0,0,0,0);
    position: relative;
}
.show-pic::before{
    content: '';
    position: absolute;
    top:0;bottom:0;right:0;left:0;
    background: url(/img/laoshu.jpg) 0 / cover;
    filter: blur(5px);
    margin:-10px;
    z-index: -1;
}
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

.content-wrap{
    height:1000px;
}
.left{
    box-sizing: border-box;
    padding: 20px;
    height: 1000px;
}
.right{
    height: 1000px;
}
.tip{
    margin-bottom: 5px;
}
.tip-item{
    margin-right: 15px;
}
</style>

@endsection

@section('content')
<!-- 顶部导航栏 -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <ul class="nav navbar-nav">
            <li>
                <img src="/img/totem.jpg" alt="" height="53">
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li data-toggle="modal" data-target="#login-modal"><a href="#">登录</a></li>
            <li><a href="#">注册</a></li>
        </ul>
    </div>
</nav>

<!-- 中间图片 -->
<div class="jumbotron show-pic">
</div>

<!-- 中部导航栏 -->
<nav class="navbar navbar-default tabs" role="navigation">
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
                <li><a href="#">写篇文章</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- 内容区 -->
<div class="container content">
    <div class="row content-wrap">
        <div class="left col-sm-8 col-xs-12">
            <div class="list-group">
                <a href="#" class="list-group-item">
                    <h6 class="list-group-item-heading">我是一个标题</h6>
                    <p class="tip">
                        <span class="tip-item palette-headline"><span class="fui-time"></span> 2016-11-28</span>
                        <span class="tip-item palette-headline"><span class="fui-eye"></span> 23人阅读</span>
                        <span class="tip-item palette-headline"><span class="fui-bubble"></span> 23人阅读</span>
                    </p>
                    <p class="list-group-item-text">我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容</p>
                </a>
                <a href="#" class="list-group-item">
                    <h6 class="list-group-item-heading">我是一个标题</h6>
                    <p class="tip">
                        <span class="tip-item palette-headline"><span class="fui-time"></span> 2016-11-28</span>
                        <span class="tip-item palette-headline"><span class="fui-eye"></span> 23人阅读</span>
                        <span class="tip-item palette-headline"><span class="fui-bubble"></span> 23人阅读</span>
                    </p>
                    <p class="list-group-item-text">我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容我是标题的内容</p>
                </a>
            </div>
        </div>
        <div class="right col-sm-4 col-xs-12">
            <!-- todolist -->
            <div class="todo">
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

            <form class="login-form ">
                <div class="control-group form-group">
                    <input type="text" class="login-field form-control" name="user-name" placeholder="Enter your name" id="login-name">
                    <label for="login-name"></label>
                </div>
                <div class="control-group form-group">
                    <input type="text" class="login-field form-control" name="user-name" placeholder="Enter your name" id="login-name">
                    <label for="login-name"></label>
                </div>
                <a href="#" class="btn btn-primary btn-large btn-block">登录</a>
            </form>

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
                            <form class="login-form ">
                                <div class="control-group form-group">
                                    <input type="text" class="login-field form-control input-hg" name="user-name" placeholder="Enter your name" id="login-name">
                                    <label for="login-name"></label>
                                </div>
                                <div class="control-group form-group">
                                    <input type="text" class="login-field form-control input-hg" name="user-name" placeholder="Enter your password" id="login-name">
                                    <label for="login-name"></label>
                                </div>
                                <a href="#" class="btn btn-primary btn-hg btn-block">登录</a>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection

@section('script')

@endsection
