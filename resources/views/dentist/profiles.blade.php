@extends('backend.dentists')
@section('title')
    Doctor | Profile
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            @foreach ($dentist as $dent)
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{asset($dent->avatar)}}"
                       alt="User profile picture">
                </div>
                 
                <h3 class="profile-username text-center">{{$dent->first_name}} {{$dent->middle_name}} {{$dent->last_name}}</h3>

                <p class="text-muted text-center">{{$dent->specialities}}</p>

                <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">Upload Image</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{route('image.upload',['id'=>Auth()->user()->dentist->id])}}" method="POST" enctype="multipart/form-data" >
        @csrf
        
           <label for="avatar" class="col-md-6">Image Upload</label>
           <input type="file" name="image" class="col-md-6">
           <button class="btn btn-primary mb-2" type="submit">Upload Image</button>
         </form>
    </div>
  </div>
</div>
              </div>
              <!-- /.card-body -->
            </div>
           @endforeach
           {{-- <span>
            <form action="{{route('image.upload',['id'=>1])}}" method="POST" enctype="multipart/form-data" >
             @csrf
             
                <label for="avatar" class="col-md-6">Image Upload</label>
                <input type="file" name="avatar" class="col-md-6">
              </form>
            </span> --}}
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Profile</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timetable" data-toggle="tab">Time Table</a></li>
                  <li class="nav-item"><a class="nav-link" href="#loginformation" data-toggle="tab">Login Information</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  @foreach ($dentist as $dent)
                      
                  
                        <div class="active tab-pane" id="settings">
                        <form class="form-horizontal" action="{{route('dentist.profile.update',['id'=>Auth()->user()->dentist->id])}}" method="POST">
                          @csrf
                                  <div class="form-group row">
                                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="Name" value="{{$dent->first_name}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value=" {{$dent->middle_name}}">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="last_name" placeholder="Name" value=" {{$dent->last_name}}">
                                        </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Birthday</label>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" name="birthdate" value="{{$dent->birthdate}}" >
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Phone" value="{{$dent->phone}}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputExperience" class="col-sm-2 col-form-label">Cell Phone</label>
                                    <div class="col-sm-10">
                                    <input class="form-control" name="cellphone" placeholder="cell phone" value="{{$dent->cellphone}}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputSkills" class="col-sm-2 col-form-label">Specialties</label>
                                    <div class="col-sm-10">
                                    <select class="form-control">
                                    <option value="{{$dent->specialities}}">{{$dent->specialities}}</option>
                                    </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Biography</label>
                                        <div class="col-sm-10">
                                        <textarea class="form-control" name="bio" placeholder="Biography" value="{{$dent->bio }}">{{$dent->bio }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                              <textarea class="form-control" name="address" placeholder="Address">{{$dent->address }}</textarea>
                                            </div>
                                     </div>
                            
                                  <div class="form-group row">
                                    <div class="offset-sm-10 col-sm-10 ">
                                      <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                  </div>
                                  
                                </form>
                              </div>
                  <div class=" tab-pane" id="timetable">
                  
                    
                   
                   
                    @if (count($dent->timetable)>0)
                    <form class="form-horizontal"method="post" action="{{route('dentist.timetable.update',['id'=>Auth()->user()->dentist->id])}}">  
                      @csrf
                    @foreach ($dent->timetable as $item)
                    <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">{{$item->day}}</label>
                        <div class="col-sm-4">
                        <input type="hidden" name="day[]" value="{{$item->day}}">
                        <input type="time" name="start[]" class="form-control" value="{{$item->start}}">
                        </div> 
                        <div class="col-sm-2 text-center">-</div>
                        <div class="col-sm-4">
                        <input type="time" name="end[]" class="form-control" value="{{$item->end }}"">
                          </div>
                    </div>
                    @endforeach
                    
                    <div class="form-group row">
                      <div class="offset-sm-10 col-sm-10 ">
                        <button type="submit" class="btn btn-success">Update</button>
                      </div>
                    </div>
              
               
              
                  </form>

                    @else
                    <form class="form-horizontal"method="post" action="{{route('dentist.timetable.create',['id'=>Auth()->user()->dentist->id])}}">
                    
                      @csrf
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Sunday</label>
                        <div class="col-sm-4">
                             <input type="hidden" name="day[]" value="Sunday">
                        <input type="time" name="start[]" class="form-control">
                        </div> 
                        <div class="col-sm-2 text-center">-</div>
                        <div class="col-sm-4">
                        <input type="time" name="end[]" class="form-control" value="">
                          </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Monday</label>
                              <div class="col-sm-4">
                                  <input type="hidden" name="day[]" value="Monday">
                                    <input type="time" name="start[]" class="form-control">
                              </div> 
                              <div class="col-sm-2 text-center">-</div>
                              <div class="col-sm-4">
                                      <input type="time" name="end[]" class="form-control">
                              </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Tuesday</label>
                              <div class="col-sm-4">
                                  <input type="hidden" name="day[]" value="Tuesday">
                                    <input type="time" name="start[]" class="form-control">
                              </div> 
                              <div class="col-sm-2 text-center">-</div>
                              <div class="col-sm-4">
                                      <input type="time" name="end[]" class="form-control">
                              </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Wednesday</label>
                              <div class="col-sm-4">
                                  <input type="hidden" name="day[]" value="Wednesday">
                                    <input type="time" name="start[]" class="form-control">
                              </div> 
                              <div class="col-sm-2 text-center">-</div>
                              <div class="col-sm-4">
                                      <input type="time" name="end[]" class="form-control">
                              </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Thursday</label>
                              <div class="col-sm-4">
                                  <input type="hidden" name="day[]" value="Thursday">
                                    <input type="time" name="start[]" class="form-control">
                              </div> 
                              <div class="col-sm-2 text-center">-</div>
                              <div class="col-sm-4">
                                      <input type="time" name="end[]" class="form-control">
                              </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Friday</label>
                              <div class="col-sm-4">
                                  <input type="hidden" name="day[]" value="Friday">
                                    <input type="time" name="start[]" class="form-control">
                              </div> 
                              <div class="col-sm-2 text-center">-</div>
                              <div class="col-sm-4">
                                      <input type="time" name="end[]" class="form-control">
                              </div>
                    </div>
                    <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label text-danger">Saturday</label>
                              <div class="col-sm-4">
                                  <input type="hidden" name="day[]" value="Saturday">
                                    <input type="time" name="start[]" class="form-control">
                              </div> 
                              <div class="col-sm-2 text-center">-</div>
                              <div class="col-sm-4">
                                      <input type="time" name="end[]" class="form-control">
                              </div>
                    </div>
                    
                    <div class="form-group row">
                      <div class="offset-sm-10 col-sm-10 ">
                        <button type="submit" class="btn btn-success">Update</button>
                      </div>
                    </div>
              
               
              
                  </form>
                        
                  @endif
                        
                    
                    
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="loginformation">
                    <!-- The timeline -->
                    <form class="form-horizontal" action="{{route('dentist.change.password',['id'=>Auth()->user()->dentist->id])}}" method="post">
                      @csrf
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                              <input type="email" class="form-control" id="inputName" placeholder="Email" value="{{ $dent->user->email}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">User Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="username" placeholder="username" value="{{ $dent->user->name}}">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputName2" class="col-sm-2 col-form-label">Old Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="old_password" placeholder="old password">
                              </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                      <input type="password" class="form-control" name="new_password" placeholder="new password">
                                    </div>
                                  </div>
                           
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                              <span class="text-primary">inorder to change password please enter the old and new password</span>
                            </div>
                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Update</button>
                              </div>
                            </div>
                          </form>
                  </div>
                  @endforeach
                  <!-- /.tab-pane -->

                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection