@extends('layout')

@section('header')

@endsection

@section('content')
	<div id="editor">
		<div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
			<a href="" data-edit="bold"><i class="icon-bold"></i></a>
		</div>
	</div>
@endsection

@section('script')
<script src="/js/bootstrap-wysiwyg.js"></script>
<script>
	$('#editor').wysiwyg();
</script>
@endsection