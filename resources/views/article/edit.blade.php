@extends('layout')

@section('header')
<style>
	body {
		padding: 53px 0;
	}
	.wrap{
		margin-top: 50px;
	}
	.inner-wrap{
		border: 1px solid grey;
	}
	.title-input{
		margin: 10px 0;
	}
	.toolbar-icon{
		color: #000;
	}
	.toolbar-icon:hover{
		color: green;
	}
	#editor {
		margin: 10px 0 10px;
		border-radius: 6px;
		height: 600px;
		border: 2px solid #bdc3c7;
		outline: none;
		box-sizing: border-box;
		padding: 10px;
	}
	a{
		padding: 10px;
	}
</style>
@endsection

@section('content')
	<div class="wrap">
		<div class="container inner-wrap">
			<div class="title">
				<input type="text" placeholder="标题" class="form-control title-input">
			</div>
			<div class="content">
				<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
					<div class="btn-group">
					<a href="javascript:void(0)" data-edit="bold" class="btn toolbar-icon"><i class="icon-bold"></i></a>
					</div>
					<div class="btn-group">
					<a href="javascript:void(0)" data-edit="italic" class="btn toolbar-icon"><i class="icon-italic"></i></a>
					</div>
					<div class="btn-group">
					<a href="javascript:void(0)" data-edit="underline" class="btn toolbar-icon"><i class="icon-underline"></i></a>
					</div>
					<div class="btn-group">
					<a href="javascript:void(0)" data-edit="indent" class="btn toolbar-icon"><i class="icon-indent-right"></i></a>
					</div>
					<div class="btn-group">
					<a href="javascript:void(0)" data-edit="outdent" class="btn toolbar-icon"><i class="icon-indent-left"></i></a>
					</div>
					<div class="btn-group">
					<a href="javascript:void(0)" class="btn dropdown-toggle toolbar-icon" data-toggle="dropdown" data-original-title="font size">
						<i class="icon-text-height"></i>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="javascript:void(0)" data-edit="fontSize 5">
								<font size="5">Huge</font>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" data-edit="fontSize 3">
								<font size="3">Normal</font>
							</a>
						</li>
						<li>
							<a href="javascript:void(0)" data-edit="fontSize 1">
								<font size="1">Small</font>
							</a>
						</li>
					</ul>
					</div>
				</div>
				<div id="editor"></div>
			</div>
			<button class="btn btn-primary btn-lg submit">提交</button>
			</form>
		</div>

	</div>

	
@endsection

@section('script')
<script src="/js/bootstrap-wysiwyg.js"></script>
<script>
	$('#editor').wysiwyg();
</script>
<script>
	$(function () {
		$('.submit').on('click', function () {
			$title = $('.title-input').val();
			$content = $('#editor').html();

			$.ajax({
				url: '/edit/save',
				data: {
					title: $title,
					content: $content
				},
				method: 'POST',
				success: function () {}
			});
		});
	});
</script>



@endsection