@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Welcome to Apartriz!!
@stop

@section('nav-desktop')
	  <li class="active"><a href="{{ url('home') }}">Home</a></li>
      <li><a href="javascript:void()">Tenants</a></li>
      <li><a href="javascipt:void()">Owners</a></li>
      <li><a href="javascipt:void()">Services</a></li>
      <li><a href="{{ url('contact') }}">Contact</a></li>
      <li><a href="{{ url('auth/login') }}">Login</a></li>
@stop

@section('nav-mobile')
	  <li class="active"><a href="{{ url('home') }}">Home</a></li>
      <li><a href="javascript:void()">Tenants</a></li>
      <li><a href="javascipt:void()">Owners</a></li>
      <li><a href="javascipt:void()">Services</a></li>
      <li><a href="{{ url('contact') }}">Contact</a></li>
      <li><a href="{{ url('auth/login') }}">Login</a></li>
@stop

@section('bodyclass')
	<body>
@stop

@section('body')
	<div class="parallax-container">
      <div class="parallax overlay"><img src="../assets/images/paraimage1.jpg"></div>
      <div class="parallax-content-title"><p style="font-weight:600;z-index:99999;display:none;color:#fff;padding-top:20px;">JUST LIVE.</p></div>
    </div>
    <div class="section white">
	    <div class="row container justify-align">
	        <div class="header parallax-content-header" id="one"><center>Apartriz</center></div>
	        <p class="center-align" style="font-weight:300;">Apartment Management System</p>
	        <p class="grey-text text-darken-3 lighten-3 parallax-content parallax-paragraph firstsection" id="one">
	        	Parallax is an effect where the background content or image in this case, is moved at a different speed than the foreground content while scrolling.
	        	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	        </p>
	        <p class="grey-text text-darken-3 lighten-3 parallax-content parallax-paragraph firstsection" id="two">
	        	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	        	lorem
	        </p>
	    </div>
	</div>
	<!-- <div style="margin-bottom:40px;"></div> -->
	<div class="section grey lighten-4">
	<div class="header parallax-content-header"><center>What we do</center></div>
		<div class="row container">
	    	<div class="col s4">
	    		<h1 class="center"><span class="fa fa-cogs"></span></h1>
	    		<div class="row-title">TITLE</div>
	    		<p class="parallax-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    	</div>
	    	<div class="col s4">
	    		<h1 class="center"><span class="fa fa-money"></span></h1>
	    		<div class="row-title">TITLE</div>
	    		<p class="parallax-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    	</div>
	    	<div class="col s4">
	    		<h1 class="center"><span class="fa fa-list"></span></h1>
	    		<div class="row-title">TITLE</div>
	    		<p class="parallax-paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	    		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	    		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	    		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	    		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	    		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	    	</div>
	    </div>
	</div>
@stop