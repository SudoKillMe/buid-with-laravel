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
.navbar-brand {
    text-shadow: 2px 2px 2px #B3B8A6;
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


.archive,.statistics,.ranking{
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    margin: 20px 20px;
    background-color: #f3f3f3;
    border-radius: 5px;
}
.archive-title ,.statics-title,.ranking-title{
    font-size: 16px;
    padding:10px 0;
    margin: 0;
    text-align: center;
}
.archive-item ,.statics-item,.ranking-item{
    font-size: 16px;
    line-height: 40px;
    display: block;
    color: #444;
    box-sizing: border-box;
    padding: 0 30px;
    white-space: nowrap;
    border-top: 1px dashed #dfdfdf;
}
.archive-item:hover,.statics-item:hover ,.ranking-item:hover{
    cursor: pointer;
    background-color: #f5f5f5;
    color: #444;
}
.counter {
    color: #888;
    font-size: 14px;
    line-height: 18px;
    float: right;
    margin-top: 11px;
}
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
            <a href="#" class="navbar-brand">TIMERIVER</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-1">
            <ul class="nav navbar-nav">
                @foreach ($categories as $category) 
                <li @if ($category_id == $category->id) class="active" @endif>
                    <a href="/articles/category/{{ $category->id }}">{{ $category->name }}</a>
                </li>
                @endforeach
                <li @if ($category_id == 0) class="active" @endif>
                    <a href="/articles/category/0">全部</a>
                </li>
   <!--              <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">技术相关 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        @foreach ($categories as $category)
                        <li><a href="/articles/category/{{$category->id}}">{{ $category->name }}</a></li>
                        @endforeach
                        <li class="divider"></li>
                        <li><a href="#">全部</a></li>
                    </ul>
                </li> -->
                <!-- <li><a href="#">工具</a></li> -->
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
            <canvas id="chart" width="200" height="200"></canvas>
            
            <div class="archive">
                <p class="archive-title">博客归档</p>
                @foreach ($archives as $archive)
                <a  href="/articles/archives/{{ $archive->d }}" class="archive-item">{{ $archive->d }} <span class="counter">{{ $archive->c }}</span></a>
                @endforeach
            </div>
            
            <div class="ranking">
                <p class="ranking-title">排行榜</p>
                <a href="" class="ranking-item">sdfsdfsdfsdf <span class="counter">阅读 111</span></a>
                <a href="" class="ranking-item">sdfsdfsdfsdf <span class="counter">阅读 111</span></a>
                <a href="" class="ranking-item">sdfsdfsdfsdf <span class="counter">阅读 111</span></a>
                <a href="" class="ranking-item">sdfsdfsdfsdf <span class="counter">阅读 111</span></a>
            </div>

            <div class="statistics">
                <p class="statics-title">访问统计</p>
                <li class="statics-item">总访问量 <span class="counter">1111</span></li>
                <li class="statics-item">该月访问量 <span class="counter">333</span></li>
                <li class="statics-item">今日访问量 <span class="counter">100</span></li>
            </div>
        </div>
    </div>

</div>
<!-- 登录modal -->
<!-- <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-tip" aria-hidden="true">
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
</div> -->



@endsection

@section('script')
<script src="/js/Chart.min.js"></script>
<script src='/js/markdown.min.js'></script>
<script>
    $(function () {

        $tab = $('.tabs');
        $height = $('.bg-blue').innerHeight() - $tab.height();
        $(document).scroll(function () {
            if ( $(this).scrollTop() >= $height ) {
               $tab.addClass('navbar-fixed-top fixed-top-top');
            } else {
                $tab.removeClass('navbar-fixed-top fixed-top-top');
            }
        });

        $('.short-content').each(function () {
           var html = markdown.toHTML($(this).attr('data-value'));
           var pure_text = $(html).text();
          
           $(this).text(pure_text);
           $(this).show();
        }); 
    });

</script>
<script>
    var char_data = [];
    var labels = [];
    $(function () {

        $.ajax({
            url: '/api/archives',
            method: 'GET',
            dataType: 'json',
            success: function (res) {
                labels = Object.keys(res);
                for (var i=0; i<labels.length; i++) {
                    char_data.push(res[labels[i]]);
                }
                console.log(labels);
                console.log(char_data);
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                fillColor: 'rgba(220,220,220,.5)',
                                strokeColor: 'rgba(220,220,220,1)',
                                pointColor: 'rgba(220,220,220,1)',
                                pointStrokeColor: '#fff',
                                data: char_data
                            }
                        ]
                    },
                });
            },
            error: function (err) {
                console.log(err);
            }
        });

    })
    var ctx = document.getElementById('chart').getContext('2d');
    var data = {
        labels: labels,
        datasets: [
            {
                fillColor: 'rgba(220,220,220,.5)',
                strokeColor: 'rgba(220,220,220,1)',
                pointColor: 'rgba(220,220,220,1)',
                pointStrokeColor: '#fff',
                data: char_data
            }
        ]
    };

   
</script>
@endsection
