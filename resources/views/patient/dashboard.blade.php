@extends('backend.index')
@section('title')
Dashboard
@endsection

{{-- @section('profile_image')
  @foreach ($patients as $row)
    <img src="{{ asset('storage/patientprofile/' .$row->avatar) }}" class="img-circle elevation-2" alt="User Image">
  @endforeach
@endsection --}}

@section('content')
<div class="row">
   <div class="col-lg-3 col-6">
     <!-- small box -->
     <div class="small-box bg-info">
       <div class="inner">
         <h3>150</h3>

         <p>Dentists</p>
       </div>
       <div class="icon">
         <i class="ion ion-man"></i>
       </div>
       <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
     </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-6">
     <!-- small box -->
     <div class="small-box bg-success">
       <div class="inner">
         <h3>53<sup style="font-size: 20px">%</sup></h3>

         <p>Bounce Rate</p>
       </div>
       <div class="icon">
         <i class="ion ion-stats-bars"></i>
       </div>
       <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
     </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-6">
     <!-- small box -->
     <div class="small-box bg-warning">
       <div class="inner">
         <h3>44</h3>

         <p>User Registrations</p>
       </div>
       <div class="icon">
         <i class="ion ion-person-add"></i>
       </div>
       <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
     </div>
   </div>
   <!-- ./col -->
   <div class="col-lg-3 col-6">
     <!-- small box -->
     <div class="small-box bg-danger">
       <div class="inner">
         <h3>65</h3>
{{-- @foreach ($times as $time) --}}
<p>{{ $times }}</p>
{{-- @endforeach --}}
      
       </div>
       <div class="icon">
         <i class="ion ion-pie-graph"></i>
       </div>
       <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
     </div>
   </div>
   <!-- ./col -->
 </div>

<div class="container">
      <div class="col-md-12">
      <h4 style="font-size: 2.2rem">All Appointment List <a href="/appointment" class="btn btn-primary float-right">Add New Appointment</a></h4>  
      <br>
         <table class="table table-bordered bg-light">
                        <div class="row form-inline mb-3 col-md-12">
                           <div class="col-sm-12 col-md-6">
                              <div class="dataTables_length" id="example1_length">
                                 <label class="float-left">Show 
                                    <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm">
                                       <option value="10">10</option>
                                       <option value="25">25</option>
                                       <option value="50">50</option>
                                       <option value="100">100</option>
                                    </select> 
                                    entries
                                 </label>
                              </div>
                           </div>
                           <div class="col-sm-12 col-md-6">
                              <div id="example1_filter" class="dataTables_filter">
                                 <label class="float-right">Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                                 </label>
                              </div>
                           </div>
                        </div>
                     <thead class="bg-black">
                        <tr>
                        <th>S.No.</th>
                        <th>Dentist</th>
                        <th>Schedule</th>
                        <th>Notes</th>
                        <th>Dentist Notes</th>
                        <th width="150px">Action</th>
                     </tr>
                     </thead>
                     <tbody>
                           <?php $i = 1; ?>
                           @foreach ($appointments as $row)
                        <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $row->dentist->user_name }}</td>
                           <td>{{ $row->appointment_date }} <span>at</span> {{ $row->appointment_time }}</td>
                           <td>{{ $row->notes }}</td>
                           <td>{{ $row->notes_dentist }}</td>
                        <td><a href="/appointment-edit/{{ $row->appointment_id }}" class="btn btn-info">Edit</a>&nbsp;
                           <a href="/appointment-delete/{{ $row->appointment_id }}" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                     </tbody>
         </table>
       </div>
   </div>
@endsection