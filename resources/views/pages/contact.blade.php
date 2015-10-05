@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Contact Us
@stop

@section('nav-desktop')
	<li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="javascript:void()">Tenants</a></li>
    <li><a href="javascipt:void()">Owners</a></li>
    <li><a href="javascipt:void()">Services</a></li>
    <li class="active"><a href="{{ url('contact') }}">Contact</a></li>
    <li><a href="{{ url('login') }}">Login</a></li>
@stop

@section('nav-mobile')
	<li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="javascript:void()">Tenants</a></li>
    <li><a href="javascipt:void()">Owners</a></li>
    <li><a href="javascipt:void()">Services</a></li>
    <li class="active"><a href="{{ url('contact') }}">Contact</a></li>
    <li><a href="{{ url('login') }}">Login</a></li>
@stop


@section('bodyclass')
	<body class="blue-grey lighten-5">
@stop
@section('body')
	<div class="container">
		<div class="center-align">
			<div class="contact-banner">Send us a Message</div>
			<p>
				You got any suggestions or inquiries? Send us a message. We'll be happy to answer your queries. :) 
			</p>
		</div>
		<div class="contact-outercontainer">
			<div class="row contact-container divcenter">
			{!! Form::open(['url'=>'/sendquery'], ['class'=>'col s12']) !!}
			<!-- <div class="center-align" style="font-weight:500;font-size:32px;margin-bottom:40px !important;">Apartriz Login</div> -->
			<div class="row field">
				<div class="input-field col s12">
				<i class="material-icons prefix">account_circle</i>
					{!! Form::label('Name') !!}
					{!! Form::text('name', null) !!}			
				</div>
			</div>

			<div class="row field">
				<div class="input-field col s12">
				<i class="material-icons prefix">email</i>
					{!! Form::label('email') !!}
					{!! Form::email('password', null) !!}			
				</div>
			</div>

			<div class="row field">
				<div class="input-field col s12">
				<i class="material-icons prefix">assignment</i>
					{!! Form::label('Message') !!}
					{!! Form::textarea('message', null, ['class'=>'materialize-textarea', 'id'=>'message']) !!}			
				</div>
			</div>

			<div class="row field">
				<center><a href="javascript:void(0)" style="margin-top:10px;" class="waves-effect waves-light btn" id="send-btn"><i class="material-icons right">send</i>Send</a></center>
			</div>
			{!! Form::close() !!}
			</div>
		</div>

		<div class="contact-links">
			<div class="contact-banner center-align">LINKS</div>
			<div class="contact-link-content">
				<div class="red-text contact-link-heading">Email</div>
				<div>apartriz@gmail.com</div>
				<div class="red-text contact-link-heading">Telephone</div>
				<div>123-4567</div>
	<!-- 			<div class="red-text contact-link-heading">Skype</div>
				<div>apartriz</div> -->
				<div class="red-text contact-link-heading">Address</div>
				<div>
					721 QMWMAA</br>
					DAS Toledo City</br>
					Cebu Philippines
				</div>
				<div class="red-text contact-link-heading">Visit us :</div>
				<div class="contact-link-social">
					<a class="btn-floating waves-effect waves-light blue social-links" href="https://facebook.com" target="_blank" style="margin-left:70px;"><span class="fa fa-facebook"></span></a>
					<a class="btn-floating waves-effect waves-light red social-links" href="https://plus.google.com" target="_blank"><span class="fa fa-google-plus"></span></a>
					<a class="btn-floating waves-effect waves-light light-blue social-links" href="https://skype.com" target="_blank"><span class="fa fa-skype"></span></a>
				</div>
			</div>
			
		</div>
		
	</div>
@stop

@section('callback')
	$('#message').trigger('autoresize');
	$('#send-btn').click(function(){
		$('form').submit();
	});
@stop