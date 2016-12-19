@extends('layout')
@section('header')
<link rel="stylesheet" href="/css/wangEditor.min.css">
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
		line-height: 41px;
		overflow: hidden;
	}
	.switch {
		float: right;
	}
	.content-left,.content-right{
		width: 50%;
		height: 900px;
	}
	.content-left{
		float: left;
		position: relative;
		padding-bottom: 50px;
	}

	.content-right{
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
	<form method="post" class="form-horizontal" role="form"
	@if (isset($article)) 
	action="/articles/1/{{$article->id}}/" 
	@else 
	action="/articles/1"
	@endif>
		@if (isset($article))
		{{ method_field('PUT') }}
		@endif
		{{ csrf_field() }}
		<input type="hidden" name="type" value='1'>

		<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}" id="hack-title">
			<label for="title-input" class="title-text">标题</label>
			<input 
			type="text" class="form-control title-input" 
			@if ($errors->has('title'))
			placeholder="{{ $errors->first('title') }}"
			@else
			placeholder="请输入标题"
			@endif
			name="title" 
			id="title-input"
			@if (isset($article)) value="{{$article->title}}" @endif>
		</div>

		<p class="title-text">内容区 
		@if (!isset($article)) 
		<a href="/articles/create/2" class="switch btn btn-primary">切换为markdown模式</a>
		@endif
		</p>

		<textarea name="content" id="test" rows="40" class="form-control">
		@if (isset($article)) {{ $article->content }} @endif
		</textarea>

		<div class="form-footer">
			<label for="category">选择文章类别</label>
			<select name="category" id="category" class="form-control-static">
				@foreach ($categories as $category)
				<option value="{{$category->id}}" @if (isset($article) && $category->id == $article->category_id) selected @endif>{{ $category->name }}</option>
				@endforeach
			</select>
			<button class="btn btn-primary submit">提交</button>
		</div>
	</form>

</div>
@endsection
@section('script')
<script src="/js/wangEditor.min.js"></script>
<script>
	var editor = new wangEditor('test');

	editor.create();
</script>
@endsection
