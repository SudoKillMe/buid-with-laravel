@extends('layout')

@section('header')
<style>
	.bg{
		position: absolute;
		top:0;bottom:0;left:0;right:0;
		background: rgb(30,87,153);
		background: -moz-linear-gradient(45deg,  rgba(30,87,153,1) 0%, rgba(41,137,216,1) 79%, rgba(32,124,202,1) 100%, rgba(125,185,232,1) 100%);
		background: -webkit-linear-gradient(45deg,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 79%,rgba(32,124,202,1) 100%,rgba(125,185,232,1) 100%);
		background: linear-gradient(45deg,  rgba(30,87,153,1) 0%,rgba(41,137,216,1) 79%,rgba(32,124,202,1) 100%,rgba(125,185,232,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=1 );

	}
	.card{
		width: 400px;
		height: 400px;
		background: #fff;
		border-radius: 5px;
		position: absolute;
		top: 40%;left:50%;
		transform: translate(-50%, -50%);
		-webkit-box-shadow: 0 0 5px 2px rgba(30,87,153,1);
		box-shadow: 0 0 5px 2px rgba(30,87,153,1);
		box-sizing: border-box;
		padding: 20px 30px;
	}
	.register-card{
		display: none;
	}
	.title{
		text-align: center;
		margin-bottom: 30px;
	}
	.guest{
		float: right;
	}
</style>
@endsection

@section('content')
  <div class="bg">
   <div class="card">
    <form action="" class="form login-card">
    	<h3 class="title">SOMEONE</h3>
    	<div class="form-group">
    		<input type="text" class="form-control input-lg" placeholder="username">
    	</div>
    	<div class="form-group">
    		<input type="text" class="form-control input-lg" placeholder="password">
    	</div>
    	<div class="form-group">
    		<button class="btn btn-primary btn-block">登录</button>
    	</div>
    	<div class="form-group">
    		<a href="" class="register">注册</a>
    		<a href="" class="guest">以游客身份登录</a>
    	</div>
    </form>
    <form action="" class="form register-card">
    	<h3 class="title">SOMEONE</h3>
    	<div class="form-group">
    		<input type="text" class="form-control input-lg" placeholder="username">
    	</div>
    	<div class="form-group">
    		<input type="text" class="form-control input-lg" placeholder="password">
    	</div>
    	<div class="form-group">
    		<input type="text" class="form-control input-lg" placeholder="password">
    	</div>
    	<div class="form-group">
    		<button class="btn btn-primary btn-block">注册</button>
    	</div>
    	<div class="form-group">
    		<a href="" class="login">登录</a>
    		<a href="" class="guest">以游客身份登录</a>
    	</div>
    </form>
   </div>
  </div>
@endsection