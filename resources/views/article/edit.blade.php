@extends('layout')
@section('header')
<style>
	body{
		padding: 70px 0;
	}
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

	#hack-title{
		margin: 20px 0;
	}
	.title-text{
		font-size: 18px;
		font-weight: bold;
	}
	.left,.right{
		width: 50%;
		height: 900px;
	}
	.left{
		float: left;
		position: relative;
		padding-bottom: 50px;
	}

	.right{
		border: 2px solid #bdc3c7;
		border-radius: 6px;
		float: right;
		box-sizing: border-box;
		padding: 20px;
		background: #fdfaf3;
		overflow-y: scroll;
	}
	.content-wrap {
		overflow: hidden;
	}
	.form-footer {
		margin-top: 20px;
	}
	.submit {
		float: right;
	}
</style>
@endsection
@section('content')

	<div class="container wrap">
	@if (isset($article))
	<form action="/articles/{{$article->id}}/" method="post" class="form-horizontal" role="form">
		<div class="form-group" id="hack-title">
			<label for="title-input" class="title-text">标题</label>
			<input type="text" class="form-control title-input" placeholder="输入您的标题" name="title" value="{{$article->title}}" id="title-input">
		</div>

		<p class="title-text">内容区</p> 
		<div class="content-wrap">
			<div class="left">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<textarea rows="40" class="form-control content" style="resize:none" placeholder="在这里书写markdown,在右方预览" name="content" id="content-input">{{$article->content}}</textarea>
			</div>
			<div class="right preview"></div>
		</div>

		<div class="form-footer">
			<label for="category">选择文章类别</label>
			<select name="category" id="category" class="form-control-static">
				@foreach ($categories as $category)
				<option value="{{$category->id}}" @if ($category->id == $article->category_id) selected @endif>{{ $category->name }}</option>
				@endforeach
			</select>
			<button class="btn btn-primary submit">提交</button>
		</div>
	</form>
	@else 
	<form action="/articles" method="post" class="form-horizontal" role="form">
		<div class="form-group" id="hack-title">
			<label for="title-input" class="title-text">标题</label>
			<input type="text" class="form-control title-input" placeholder="输入您的标题" name="title" id="title-input">
		</div>

		<p class="title-text">内容区</p> 
		<div class="content-wrap">
			<div class="left">	
				{{ csrf_field() }}
				<textarea rows="40" class="form-control content" style="resize:none" placeholder="在这里书写markdown,在右方预览" name="content" tabindex="-1"></textarea>
				<button class="btn btn-primary submit">提交</button>
			</div>
			<div class="right preview"></div>
		</div>

		<div class="form-footer">
			<label for="category">选择文章类别</label>
			<select name="category" id="category" class="form-control-static">
				@foreach ($categories as $category)
				<option value="{{$category->id}}">{{ $category->name }}</option>
				@endforeach
			</select>
			<button class="btn btn-primary submit">提交</button>
		</div>

	</form>
	@endif
	</div>
@endsection

@section('script')
<script src='/js/markdown.min.js'></script>
<script>
	var textarea = document.querySelector('.content');
	var preview = document.querySelector('.preview');

	if (textarea.value) {
		preview.innerHTML = markdown.toHTML(textarea.value);
	}

	textarea.addEventListener('input', function () {
		preview.innerHTML = markdown.toHTML(this.value);
		preview.scrollTop = preview.scrollHeight;
	});

</script>

@endsection