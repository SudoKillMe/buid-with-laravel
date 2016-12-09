@extends('layout')
<style>
	body{
		padding: 70px 0;
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
	}
	.submit {
		position: fixed;
		bottom: 30px;
		margin-top: -50px;
		margin-left: 10px;
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
/*	.content{
		height: 600px;
	}*/
</style>
@section('content')
	<div class="container">
	@if (isset($article))
	<form action="/articles/{{$article->id}}/" method="post" class="form-horizontal" role="form">
		<div class="form-group" id="hack-title">
			<label for="title-input" class="title-text">标题</label>
			<input type="text" class="form-control title-input" placeholder="输入您的标题" name="title" value="{{$article->title}}" id="title-input">
		</div>

		<p class="title-text">内容区</p> 
		<div class="left">
			
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<textarea rows="40" class="form-control content" style="resize:none" placeholder="在这里书写markdown,在右方预览" name="content" id="content-input">{{$article->content}}</textarea>
			<button class="btn btn-primary submit">提交</button>
			
		</div>
		<div class="right preview"></div>
	</form>
	@else 
	<form action="/articles" method="post" class="form-horizontal" role="form">
		<div class="form-group" id="hack-title">
			<label for="title-input" class="title-text">标题</label>
			<input type="text" class="form-control title-input" placeholder="输入您的标题" name="title" id="title-input">
		</div>

		<p class="title-text">内容区</p> 
		<div class="left">
			
			{{ csrf_field() }}
			<textarea rows="40" class="form-control content" style="resize:none" placeholder="在这里书写markdown,在右方预览" name="content"></textarea>
			<button class="btn btn-primary submit">提交</button>
			
		</div>
		
		<div class="right preview"></div>
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
	});

</script>
<script>
	
</script>
@endsection