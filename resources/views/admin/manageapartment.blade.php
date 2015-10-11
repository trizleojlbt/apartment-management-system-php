@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Manage Apartment
@stop

@section('nav-desktop')
	<li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li class="active"><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
    <li><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('nav-mobile')
	<li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li class="active"><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
    <li><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('bodyclass')
	<body>
@stop

@section('body')
	<div class="divcenter center-align table-title z-depth-1" style="font-size:36px;margin-top:30px;font-weight:500;"><p>List of Apartments</p></div>
	<div class="apartmenttable-container divcenter">
		<table class="highlight responsive-table centered">
        <thead>
            <tr>
	            <th data-field="apartment_id">ID</th>
	            <th data-field="apartment_name">Name</th>
	            <th data-field="apartment_num_of_floors"># of Floors</th>
	            <th data-field="apartment_num_of_rooms"># of rooms</th>
	            <th data-field="apartment_construction_status">Construction Status</th>
	            <th data-field="apartment_payment_status">Payment Status</th>
	            <th data-field="block_address">Block Address</th>
	            <th data-field="created_at">Created At</th>
	            <th data-field="updated_at">Updated At</th>
	            <th></th>
            </tr>
        </thead>

        <tbody>
        
        @foreach($apartments as $apartment)
            <tr>
            {!! Form::open(['url'=>'/admin/updateapartment', 'id'=>"updateform$apartment->apartment_id"]) !!}
	            <td width="80">
	            	<span class="" id="id" data-aid="{{ $apartment->apartment_id }}">{{ $apartment->apartment_id }}</span>
	            </td>
	            <td width="200">
	            	<span class="data-label">{{ $apartment->apartment_name }}</span>
	            	{!! Form::text('name', $apartment->apartment_name , ['class'=>'hidden center-align']) !!}
	            </td>
	            <td width="80">
	            	<span class="data-label">{{ $apartment->apartment_num_of_floors }}</span>
	            	{!! Form::text('num_of_floors', $apartment->apartment_num_of_floors , ['class'=>'hidden center-align']) !!}
	            </td>
	            <td width="80">
	            	<span class="data-label">{{ $apartment->apartment_num_of_rooms }}</span>
	            	{!! Form::text('num_of_rooms', $apartment->apartment_num_of_rooms , ['class'=>'hidden center-align']) !!}
	            </td>
	            <td width="80">
	            	<span class="data-label">{{ $apartment->apartment_construction_status }}</span>
	            	{!! Form::text('construction_status', $apartment->apartment_construction_status , ['class'=>'hidden center-align']) !!}
	            </td>
	            <td width="140">
	            	<span class="data-label">{{ $apartment->apartment_payment_status }}</span>
	            	{!! Form::text('payment_status', $apartment->apartment_payment_status , ['class'=>'hidden center-align']) !!}
	            </td>
	            <td width="*">
	            	<span class="data-label">{{ $apartment->getBlockAddress->block_address }}</span>
	            	{!! Form::select('block_id', $blocks ,null, ['class'=>'hidden']) !!}
	            </td>
	            <td width="100">{{ $apartment->created_at->format('M j, Y') }}</td>
	            <td width="100">{{ $apartment->updated_at->format('M j, Y') }}</td>
	            <td width="150" id="btn-options" class="">
	            	<!-- href='{{ url("updateapartment/$apartment->apartment_id") }}' -->
	            	<a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-teal grey-text text-darken-3 btn-flat edit-btn tooltipped" data-position="top" data-tooltip="Edit" name="{{ $apartment->apartment_id }}"><i class="material-icons left" >edit</i></a>

	            	<a href="javascript:void(0)" data-position="top"  data-tooltip="Delete" style="margin-top:10px;" class="waves-effect waves-teal grey-text text-darken-3 btn-flat deleteapartment-btn tooltipped" data-aid="{{ $apartment->apartment_id }}"><i class="material-icons left" >delete</i></a>


	            	<!-- Fot editing -->
	            	<a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-green green-text btn-flat update-btn hidden tooltipped" name="{{ $apartment->apartment_id }}" data-position="top" data-tooltip="Update"><i class="material-icons left">check</i></a>
	            	<a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-red red-text btn-flat cancel-btn hidden tooltipped" name="{{ $apartment->apartment_id }}" data-position="top" data-tooltip="Cancel"><i class="material-icons left">close</i></a>
	            </td>
	            {!! Form::close() !!}
            </tr>
         @endforeach
         
        </tbody>
      </table>
	</div>


	<!-- Modal Trigger -->
	<center><a href="#addapartment-modal" style="margin-top:10px;" class="waves-effect waves-light light-blue btn" id="addapartment-btn"><i class="material-icons left">add</i>Add More Apartment</a></center>

  <!--Add apartment Modal Structure -->
  <div id="addapartment-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="container">
		{!! Form::open(['url'=>'/admin/addapartment', 'id'=>'addform']) !!}
		<div class="center-align" style="font-weight:500;font-size:32px;margin-bottom:40px !important;padding-top:20px;">Add an Apartment</div>

		<div class="row field">
			<div class="input-field col s12">
			<i class="material-icons prefix">location_city</i>
				{!! Form::label('name') !!}
				{!! Form::text('name', null) !!}
				<div class="error-input">
					@foreach($errors->get('name') as $message)
	              		{{ $message }}
	            	@endforeach			
				</div>
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
			<i class="material-icons prefix">grid_on</i>
				{!! Form::label('num_of_floors') !!}
				{!! Form::text('num_of_floors', null) !!}
				<div class="error-input">
					@foreach($errors->get('num_of_floors') as $message)
	              		{{ $message }}
	            	@endforeach			
				</div>
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
			<i class="material-icons prefix">filter_1</i>
				{!! Form::label('num_of_rooms') !!}
				{!! Form::text('num_of_rooms', null) !!}
				<div class="error-input">
					@foreach($errors->get('num_of_rooms') as $message)
	              		{{ $message }}
	            	@endforeach			
				</div>
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
			<i class="material-icons prefix">filter_1</i>
				{!! Form::label('construction_status') !!}
				{!! Form::text('construction_status', null) !!}
				<div class="error-input">
					@foreach($errors->get('construction_status') as $message)
	              		{{ $message }}
	            	@endforeach			
				</div>
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
			<i class="material-icons prefix">filter_1</i>
				{!! Form::label('payment_status') !!}
				{!! Form::text('payment_status', null) !!}
				<div class="error-input">
					@foreach($errors->get('payment_status') as $message)
	              		{{ $message }}
	            	@endforeach			
				</div>
			</div>
		</div>

		<div class="row field">
			<div class="input-field col s12">
				{!! Form::select('block_id', $blocks) !!}
				<div class="error-input">
					@foreach($errors->get('block_id') as $message)
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
      <a href="javascript:void(0)" id="addapartment" class=" modal-action modal-close waves-effect waves-green btn-flat">Add</a>
    </div>
  </div>


  <!-- Delete Modal Structure -->
    <div id="delete-modal" class="modal">
	    <div class="modal-content">
	       <h4>Confirm Delete</h4>
	       <p>Are you sure you want to delete this Apartment?</p>
	    </div>
	    <div class="modal-footer">
	       <a href="javascript:void(0)" id="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
	       <a href="link" id="yes" class=" modal-action modal-close waves-effect waves-green btn-flat">Yes</a>
	    </div>
    </div>
    @if(!empty($errors->all()))
    <script type="text/javascript">
   		 $('#addapartment-modal').openModal();
    </script>
	
	@endif
@stop

@section('callback')
	
	//$('tr').hover(function(){
	//	$(this).find('#btn-options').fadeIn();
	//}).mouseleave(function(){
	//	$(this).find('#btn-options').fadeOut();
	//});

	$('#addapartment-btn').click(function(){
		$('#addapartment-modal').openModal();
	});

	$('#addapartment').click(function(){
		$('#addform').submit();
	});

	$('.edit-btn').click(function(){
		//var id = $('#deleteapartment-btn').attr('name');
		//location.href="{{ URL::to('updateapartment') }}"+'/'+id;

		$(this).parent().siblings('td').find('input').toggleClass('hidden');

		$(this).parent().siblings('td').find('div').toggleClass('hidden');
		$(this).parent().siblings('td').find('select').removeClass('hidden');
		$(this).parent().siblings('td').find('.select-dropdown').removeClass('hidden');

		$(this).parent().siblings('td').find('.data-label').toggleClass('hidden');
		$(this).siblings('a.update-btn, a.cancel-btn, a.deleteapartment-btn').toggleClass('hidden');
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
		$(this).siblings('a.update-btn, a.edit-btn, a.deleteapartment-btn').toggleClass('hidden');
		$(this).toggleClass('hidden');
	});


	$('.deleteapartment-btn').click(function(){
		var id = $(this).data('aid');
		console.log(id);
		$('#delete-modal').openModal();
		$('.modal-footer #yes').attr('href', "{{ url('admin/deleteapartment') }}"+'/'+id);
	});

	$('.update-btn').click(function(){
		var apart_id = $(this).parent().siblings('td').find('#id').data('aid');
		var form = $(this).parent().parent().find('form');
		console.log(form);
		form.attr('action','{{ url("admin/updateapartment") }}'+'/'+apart_id);
		form.submit();
	});
@stop