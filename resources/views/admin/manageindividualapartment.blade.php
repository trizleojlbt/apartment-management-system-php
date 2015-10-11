@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Manage Individual Apartment Details
@stop

@section('nav-desktop')
	<li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li class="active"><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
    <li><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('nav-mobile')
	<li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li class="active"><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
    <li><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('bodyclass')
	<body>
@stop

@section('body')
	<div class="divcenter center-align table-title z-depth-1" style="font-size:36px;margin-top:30px;font-weight:500;"><p>List of Individual Apartments</p></div>
	<div class="iatable-container divcenter">
		<table class="highlight responsive-table centered">
        <thead>
            <tr>
	            <th data-field="ia_id">ID</th>
	            <th data-field="owner_id">Owner</th>
	            <th data-field="apartment_id">Apartment</th>
	            <th data-field="aa_id">Allotment ID</th>
	            <th data-field="created_at">Created At</th>
	            <th data-field="updated_at">Updated At</th>
	            <th></th>
            </tr>
        </thead>

        <tbody>
        @foreach($ias as $ia)
            <tr>
        	{!! Form::open(['url'=>'/admin/updateindi', 'id'=>"updateform$ia->ia_id"]) !!}
	            <td width="60">
	            	<span class="" id="id" data-aid="{{ $ia->ia_id }}">{{ $ia->ia_id }}</span>
	            </td>
	            <td width="180">
	            	<span class="data-label">{{ $ia->getOwner->owner_lastname }}, {{ $ia->getOwner->owner_firstname }} <?php strtoupper($ia->getOwner->owner_lastname[0]); ?></span>
	            	{!! Form::select('owner_id', $owners ,null, ['class'=>'hidden center-align']) !!}
	            </td>
	            <td width="120">
	            	<span class="data-label">{{ $ia->getApartment->apartment_name }}</span>
	            	{!! Form::select('apartment_id', $apartments ,null, ['class'=>'hidden center-align']) !!}
	            </td>
	            <td width="60">
	            	<span class="data-label">{{ $ia->aa_id }}</span>
	            	{!! Form::select('aa_id', $aas ,null, ['class'=>'hidden center-align']) !!}
	            </td>
	            <td width="180">{{ $ia->created_at->format('M j, Y') }}</td>
	            <td width="180">{{ $ia->updated_at->format('M j, Y') }}</td>
	            <td width="150">
	            	<!-- href='{{ url("updateapartment/$ia->apartment_id") }}' -->
	            	<a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-teal grey-text text-darken-3 btn-flat edit-btn tooltipped" data-position="top" data-tooltip="Edit" name="{{ $ia->ia_id }}"><i class="material-icons left" >edit</i></a>

	            	<a href="javascript:void(0)" data-position="top"  data-tooltip="Delete" style="margin-top:10px;" class="waves-effect waves-teal grey-text text-darken-3 btn-flat deleteia-btn tooltipped" data-aid="{{ $ia->ia_id }}"><i class="material-icons left" >delete</i></a>


	            	<!-- Fot editing -->
	            	<a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-green green-text btn-flat update-btn hidden tooltipped" name="{{ $ia->ia_id }}" data-position="top" data-tooltip="Update"><i class="material-icons left">check</i></a>
	            	<a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-red red-text btn-flat cancel-btn hidden tooltipped" name="{{ $ia->ia_id }}" data-position="top" data-tooltip="Cancel"><i class="material-icons left">close</i></a>
	            </td>
         	{!! Form::close() !!}
            </tr>
         @endforeach
        </tbody>
      </table>
	</div>


	<!-- Modal Trigger -->
	<center><a href="#addia-modal" style="margin-top:10px;" class="waves-effect waves-light light-blue btn" id="addia-btn"><i class="material-icons left">add</i>Add More Individual Apartment</a></center>

  <!--Add apartment Modal Structure -->
  <div id="addia-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="container">
		{!! Form::open(['url'=>'/admin/addindi', 'id'=>'addform']) !!}
		<div class="center-align" style="font-weight:500;font-size:32px;margin-bottom:40px !important;padding-top:20px;">Add Individual Apartment</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('owner_id') !!}
				{!! Form::select('owner_id', $owners ) !!}
				<div class="error-input">
					@foreach($errors->get('owner_id') as $message)
	              		{{ $message }}
	            	@endforeach			
				</div>			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('apartment_id') !!}
				{!! Form::select('apartment_id', $apartments ) !!}
				<div class="error-input">
					@foreach($errors->get('apartment_id') as $message)
	              		{{ $message }}
	            	@endforeach			
				</div>			
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::label('aa_id') !!}
				{!! Form::select('aa_id', $aas ) !!}
				<div class="error-input">
					@foreach($errors->get('aa_id') as $message)
	              		{{ $message }}
	            	@endforeach			
				</div>			
			</div>
		</div>

		{!! Form::close() !!}
	</div>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
      <a href="javascript:void(0)" id="addia" class=" modal-action modal-close waves-effect waves-green btn-flat">Add</a>
    </div>
  </div>


  <!-- Delete Modal Structure -->
    <div id="delete-modal" class="modal">
	    <div class="modal-content">
	       <h4>Confirm Delete</h4>
	       <p>Are you sure you want to delete this Individual Apartment from Database?</p>
	    </div>
	    <div class="modal-footer">
	       <a href="javascript:void(0)" id="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
	       <a href="link" id="yes" class=" modal-action modal-close waves-effect waves-green btn-flat">Yes</a>
	    </div>
	    @if(!empty($errors->all()))
		    <script type="text/javascript">
		   		 $('#addia-modal').openModal();
		    </script>
		@endif
    </div>
@stop

@section('callback')

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
		format: 'yyyy-mm-dd',
	  	selectMonths: true
	});

	$('#addia-btn').click(function(){
		$('#addia-modal').openModal();
	});

	$('#addia').click(function(){
		$('#addform').submit();
	});

	$('.edit-btn').click(function(){
		//var id = $('#deleteia-btn').attr('name');
		//location.href="{{ URL::to('updateapartment') }}"+'/'+id;

		$(this).parent().siblings('td').find('input').toggleClass('hidden');
		$(this).parent().siblings('td').find('div').toggleClass('hidden');
		$(this).parent().siblings('td').find('.data-label').toggleClass('hidden');
		$(this).siblings('a.update-btn, a.cancel-btn, a.deleteia-btn').toggleClass('hidden');
		$(this).toggleClass('hidden');
		$(this).parent().parent().siblings('tr').find('a.cancel-btn:visible').click();
	});

	$('.cancel-btn').click(function(e){
		e.preventDefault();

		$(this).parent().siblings('td').find('input').toggleClass('hidden')
			.each(function(i, e){
				$(e).val($(e).siblings('span').text());
			});
		$(this).parent().siblings('td').find('div').toggleClass('hidden')
			.each(function(i, e){
				$(e).val($(e).siblings('span').text());
			});

		$(this).parent().siblings('td').find('.data-label').toggleClass('hidden');
		$(this).siblings('a.update-btn, a.edit-btn, a.deleteia-btn').toggleClass('hidden');
		$(this).toggleClass('hidden');
	});


	$('.deleteia-btn').click(function(){
		var id = $(this).data('aid');
		console.log(id);
		$('#delete-modal').openModal();
		$('.modal-footer #yes').attr('href', "{{ url('admin/deleteindi') }}"+'/'+id);
	});

	$('.update-btn').click(function(){
		var apart_id = $(this).parent().siblings('td').find('#id').data('aid');
		var form = $(this).parent().parent().find('form');
		form.attr('action','{{ url("admin/updateindi") }}'+'/'+apart_id);
		form.submit();
	});
@stop