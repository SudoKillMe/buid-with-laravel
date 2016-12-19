@extends('layout')

@section('header')
<style>
    body{
        position: absolute;
        top:0;left:0;bottom: 0;right: 0;
    }
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
/*		height: 400px;*/
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
	.title{
		text-align: center;
		margin-bottom: 30px;
	}
	.guest{
		float: right;
	}
    .input-wrap{
        position: relative;
    }
    .input-icon{
        position: absolute;
        right:20px;
        top:50%;
        transform: translateY(-50%);
    }
</style>
@endsection

@section('content')
  <div class="bg">
   <div class="card">
    <form action="/user/register" class="form login-card" method="post">
        {{ csrf_field() }}
    	<h3 class="title">T's River</h3>
 
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            @if ($errors->has('name'))
            <label for="input-name" class="control-label">{{ $errors->first('name') }}</label>
            @endif
            <div class="input-wrap">
    		    <input type="text" class="form-control input-lg" placeholder="username" name="name" id="input-name" value="{{ old('name') }}">
                <span class="icon-user input-icon"></span>
            </div>
    	</div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            @if ($errors->has('password'))
            <label for="input-passwd" class="control-label">{{ $errors->first('password') }}</label>
            @endif
            <div class="input-wrap">
    		    <input type="text" class="form-control input-lg" placeholder="password" name="password" id="passwd">
                <span class="icon-lock input-icon"></span>   
            </div>
    	</div>
        <div class="form-group{{ $errors->has('pass_error') ? ' has-error' : '' }}">
            @if ($errors->has('cpass_error'))
            <label for="input-cpasswd" class="control-label">{{ $errors->first('cpass_error') }}</label>
            @endif
            <div class="input-wrap">
                <input type="text" class="form-control input-lg" placeholder="password" name="c-password" id="cpasswd">
                <span class="icon-lock input-icon"></span>   
            </div>
        </div>
    	<div class="form-group">
    		<button type="submit" class="btn btn-primary btn-block">注册</button>
    	</div>
    	<div class="form-group">
    		<a href="/user/login" class="login">登录</a>
    		<a href="/" class="guest">以游客身份登录</a>
    	</div>
    </form>
   </div>
  </div>
@endsection