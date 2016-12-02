@extends('layout')

@section('header')
<style>
	#editor {
		display: inline-block;
		width: 500px;
		height: 400px;
		border: 1px solid grey;
	}
	a{
		padding: 10px;
	}
</style>
@endsection

@section('content')
	
		<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
			<a href="javascript:void(0)" data-edit="bold"><i class="icon-bold"></i></a>
			<a href="javascript:void(0)" data-edit="italic"><i class="icon-italic"></i></a>
			<a href="javascript:void(0)" data-edit="underline"><i class="icon-underline"></i></a>
			<a href="javascript:void(0)" data-edit="indent"><i class="icon-indent-right"></i></a>
			<a href="javascript:void(0)" data-edit="outdent"><i class="icon-indent-left"></i></a>
			<div class="btn-group">
			<a href="javascript:void(0)" class="btn dropdown-toggle" data-toggle="dropdown" data-original-title="font size">
				<i class="icon-text-height"></i>
				<b class="caret"></b>
			</a>
			<ul class="dropdown-menu">
				<li>
					<a href="javascript:void(0)" data-edit="fontSize 5">
						<h1>Huge</h1>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)" data-edit="fontSize 3">
						<h3>Huge</h3>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)" data-edit="fontSize 1">
						<h5>Huge</h5>
					</a>
				</li>
			</ul>
			</div>
		</div>
		<div id="editor"></div>
	
@endsection

@section('script')
<script src="/js/bootstrap-wysiwyg.js"></script>
<script>
	$('#editor').wysiwyg();
</script>
@endsection