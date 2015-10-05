@extends('layout.master')

@section('htmlclass')
<html class="">
@stop

@section('title')
	Create an Account !!
@stop



@section('nav-desktop')
	<li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="javascript:void()">Tenants</a></li>
    <li><a href="javascipt:void()">Owners</a></li>
    <li><a href="javascipt:void()">Services</a></li>
    <li><a href="{{ url('contact') }}">Contact</a></li>
    <li><a href="{{ url('login') }}">Login</a></li>
    <li class="active"><a href="{{ url('register') }}">Register</a></li>
@stop

@section('nav-mobile')
	<li><a href="{{ url('home') }}">Home</a></li>
    <li><a href="javascript:void()">Tenants</a></li>
    <li><a href="javascipt:void()">Owners</a></li>
    <li><a href="javascipt:void()">Services</a></li>
    <li><a href="{{ url('contact') }}">Contact</a></li>
    <li><a href="{{ url('login') }}">Login</a></li>
    <li class="active"><a href="{{ url('register') }}">Register</a></li>
@stop


@section('bodyclass')
	<body class="blue-grey lighten-5">
@stop
@section('body')
	<div class="container">
	<div class="center-align register-banner">START USING OUR SYSTEM BY CREATING YOUR ACCOUNT!</div>
		<div class="row register-container" id="register-desc">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
		</div>

		<!-- REGISTRATION CONTAINER -->
		<div class="row z-depth-1 register-container">
		{!! Form::open(['url'=>'/auth/register'], ['class'=>'col s12']) !!}
		<div class="center-align" style="font-weight:500;font-size:32px;margin-bottom:40px !important;">Create an Account</div>
		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('firstname') !!}
				{!! Form::text('firstname', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('middle name') !!}
				{!! Form::text('middlename', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('lastname') !!}
				{!! Form::text('lastname', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('address') !!}
				{!! Form::text('address', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
					<label for="bdate">Birthdate</label>
					<input id="bdate" name="birthdate" type="date" class="datepicker">
			</div>
		</div>


		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('telephone') !!}
				{!! Form::text('telephone', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('email') !!}
				{!! Form::text('email', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('username') !!}
				{!! Form::text('username', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('password') !!}
				{!! Form::password('password', null) !!}			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('confirm password') !!}
				{!! Form::password('confirmpassword', null) !!}			
			</div>
		</div>

		<div class="row field">
			<!-- <a href="javascript:void()" class=""></a> -->
			<center>{!! Form::button('Register', ['class'=>'btn waves-effect waves-light center-align', 'type'=>'submit', 'id'=>'submit-btn']) !!}</center>
		</div>

		{!! Form::close() !!}
		</div>
	</div>
@stop
	
@section('script')
	$('.datepicker').pickadate({
		labelMonthNext: 'Next month',
		labelMonthPrev: 'Previous month',
		monthsFull: [ 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' ],
		weekdaysFull: [ 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday' ],
		today: 'Today',
		clear: 'Clear',
		close: 'Close',
		closeOnSelect: true,
		closeOnClear: false,
		selectYears: 160,
	  	selectMonths: true
	});
@stop