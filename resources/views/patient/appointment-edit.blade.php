@extends('backend.index')
@section('title')
Appointment Edit
@endsection

@section('content')
<div class="container">
        <div class="col-md-10">
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title"><i class="fa fa-calendar"></i> Appointment Edit</h3>
                  </div>
                  <div class="card-body">
                        <form action="{{ route('p-appointmentedit') }}" method="post" role="form">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="modal-body">
                                {{-- {{ $appointment->appointment_id }} --}}
                                <div class="form-group">
                                    <label for="patient_id">Patient</label>
                                <input type="text" name="patient_id" value="{{ Auth::user()->name }}" class="form-control">
                                </div>
                    
                                <div id="appointment_type" class="form-group" style="display: block;">
                                    <label for="type">Appointment Type</label>
                                    <select name="type" value="{{ $appointment->type }}" id="type" class="form-control">
                                        <option value="NewAppointment">New Appointment</option>
                                        <option value="RecallAppointment">Recall Appointment</option>
                                    </select>
                                </div>
                    
                                <div id="all_dentist" class="form-group" style="display: block;">
                                    <label for="dentist_id">Dentist</label>
                                    <select name="dentist_id" id="dentist_id" class="form-control">
                                        <option id="select_dentist" value="">-select one-</option>
                                        @foreach($dentists as $dent)
                        <option value="{{ $dent->dentist_id }}" 
                          <?php if ($dent->dentist_id == $appointment->dentist_id): ?>
                            selected
                          <?php endif ?>
                        >{{ $dent->user_name }}</option>
                      @endforeach
                                        {{-- @foreach ($dentists as $item)  
                                          <option name="dentist_id" id="dentist_id" value="{{$item->dentists_id}}">{{$item->first_name .' '. $item->last_name}}</option>
                                        @endforeach --}}
                                    </select>
                                </div>
                    
                                <div id="dentist_time_table_ajax" class="form-group" style="display: block;">
                                    <label for="timetable">Dentist Time Table</label>
                                    <select name="dentist_timetable" id="dentist_timetable" class="form-control">
                                            <option id="select_timetable" value="{{ $appointment->start }}">{{ $appointment->start }}</option>
                                                <option name="dentist_timetable" id="dentist_timetable">Sunday | Appointment Only</option>
                                                <option name="dentist_timetable" id="dentist_timetable">Monday | 09:00 - 15:00</option>
                                                <option name="dentist_timetable" id="dentist_timetable">Tuesday | 15:00 - 19:00</option>
                                                <option name="dentist_timetable" id="dentist_timetable">Wednesday | 14:00 - 20:00</option>
                                                <option name="dentist_timetable" id="dentist_timetable">Thursday | 10:00 - 14:00</option>
                                                <option name="dentist_timetable" id="dentist_timetable">Friday | Appointment Only</option>
                                                <option name="dentist_timetable" id="dentist_timetable">Saturday | Appointment Only</option>
                                        </select>
                                </div>
                    
                                <div class="form-group">
                                    <div id="datepicker" style="display: block;">
                                        <label for="appointment_date_pick">Appointment Date</label>
                                    <input id="datepicker" class="form-control hasDatepicker" type="text" name="datepicker" required="" autocomplete="off" value="{{ $appointment->appointment_date }}">
                                        {{-- {{Form::text('date', '', array('id' => 'datepicker'))}} --}}
                                    </div>
                                </div>
                    
                                <div id="dentist_day_selected" style="display: block;"> 
                                    <p class="help-block">Dentist time table on  
                                        <span class="label label-primary">thursday</span> was at : 
                                        <span class="label label-primary">10:00 - 14:00</span>
                                    </p>4 hours<br><hr>
                                    <div class="form-group">
                                        <label for="appointment_time_pick">Appointment Time Available</label>
                                        <hr>
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="10:00"{{ $appointment->appointment_time == '10:00' ? 'checked' : ''}}> 10:00&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="10:30"{{ $appointment->appointment_time == '10:30' ? 'checked' : ''}}> 10:30&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="11:00"{{ $appointment->appointment_time == '11:00' ? 'checked' : ''}}> 11:00&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="11:30"{{ $appointment->appointment_time == '11:30' ? 'checked' : ''}}> 11:30&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="12:00"{{ $appointment->appointment_time == '12:00' ? 'checked' : ''}}> 12:00&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="12:30"{{ $appointment->appointment_time == '12:30' ? 'checked' : ''}}> 12:30&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="13:00"{{ $appointment->appointment_time == '13:00' ? 'checked' : ''}}> 13:00&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="13:30"{{ $appointment->appointment_time == '13:30' ? 'checked' : ''}}> 13:30&nbsp;&nbsp;&nbsp;
                                        <input type="radio" id="appointment_time_pick" name="appointment_time_pick" value="14:00"{{ $appointment->appointment_time == '14:00' ? 'checked' : ''}}> 14:00&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                    
                                <div id="appointment_notes" class="form-group" style="display: block;">
                                    <label for="notes">Notes</label>
                                <textarea name="notes" id="notes" class="form-control" style="height: 120px;" value="{{ $appointment->notes }}">{{ $appointment->notes }}</textarea>
                                </div>
                    
                            </div>
                            <div id="appointment_footer" class="modal-footer" style="display: block;">
                    
                                <a href="/dashboard" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                <button type="submit" class="btn btn-success pull-left">Update</button>
                    
                            </div>
                    
                            <input type="hidden" name="382969d51fc6fef8efe8deaedb8206d793490c3efb78fc7a4902029c065c1c58" value="fad1be8d2aa21f42e2133b0d30a1e37e20a7deb1">
                    
                        </form>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
</div>
@endsection