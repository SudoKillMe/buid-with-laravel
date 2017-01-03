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
    text-shadow: 0 1px 1px #fff;
    /*text-shadow: 0 1px hsl(0, 0%, 85%),
                 0 2px hsl(0, 0%, 80%),
                 0 3px hsl(0, 0%, 75%),
                 0 4px hsl(0, 0%, 70%),
                 0 5px hsl(0, 0%, 65%),
                 0 5px 10px black;*/
}
.fixed-top-top{
    top: 53px;
}

.content-wrap{
    margin-bottom: 100px;
}
.left, .right{
    box-sizing: border-box;
    padding: 20px;
}
.tip{
    margin-bottom: 5px;
/*    border-bottom: 1px dashed #ddd; */
}
.tip-item{
    margin-right: 15px;
    color: #777;
    font-size: 13px;
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
    overflow: hidden;
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

.list-title {
    padding: 0 15px;
    font-weight: bold;
/*    border-bottom: 1px solid #ddd;
    margin-bottom: 0;*/
}
.add {
    cursor: pointer;
    float: right;
    color: #666;
    font-size: 14px;
    line-height: inherit;
}
.collect-name,.collect-url,.collect-time{
    float: left;
    text-align: left;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    line-height: 30px;
    /*float: left;
    margin-right: 50px;*/
}
.collect-name {
    width: 20%;
}
.collect-url {
    width: 40%;
}
.collect-time {
    width: 20%;
    text-align: right;
    font-size: 14px;
}

.collect-delete {
    font-size: 14px;
    line-height: 30px;
    float: right;
    cursor: pointer;
}
.collect-desc {
    display: block;
    clear: both;
}

/*.collect-desc::before {
    content: '';
    display: block;
    clear: both;
    height:1px;
    visibility: hidden;
}*/
.categories,.archive,.statistics,.ranking{
    border-top: 1px solid #fff;
    border-bottom: 1px solid #fff;
    margin: 20px 20px;
    background-color: #f3f3f3;
    border-radius: 5px;
}
.category-title, .archive-title ,.statics-title,.ranking-title{
    font-size: 16px;
    padding:10px 0;
    margin: 0;
    text-align: center;
}
.category-item,.archive-item ,.statics-item,.ranking-item{
    font-size: 16px;
    line-height: 40px;
    display: block;
    color: #444;
    box-sizing: border-box;
    padding: 0 30px;
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

label {
    font-weight: bold;
    line-height: 2;
}
.form-group {
    margin-bottom: 10px;
}
.modal-body{
    padding: 15px 25px;
}
.text-center {
    text-align: center;
}
/*.fav-form {
    padding: 0 20px;
}*/
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
                <li @if ($active == 'articles') class="active" @endif>
                    <a href="/articles/category/0">博文</a>
                </li>
                <li @if ($active == 'favorites') class="active" @endif>
                    <a href="/favorites">收藏</a>
                </li>
                <li>
                    <a href="">音乐</a>
                </li>
                <li>
                    <a href="">工具</a>
                </li>
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
            <!-- 博客内容 -->
            @if (!empty($articles))
            <div class="list-group">
                @foreach ($articles as $article)
                <a href="/articles/{{ $article->id }}" class="list-group-item">
                    <h5 class="list-group-item-heading">{{ $article->title }}</h5>
                    <p class="tip">
                        <span class="tip-item"><span class="icon-time"></span> {{ $article->created_at }}</span>
                        <span class="tip-item"><span class="fui-eye"></span> {{ $article->view_count }}人阅读</span>
                        <span class="tip-item"><span class="icon-tag"></span> 所属类别：{{ $article->category->name }}</span>
                    </p>
                    <p class="list-group-item-text short-content" data-value="{{ $article->content }}" data-type="{{ $article->type }}">内容加载中...</p>
                </a>
                @endforeach
            </div>
            @endif
            <!-- 我的收藏 -->
            @if (isset($favorites))
            <div class="list-group">
                
                <p class="list-title">我收藏的链接 <span class="add" data-toggle="modal" data-target="#add-collect-modal"><i class="icon-plus"></i>&nbsp;添加</span></p>
                @if (!empty($favorites)) 
                @foreach ($favorites as $favorite)
                <div class="list-group-item">
                    <a href="{{$favorite->url}}" class="collect-name" target="_blank">{{ $favorite->name }}</a>
                    <span class="collect-url">{{ $favorite->url }}</span>
                    <span class="collect-time">{{ $favorite->created_at }}</span>
                    <span class="collect-delete" data-id="{{ $favorite->id }}">删除</span>
                    @if ($favorite->remark)
                    <code class="collect-desc">备注：{{ $favorite->remark }}</code>
                    @endif
                </div>
                @endforeach
                @endif
            

            </div>
            @endif
        </div>
        <div class="right col-sm-4 col-xs-12">
            <!-- todolist -->
            <canvas id="chart" width="200" height="200"></canvas>

            <div class="categories">
                <p class="category-title">分类归档</p>
                @foreach ($categories as $category)
                <a href="/articles/category/{{ $category->id }}" class="category-item">{{ $category->name }} <span class="counter">{{ count($category->articles) }}</span></a>
                @endforeach
            </div>

            <div class="archive">
                <p class="archive-title">日期归档</p>
                @foreach ($archives as $archive)
                <a  href="/articles/archives/{{ $archive->d }}" class="archive-item">{{ $archive->d }} <span class="counter">{{ $archive->c }}</span></a>
                @endforeach
            </div>

            <div class="ranking">
                <p class="ranking-title">排行榜</p>
                @foreach ($ranking as $article)
                <a href="/articles/{{ $article->id }}" class="ranking-item">
                    {{ $article->title }} <span class="counter">阅读 {{ $article->view_count }}</span>
                </a>
                @endforeach
            </div>

            <div class="statistics">
                <p class="statics-title">访问统计</p>
                <li class="statics-item">总访问量 <span class="counter">{{ $statistics[0]->c }}</span></li>
                <li class="statics-item">该月访问量 <span class="counter">{{ $statistics[1]->c }}</span></li>
                <li class="statics-item">今日访问量 <span class="counter">{{ $statistics[2]->c }}</span></li>
            </div>
        </div>
    </div>

</div>


<div class="modal fade" id="add-collect-modal" tabindex="-1" role="dialog" aria-labelledby="collect-tip" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" name="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title text-center" id="collect-tip">添加收藏</h4>
            </div>
            <form action="/favorites" method="post" role="form" class="fav-form">
                <div class="modal-body">        
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="fav-name">名称</label>
                        <input type="text" class="form-control" id="fav-name" name="fav-name" placeholder="输入名称">
                    </div>
                    <div class="form-group">
                        <label for="fav-url">链接地址</label>
                        <input type="text" class="form-control" id="fav-url" name="fav-url" placeholder="输链接地址">
                    </div>
                    <div class="form-group">
                        <label for="fav-remark">备注</label>
                        <input type="text" class="form-control" id="fav-remark" name="fav-remark" placeholder="添加备注">
                    </div>
                </div>
                <div class="modal-footer text-center">  
                    <button type="button" class="btn btn-default btn-lg" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-primary btn-lg">确认</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="/js/Chart.min.js"></script>
<script src='/js/markdown.min.js'></script>
<script>
    var delete_url = '/favorites/delete/';
    $(function () {
        $('.collect-delete').on('click', function () {
            location.href = delete_url + $(this).attr('data-id');
        });
    });
</script>
<script>
    $(function () {

        $tab = $('.tabs');
        $top_height = $('.top').innerHeight();
        $critical_point = $('.bg-blue').innerHeight() - $top_height;   //临界点

        $(document).scroll(function () {
            if ($(this).scrollTop() >= $critical_point) {
                $tab.addClass('navbar-fixed-top');
                $tab.css('top', $top_height + 'px');
            } else {
                $tab.removeClass('navbar-fixed-top');
                $tab.css('top', 0);
            }
        });

        $(window).resize(function () {
            $top_height = $('.top').innerHeight();
            $critical_point = $('.bg-blue').innerHeight() - $top_height;
        });


        $('.short-content').each(function () {
            var type = $(this).attr('data-type');
            var value = $(this).attr('data-value');
            var html = type == 1
                    ? value
                    : markdown.toHTML(value);
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
                                label: '写作频率',
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
    // var data = {
    //     labels: labels,
    //     datasets: [
    //         {
    //             fillColor: 'rgba(220,220,220,.5)',
    //             strokeColor: 'rgba(220,220,220,1)',
    //             pointColor: 'rgba(220,220,220,1)',
    //             pointStrokeColor: '#fff',
    //             data: char_data
    //         }
    //     ]
    // };


</script>
@endsection
