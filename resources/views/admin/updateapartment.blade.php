@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Update Apartment
@stop

@section('nav-desktop')
	<li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="javascript:void()">Tenants</a></li>
    <li><a href="javascipt:void()">Owners</a></li>
    <li><a href="javascipt:void()">Services</a></li>
    <li><a href="{{ url('contact') }}">Contact</a></li>
    <li class="active"><a href="{{ url('manageapartment') }}">Manage Apartment</a></li>
    <li><a href="{{ url('register') }}">Register</a></li>
@stop

@section('nav-mobile')
	<li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="javascript:void()">Tenants</a></li>
    <li><a href="javascipt:void()">Owners</a></li>
    <li><a href="javascipt:void()">Services</a></li>
    <li><a href="{{ url('contact') }}">Contact</a></li>
    <li class="active"><a href="{{ url('manageapartment') }}">Manage Apartment</a></li>
    <li><a href="{{ url('register') }}">Register</a></li>
@stop

@section('bodyclass')
	<body class="blue-grey lighten-5">
@stop

@section('body')
	<div class="container">
		<!-- <div class="divcenter" style="width:60%;text-align:center;font-size:1.4rem;margin-top:20px;">Login to your account to use the systems full functionality!</div> -->
		<div class="row updateapartment-container divcenter z-depth-1">
		{!! Form::open(['url'=>'/updateapartment'], ['class'=>'col s12']) !!}
		<div class="center-align" style="font-weight:500;font-size:32px;margin-bottom:40px !important;padding-top:20px;"><div style="width:50%;" class="divcenter"><i class="material-icons left" style="font-size:44px;">edit</i>Edit this Apartment</div></div>
		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('Apartment ID') !!}
				{!! Form::text('apartment_id', $apartment->apartment_id ) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('Address') !!}
				{!! Form::text('apartment_address', $apartment->apartment_address) !!}
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('Area') !!}
				{!! Form::text('apartment_area', $apartment->apartment_area) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('Number of rooms') !!}
				{!! Form::text('apartment_num_of_rooms', $apartment->apartment_num_of_rooms) !!}			
			</div>
		</div>

		<div class="row field right">
			{!! Form::button('update', ['class'=>'btn waves-effect waves-light center-align', 'type'=>'submit', 'id'=>'update-btn']) !!}
			{!! Form::button('cancel', ['class'=>'btn waves-effect waves-light center-align', 'type'=>'button', 'id'=>'cancel-btn']) !!}
		</div>

		{!! Form::close() !!}
		</div>
	</div>
@stop