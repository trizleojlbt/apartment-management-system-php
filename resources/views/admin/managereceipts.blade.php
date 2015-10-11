@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Receipts
@stop

@section('nav-desktop')
	<li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
    <li class="active"><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('nav-mobile')
	<li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
    <li class="active"><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('bodyclass')
	<body>
@stop

@section('body')
    <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a class="active"  href="#col1">Allotment Receipts</a></li>
        <li class="tab col s3"><a href="#col2">Maintenance Receipts</a></li>
      </ul>
    </div>
    <div id="col1" class="col s12">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div id="col2" class="col s12">
        <p>This is the Column 2</p>
    </div>
  </div>
@stop

@section('callback')
    $(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'tab_id');
  });
@stop   