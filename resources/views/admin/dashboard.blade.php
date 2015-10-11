@extends('layout.master')

@section('htmlclass')
<html>
@stop

@section('title')
	Admin Dashboard
@stop

@section('nav-desktop')
	<li class="active"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
      <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
      <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
      <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
      <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
      <li><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
      <li><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('nav-mobile')
	<li class="active"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
      <li><a href="{{ url('admin/manageowner') }}">Owners</a></li>
      <li><a href="{{ url('admin/manageapartment') }}">Apartments</a></li>
      <li><a href="{{ url('admin/manageblock') }}">Blocks</a></li>
      <li><a href="{{ url('admin/manageindi') }}">Individual Apartments</a></li>
      <li><a href="{{ url('admin/manageallotment') }}">Apartment Allotment</a></li>
      <li><a href="javascript:void(0)">Receipts</a></li>
@stop

@section('bodyclass')
	<body style="background-color:rgb(248,248,248)">
@stop

@section('body')
      <div class="divcenter center-align table-title z-depth-1" style="font-size:36px;margin-top:30px;font-weight:500;"><p>Dashboard</p></div>

      <div class="clearfix"> 
            
            <div class="new_entries z-depth-1">
            <div class="table-heading"><i class="material-icons left">access_time</i>New Apartment</div>
            <table class="bordered responsive-table centered">
                  <thead>
                       <tr>
                              <th data-field="id">ID</th>
                              <th data-field="name">Name</th>
                              <th data-field="cstatus">Construction Status</th>
                              <th data-field="pstatus">Payment Status</th>
                              <th data-field="address">Address</th>
                       </tr>
                  </thead>

                  <tbody>
                        <?php $counter=0; $apartments ?>
                        @foreach($apartments as $apartment)
                              @if($counter<3)
                        <tr>
                              <td>{{ $apartment->apartment_id }}</td>
                              <td>{{ $apartment->apartment_name }}</td>
                              <td>{{ $apartment->apartment_construction_status }}</td>
                              <td>{{ $apartment->apartment_payment_status }}</td>
                              <td>
                                    <!-- Cutting the string when comma is met -->
                                    <?php 
                                          $firststring = explode(",", $apartment->getBlockAddress->block_address);
                                          echo $firststring[0]."...";
                                     ?>
                              </td>
                        </tr>
                              <?php $counter++; ?>
                              @endif
                        @endforeach
                        <tr>
                              <td colspan="5"><center><a href="javascript:void(0)">View All</a></center></td>
                        </tr>
                  </tbody>
            </table>
            </div>

            <div class="new_entries z-depth-1">
            <div class="table-heading"><i class="material-icons left">access_time</i>New Client</div>
            <table class="bordered responsive-table centered">
                  <thead>
                       <tr>
                              <th data-field="id">ID</th>
                              <th data-field="name">Name</th>
                              <th data-field="gender">Gender</th>
                              <th data-field="birthdate">Birthdate</th>
                              <th data-field="telephone">Telephone</th>
                              <th data-field="address">Email</th>
                       </tr>
                  </thead>

                  <tbody>
                        <?php $counter=0; ?>
                        @foreach($owners as $owner)
                              @if($counter<3)
                        <tr>
                              <td>{{ $owner->owner_id }}</td>
                              <td>{{ $owner->owner_lastname }}, {{ $owner->owner_firstname }} <?php echo strtoupper($owner->owner_middlename[0]."."); ?></td>
                              <td>{{ $owner->owner_gender }}</td> 
                              <td>{{ $owner->owner_birthdate }}</td>
                              <td>{{ $owner->owner_telephone }}</td>
                              <td>{{ $owner->owner_email }}</td>
                        </tr>
                              <?php $counter++; ?>
                              @endif
                        @endforeach
                        <tr>
                              <td colspan="6"><center><a href="javascript:void(0)">View All</a></center></td>
                        </tr>
                  </tbody>
            </table>
            </div>
      </div>

      <div class="latest_receipts z-depth-1">
      <div class="table-heading-onecolumn"><i class="material-icons left">access_time</i>Latest Receipts</div>
      <table class="bordered responsive-table centered">
            <thead>
                 <tr>
                        <th data-field="id">ID</th>
                        <th data-field="name">Name</th>
                        <th data-field="cstatus">Construction Status</th>
                        <th data-field="pstatus">Payment Status</th>
                        <th data-field="address">Address</th>
                 </tr>
            </thead>

            <tbody>
                  <?php $counter=0; ?>
                  @foreach($apartments as $apartment)
                        @if($counter<3)
                  <tr>
                        <td>{{ $apartment->apartment_id }}</td>
                        <td>{{ $apartment->apartment_name }}</td>
                        <td>{{ $apartment->apartment_construction_status }}</td>
                        <td>{{ $apartment->apartment_payment_status }}</td>
                        <td>
                              <!-- Cutting the string when comma is met -->
                              <?php 
                                    $firststring = explode(",", $apartment->getBlockAddress->block_address);
                                    echo $firststring[0]."...";
                               ?>
                        </td>
                  </tr>
                        <?php $counter++; ?>
                        @endif
                  @endforeach
                  <tr>
                        <td colspan="5"><center><a href="javascript:void(0)">View All</a></center></td>
                  </tr>
            </tbody>
      </table>
      </div>
@stop