@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Manage Owners
@stop

@section('nav-desktop')
    <li><a href="{{ url('home') }}">Home</a></li>
    <li class="active"><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li><a href="javascript:void(0)">Receipt</a></li>
@stop

@section('nav-mobile')
    <li><a href="{{ url('home') }}">Home</a></li>
    <li class="active"><a href="{{ url('admin/manageowner') }}">Owners</a></li>
    <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
    <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
    <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
    <li><a href="javascript:void(0)">Receipt</a></li>
@stop

@section('bodyclass')
	<body class="blue-grey lighten-5">
@stop

@section('body')
<div class="divcenter center-align table-title" style="font-size:36px;margin-top:30px;font-weight:500;">List of Owners</div>
    <div class="ownertable-container divcenter">
        <table class="highlight responsive-table centered">
        <thead>
            <tr>
                <th data-field="owner_id">ID</th>
                <th data-field="owner_lastname">Lastname</th>
                <th data-field="owner_firstname">Firstname</th>
                <th data-field="owner_middlename">Middlename</th>
                <th data-field="owner_gender">Gender</th>
                <th data-field="owner_birthdate">Birthdate</th>
                <th data-field="owner_address">Address</th>
                <th data-field="owner_nationality">Nationality</th>
                <th data-field="owner_telephone">Telephone</th>
                <th data-field="owner_username">Username</th>
                <!-- <th data-field="owner_password">Password</th> -->
                <th data-field="owner_email">Email</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
        
        @foreach($owners as $owner)
            <tr>
            {!! Form::open(['url'=>'/admin/updateowner', 'id'=>"updateform$owner->owner_id"]) !!}
                <td width="80">
                    <span class="" id="id" data-aid="{{ $owner->owner_id }}">{{ $owner->owner_id }}</span>
                </td>
                <td width="80">
                    <span class="data-label">{{ $owner->owner_lastname }}</span>
                    {!! Form::text('lastname', $owner->owner_lastname , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $owner->owner_firstname }}</span>
                    {!! Form::text('firstname', $owner->owner_firstname , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $owner->owner_middlename }}</span>
                    {!! Form::text('middlename', $owner->owner_middlename , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $owner->owner_gender }}</span>
                    {!! Form::text('gender', $owner->owner_gender , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="150">
                    <span class="data-label">{{ $owner->owner_birthdate }}</span>
                    <input id="birthdate" value="{{ $owner->owner_birthdate }}" name="birthdate" type="date" class="datepicker hidden">       
                </td>
                <td width="500">
                    <span class="data-label">{{ $owner->owner_address }}</span>
                    {!! Form::text('address', $owner->owner_address , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $owner->owner_nationality }}</span>
                    {!! Form::text('nationality', $owner->owner_nationality , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $owner->owner_telephone }}</span>
                    {!! Form::text('telephone', $owner->owner_telephone , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $owner->owner_username }}</span>
                    {!! Form::text('username', $owner->owner_username , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="80">
                    <span class="data-label">{{ $owner->owner_email }}</span>
                    {!! Form::text('email', $owner->owner_email , ['class'=>'hidden center-align']) !!}
                </td>
                <td width="150">

                    <a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-teal grey-text text-darken-3 btn-flat edit-btn tooltipped" data-position="top" data-tooltip="Edit" name="{{ $owner->owner_id }}"><i class="material-icons left" >edit</i></a>

                    <a href="javascript:void(0)" data-position="top"  data-tooltip="Delete" style="margin-top:10px;" class="waves-effect waves-teal grey-text text-darken-3 btn-flat deleteowner-btn tooltipped" data-aid="{{ $owner->owner_id }}"><i class="material-icons left" >delete</i></a>


                    <!-- Fot editing -->
                    <a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-green green-text btn-flat update-btn hidden tooltipped" name="{{ $owner->owner_id }}" data-position="top" data-tooltip="Update"><i class="material-icons left">check</i></a>

                    <a href='javascript:void(0)'  style="margin-top:10px;" class="waves-effect waves-red red-text btn-flat cancel-btn hidden tooltipped" name="{{ $owner->owner_id }}" data-position="top" data-tooltip="Cancel"><i class="material-icons left">close</i></a>
                </td>
                {!! Form::close() !!}
            </tr>
         @endforeach
         
        </tbody>
      </table>
    </div>

        <!-- Modal Trigger -->
    <center><a href="#addowner-modal" style="margin-top:10px;" class="waves-effect waves-light btn" id="addowner-btn"><i class="material-icons left">add</i>Add More owner</a></center>

    <!--Add apartment Modal Structure -->
    <div id="addowner-modal" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="container">
        {!! Form::open(['url'=>'/admin/addowner', 'id'=>'addform']) !!}
        <div class="center-align" style="font-weight:500;font-size:32px;margin-bottom:40px !important;padding-top:20px;">Add a owner</div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">vpn_key</i>
                {!! Form::label('id') !!}
                {!! Form::text('id', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('id') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
                {!! Form::label('lastname') !!}
                {!! Form::text('lastname', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('lastname') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
                {!! Form::label('firstname') !!}
                {!! Form::text('firstname', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('firstname') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">account_circle</i>
                {!! Form::label('middlename') !!}
                {!! Form::text('middlename', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('middlename') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">accessibility</i>
                {!! Form::label('gender') !!}
                {!! Form::text('gender', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('gender') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">today</i>
                <label for="birthdate">Birth Date</label>
                <input id="birthdate" name="birthdate" type="date" class="datepicker">       
                <div class="error-input">
                    @foreach($errors->get('birthdate') as $message)
                        {{ $message }}
                    @endforeach         
                </div>
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">location_city</i>
                {!! Form::label('address') !!}
                {!! Form::text('address', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('address') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">person_outline</i>
                {!! Form::label('nationality') !!}
                {!! Form::text('nationality', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('nationality') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">contact_phone</i>
                {!! Form::label('telephone') !!}
                {!! Form::text('telephone', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('telephone') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">assignment_id</i>
                {!! Form::label('username') !!}
                {!! Form::text('username', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('username') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">lock</i>
                {!! Form::label('password') !!}
                {!! Form::password('password', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('password') as $message)
                        {{ $message }}
                    @endforeach         
                </div>           
            </div>
        </div>

        <div class="row field">
            <div class="input-field col s12">
            <i class="material-icons prefix">mail</i>
                {!! Form::label('email') !!}
                {!! Form::text('email', null ) !!}
                <div class="error-input">
                    @foreach($errors->get('email') as $message)
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
      <a href="javascript:void(0)" id="addowner" class=" modal-action modal-close waves-effect waves-green btn-flat">Add</a>
    </div>
  </div>


  <!-- Delete Modal Structure -->
    <div id="delete-modal" class="modal">
        <div class="modal-content">
           <h4>Confirm Delete</h4>
           <p>Are you sure you want to delete this owner from Database?</p>
        </div>
        <div class="modal-footer">
           <a href="javascript:void(0)" id="cancel" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancel</a>
           <a href="link" id="yes" class=" modal-action modal-close waves-effect waves-green btn-flat">Yes</a>
        </div>
        @if(!empty($errors->all()))
            <script type="text/javascript">
                 $('#addowner-modal').openModal();
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

    $('#addowner-btn').click(function(){
        $('#addowner-modal').openModal();
    });

    $('#addowner').click(function(){
        $('#addform').submit();
    });

    $('.edit-btn').click(function(){
        //var id = $('#deleteowner-btn').attr('name');
        //location.href="{{ URL::to('updateowner') }}"+'/'+id;

        $(this).parent().siblings('td').find('input').toggleClass('hidden');
        $(this).parent().siblings('td').find('.data-label').toggleClass('hidden');
        $(this).siblings('a.update-btn, a.cancel-btn, a.deleteowner-btn').toggleClass('hidden');
        $(this).toggleClass('hidden');
        $(this).parent().parent().siblings('tr').find('a.cancel-btn:visible').click();
    });

    $('.cancel-btn').click(function(e){
        e.preventDefault();

        $(this).parent().siblings('td').find('input').toggleClass('hidden')
            .each(function(i, e){
                $(e).val($(e).siblings('span').text());
            });
        $(this).parent().siblings('td').find('.data-label').toggleClass('hidden');
        $(this).siblings('a.update-btn, a.edit-btn, a.deleteowner-btn').toggleClass('hidden');
        $(this).toggleClass('hidden');
    });


    $('.deleteowner-btn').click(function(){
        var id = $(this).data('aid');
        console.log(id);
        $('#delete-modal').openModal();
        $('.modal-footer #yes').attr('href', "{{ url('admin/deleteowner') }}"+'/'+id);
    });

    $('.update-btn').click(function(){
        var apart_id = $(this).parent().siblings('td').find('#id').data('aid');
        var form = $(this).parent().parent().find('form');
        console.log(form);
        form.attr('action','{{ url("admin/updateowner") }}'+'/'+apart_id);
        form.submit();
    });
@stop