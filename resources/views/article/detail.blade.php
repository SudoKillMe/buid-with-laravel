@extends('layout')

@section('header')
<style>
	.bg-blue{
	    height: 300px;
	    background: rgb(30,87,153);
	    background: -moz-linear-gradient(45deg,  rgba(30,87,153,1) 0%, rgba(41,137,216,1) 50%, rgba(125,185,232,1) 100%);
	    background: -webkit-linear-gradient(45deg,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 50%,rgba(125,185,232,1) 100%);
	    background: linear-gradient(45deg,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 50%,rgba(125,185,232,1) 100%);
	    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=1 );
	    box-sizing: border-box;
	    padding: 53px;
	    position: relative;
	}
/*	.slogan-wrap{
		height:180px;
		line-height: 180px;

	}*/
	.slogan{
		height:194px;
		line-height: 194px;
		margin:0;
		color:#fff;
	}
	.catalog{
		height: 53px;
		line-height: 53px;
		font-size: 16px ;
		color: rgba(196, 227, 255, 0.6);
	}
	.current-cata{
		color: #fff;
	}
/*	.title{
		margin-bottom: 0;
	}*/
	.content-wrap{
		padding-bottom: 50px
	}
	.header,.content {
		font-size: 15px;
		color: #616366;
		word-break: break-all;
		word-wrap: break-word;
	}
	.header {
		padding-bottom: 15px;
		border-bottom: 1px solid #edf0f2;
	}
	.time,.view{
		margin-right: 20px;
	}
	.edit,.delete {
		margin-right: 20px;
		float: right;
		cursor: pointer;
	}
	.edit:hover,.delete:hover{
		color: rgb(52, 73, 94);
	}
</style>
@endsection
@section('content')
	<div class="bg-blue">
		<div class="slogan-wrap container">
			<h3 class="slogan">SOMEONE</h3>
		</div>
		<div class="catalog container">
			所属类别 &nbsp;&nbsp;&nbsp;&nbsp;<span class="icon-arrow-right"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="current-cata"> php</span>
		</div>
	</div>
	<div class="content-wrap container">
		<h3 class="title">{{ $article->title }}</h3>
		<p class="header">
			<span class="time"><span class="icon-time"></span>&nbsp;{{ $article->updated_at }}</span>
			<span class="view"><span class="icon-eye-open"></span>&nbsp;{{ $article->view_count }}人阅读</span>
			<span class="edit"><span class="icon-edit">&nbsp;编辑</span></span>
			<span class="delete"><span class="icon-trash">&nbsp;删除</span></span>
		</p>
		<p class="content"></p>

	</div>
	
	<input type="hidden" class="_content" value="{{ $article->content }}">
@endsection

@section('script')
<script src='/js/markdown.min.js'></script>
<script>
	var editUrl = '/articles/{{ $article->id }}/edit';
	var edit = document.querySelector('.edit');
	var content = document.querySelector('.content');
	var _content = document.querySelector('._content');

	edit.addEventListener('click', function () {
		location.href = editUrl;
	});

	content.innerHTML = markdown.toHTML(_content.value);


	
</script>
@endsection