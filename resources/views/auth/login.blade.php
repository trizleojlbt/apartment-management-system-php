@extends('layout.master')

@section('htmlclass')
<html class="body">
@stop

@section('title')
	Login to Apartriz!!
@stop

@section('nav-desktop')
	<li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="javascript:void()">Tenants</a></li>
    <li><a href="javascipt:void()">Owners</a></li>
    <li><a href="javascipt:void()">Services</a></li>
    <li><a href="{{ url('contact') }}">Contact</a></li>
    <li class="active"><a href="{{ url('auth/login') }}">Login</a></li>
@stop

@section('nav-mobile')
	<li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="javascript:void()">Tenants</a></li>
    <li><a href="javascipt:void()">Owners</a></li>
    <li><a href="javascipt:void()">Services</a></li>
    <li><a href="{{ url('contact') }}">Contact</a></li>
    <li class="active"><a href="{{ url('auth/login') }}">Login</a></li>
@stop


@section('bodyclass')
	<body class="">
@stop
@section('body')
	<div class="container">
		<!-- <div class="divcenter" style="width:60%;text-align:center;font-size:1.4rem;margin-top:20px;">Login to your account to use the systems full functionality!</div> -->
		<div class="row z-depth-2 login-container">
		{!! Form::open(['url'=>'/auth/login'], ['class'=>'col s12', 'id'=>'target']) !!}
		<div class="center-align" style="font-weight:500;font-size:32px;margin-bottom:40px !important;">Apartriz Login</div>
		<div class="row field">
			<div class="input-field col s12">
			<i class="material-icons prefix">account_circle</i>
				{!! Form::label('username') !!}
				{!! Form::text('username', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
			<i class="material-icons prefix">lock</i>
				{!! Form::label('password') !!}
				{!! Form::password('password', null) !!}			
			</div>
		</div>

		<div class="row field">
			<center><a href="javascript:void(0)" style="margin-top:10px;" class="waves-effect waves-light btn" id="login-btn"><i class="material-icons right">send</i>Login</a></center>
		</div>

		{!! Form::close() !!}
		</div>
	</div>
@stop

@section('callback')
	$('#login-btn').click(function(){
		$('form').submit();
	});
@stop