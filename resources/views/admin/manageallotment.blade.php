@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Manage Apartment Allotment
@stop

@section('nav-desktop')
	<li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li class="active"><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
    <li><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('nav-mobile')
	<li><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
    <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li class="active"><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
    <li><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('bodyclass')
	<body>
@stop

@section('body')
    <div class="divcenter center-align table-title z-depth-1" style="font-size:36px;margin-top:30px;font-weight:500;"><p>Allotments</p></div>
    <div class="allotmenttable-container divcenter">
        <table class="highlight responsive-table centered">
        <thead>
            <tr>
                <th data-field="aa_id">ID</th>
                <th data-field="apartment_id">Apartment</th>
                <th data-field="aa_amount_needed">Amount Needed</th>
                <th data-field="aa_amount_installed">Amount Installed</th>
                <th data-field="ir_no">Receipt No.</th>
                <th data-field="created_at">Created At</th>
                <th data-field="updated_at">Updated At</th>
                <th></th>
            </tr>
        </thead>

        <tbody>

        @foreach($aas as $aa)
            <tr>
            {!! Form::open(['url'=>'/admin/updateallotment', 'id'=>"updateform$aa->aa_id"]) !!}
                <td width="80">
                    <span class="" id="id" data-aid="{{ $aa->aa_id }}">{{ $aa->aa_id }}</span>
                </td>
                <td width="*">
                    <span class="data-label">{{ $aa->getApartment->apartment_name }}</span>
                    {!! Form::select('apartment_id', $apartments ,null, ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $aa->aa_amount_needed }}</span>
                    {!! Form::text('amount_needed', $aa->aa_amount_needed , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $aa->aa_amount_paid }}</span>
                    {!! Form::text('amount_installed', $aa->aa_amount_paid , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $aa->ir_no }}</span>
                    {!! Form::text('ir_no', $aa->ir_no , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="180">{{ $aa->created_at->format('M j, Y') }}</td>
                <td width="180">{{ $aa->updated_at->format('M j, Y') }}</td>
                <td width="150" id="btn-options" class="">
                    <!-- href='{{ url("updateaa/$aa->aa_id") }}' -->
                    <a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-teal grey-text text-darken-3 btn-flat edit-btn tooltipped" data-position="top" data-tooltip="Edit" name="{{ $aa->aa_id }}"><i class="material-icons left" >edit</i></a>

                    <a href="javascript:void(0)" data-position="top"  data-tooltip="Delete" style="margin-top:10px;" class="waves-effect waves-teal grey-text text-darken-3 btn-flat deleteallotment-btn tooltipped" data-aid="{{ $aa->aa_id }}"><i class="material-icons left" >delete</i></a>


                    <!-- Fot editing -->
                    <a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-green green-text btn-flat update-btn hidden tooltipped" name="{{ $aa->aa_id }}" data-position="top" data-tooltip="Update"><i class="material-icons left">check</i></a>
                    <a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-red red-text btn-flat cancel-btn hidden tooltipped" name="{{ $aa->aa_id }}" data-position="top" data-tooltip="Cancel"><i class="material-icons left">close</i></a>
                </td>
                {!! Form::close() !!}
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>


    <!-- Modal Trigger -->
    <center><a href="#addallotment-modal" style="margin-top:10px;" class="waves-effect waves-light light-blue btn" id="addallotment-btn"><i class="material-icons left">add</i>Add Entry</a></center>

  <!--Add apartment Modal Structure -->
  <div id="addallotment-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="container">
        {!! Form::open(['url'=>'/admin/addallotment', 'id'=>'addform']) !!}
        <div class="center-align" style="font-weight:500;font-size:32px;margin-bottom:40px !important;padding-top:20px;">Add another entry</div>

        <div class="row field">
            <div class="input-field col s12">
                {!! Form::select('apartment_id', $apartments) !!}
                <div class="error-input">
                    @foreach($errors->get('apartment_id') as $message)
                        {{ $message }}
                    @endforeach         
                </div>
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">attach_money</i>
                {!! Form::label('amount_needed') !!}
                {!! Form::text('amount_needed', null) !!}
                <div class="error-input">
                    @foreach($errors->get('amount_needed') as $message)
                        {{ $message }}
                    @endforeach         
                </div>
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">attach_money</i>
                {!! Form::label('amount_paid') !!}
                {!! Form::text('amount_paid', null) !!}
                <div class="error-input">
                    @foreach($errors->get('amount_paid') as $message)
                        {{ $message }}
                    @endforeach         
                </div>
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">filter_4</i>
                {!! Form::label('ir_no') !!}
                {!! Form::text('ir_no', null) !!}
                <div class="error-input">
                    @foreach($errors->get('ir_no') as $message)
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
      <a href="javascript:void(0)" id="addallotment" class=" modal-action modal-close waves-effect waves-green btn-flat">Add</a>
    </div>
  </div>


  <!-- Delete Modal Structure -->
    <div id="delete-modal" class="modal">
        <div class="modal-content">
           <h4>Confirm Delete</h4>
           <p>Are you sure you want to delete this entry?</p>
        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" id="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
           <a href="link" id="yes" class=" modal-action modal-close waves-effect waves-green btn-flat">Yes</a>
        </div>
    </div>
    @if(!empty($errors->all()))
    <script type="text/javascript">
         $('#addallotment-modal').openModal();
    </script>
    
    @endif
@stop

@section('callback')
    
    //$('tr').hover(function(){
    //  $(this).find('#btn-options').fadeIn();
    //}).mouseleave(function(){
    //  $(this).find('#btn-options').fadeOut();
    //});

    $('#addallotment-btn').click(function(){
        $('#addallotment-modal').openModal();
    });

    $('#addallotment').click(function(){
        $('#addform').submit();
    });

    $('.edit-btn').click(function(){
        //var id = $('#deleteallotment-btn').attr('name');
        //location.href="{{ URL::to('updateallotment') }}"+'/'+id;

        $(this).parent().siblings('td').find('input').toggleClass('hidden');
        $(this).parent().siblings('td').find('div').toggleClass('hidden');
        $(this).parent().siblings('td').find('.data-label').toggleClass('hidden');
        $(this).siblings('a.update-btn, a.cancel-btn, a.deleteallotment-btn').toggleClass('hidden');
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
        $(this).siblings('a.update-btn, a.edit-btn, a.deleteallotment-btn').toggleClass('hidden');
        $(this).toggleClass('hidden');
    });


    $('.deleteallotment-btn').click(function(){
        var id = $(this).data('aid');
        console.log(id);
        $('#delete-modal').openModal();
        $('.modal-footer #yes').attr('href', "{{ url('admin/deleteallotment') }}"+'/'+id);
    });

    $('.update-btn').click(function(){
        var apart_id = $(this).parent().siblings('td').find('#id').data('aid');
        var form = $(this).parent().parent().find('form');
        console.log(form);
        form.attr('action','{{ url("admin/updateallotment") }}'+'/'+apart_id);
        form.submit();
    });
@stop
@stop