@extends('backend.receptionist')
@section('title')
Profile
@endsection

@section('content')

<div class="container">
    <div class="row">
        <section class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">User Profile</h3>
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                          </button>
                        </div>
                        <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form id="updateProfileAction" role="form" method="post" action="{{ route('rbasicinfoupdate', Auth()->user()->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input id="first_name" name="first_name" class="form-control" value="{{ $receptionists->first_name }}">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" name="last_name" class="form-control" value="{{ $receptionists->last_name }}">
                        </div>                      
                        <div class="form-group">
                            <div id="datepicker" style="display: block;">
                                <label for="birthdate">Birthday</label>
                                <input id="datepicker" name="datepicker" class="form-control hasDatepicker" required autocomplete="off" value="{{ $receptionists->birthdate }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input id="phone" name="phone" class="form-control" value="{{ $receptionists->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="cellphone">Cell Phone</label>
                            <input id="cellphone" name="cellphone" class="form-control" value="{{ $receptionists->cellphone }}">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender ?</label>
                            <select name="gender" id="gender" class="form-control">
                                <option id="gender" value="{{ $receptionists->gender }}">{{ $receptionists->gender }}</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea id="bio" name="bio" class="form-control" rows="3" value="{{ $receptionists->bio }}">{{ $receptionists->bio }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control" rows="3" value="{{ $receptionists->address }}">{{ $receptionists->address }}</textarea>
                        </div>
                        <input type="hidden" id="receptionist_id" name="receptionist_id" value="{{ $receptionists->receptionist_id }}">
                        <button type="submit" class="btn btn-primary" onclick="return comestoarraAlert( '#updateProfileAction', 'warning', '' );">Update Profile</button>
                    </form>
                </div>
                      <!-- /.card-body -->
            </div>
            <div class="card card-outline card-primary collapsed-card">
              <div class="card-header">
                  <h3 class="card-title">Login Information</h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                      </button>
                  </div>
                      <!-- /.card-tools -->
              </div>
                    <!-- /.card-header -->
              <div class="card-body">
                  <div class="form-group">
                      <label for="user_email">Email Address <a class="cbn-modal-link" href="#" data-toggle="modal" data-target="#changeEmail">change your email ?</a></label>
                      <input id="user_email" name="email" class="form-control" value="{{ Auth()->user()->email }}" disabled="">
                  </div>                         
                      <label>Username <a class="cbn-modal-link" href="#" data-toggle="modal" data-target="#changeUsername">change your username ?</a></label>
                      <div class="form-group input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text">@</span>
                          </div>
                              <input type="text" class="form-control" placeholder="Username" value="{{ Auth()->user()->name }}" disabled="">
                      </div>
                              <form id="changePasswordAction" role="form" method="post" action="#">
  
                                  <div class="col-md-6">
  
                                      <div class="form-group">
                                          <label for="reset_input_password_new">Password</label>
                                          <input id="reset_input_password_new" class="form-control" type="password" name="user_password_new" required="" autocomplete="off">
                                      </div>
  
                                  </div>
  
                                  <div class="col-md-6">
  
                                      <div class="form-group">
                                          <label for="reset_input_password_repeat">Conform Password</label>
                                          <input id="reset_input_password_repeat" class="form-control" type="password" name="user_password_repeat" required="" autocomplete="off">
                                      </div>
  
                                  </div>
  
                                      <input type="hidden" id="patient_id" name="patient_id" value="{{ Auth()->user()->id }}">
                                      <input type="hidden" id="user_name" name="user_name" value="{{ Auth()->user()->name }}">
  
                                  <div class="col-md-6">
  
                                      <button type="submit" class="btn btn-danger" onclick="return comestoarraAlert( '#changePasswordAction', 'warning', '' );">Change Password</button>
  
                                  </div>
  
                                      <input type="hidden" name="382969d51fc6fef8efe8deaedb8206d793490c3efb78fc7a4902029c065c1c58" value="3feb1addf7926441668269557caa2c170a2c3cf6">
  
                              </form>        
  
                                  <!-- Change Email Modal -->
                              <div class="modal fade" id="changeEmail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              {{-- <a class="close" data-dismiss="modal" aria-hidden="true">×</a> --}}
                                              <h4 class="modal-title" id="myModalLabel">Change Email Address</h4>
                                          </div>
  
                                      <form action="{{ route('emailupdate', Auth()->user()->id) }}" method="post" role="form">
                                          {{ csrf_field() }}
                                          {{ method_field('POST') }}
                                          <div class="modal-body">
  
                                              <div class="form-group">
                                                  <label for="user_email">New Email Address</label>
                                                  <input id="user_email" class="form-control" type="text" name="user_email" required="">
                                                  <p class="help-block">Please provide an valid Email Address !</p>
                                              </div>
  
                                          </div>
                                              <input type="hidden" id="patient_id" name="patient_id" value="{{ Auth()->user()->id }}">
                                              <input type="hidden" id="user_name" name="user_name" value="{{ Auth()->user()->name }}">
                                          <div class="modal-footer">
  
                                              <a class="btn btn-danger" data-dismiss="modal">Close</a>
                                              <button type="submit" class="btn btn-success">Submit</button>
  
                                          </div>
  
                                              <input type="hidden" name="382969d51fc6fef8efe8deaedb8206d793490c3efb78fc7a4902029c065c1c58" value="3feb1addf7926441668269557caa2c170a2c3cf6">
  
                                      </form>
  
                                      </div>
                                          <!-- /.modal-content -->
                                  </div>
                                      <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->
  
                                  <!-- Change Username Modal -->
                                  <div class="modal fade" id="changeUsername" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  {{-- <a class="close" data-dismiss="modal" aria-hidden="true">×</a> --}}
                                                  <h4 class="modal-title" id="myModalLabel">Change Username : @patient</h4>
                                              </div>
                                              <form action="{{ route('usernameupdate', Auth()->user()->id) }}" method="post" role="form">
                                                  {{ csrf_field() }}
                                                  {{ method_field('POST') }}
                                                  <div class="modal-body">
  
                                                      <div class="form-group input-group">
                                                          <span class="input-group-addon">@</span>
                                                          <input type="text" class="form-control" placeholder="New Username" name="user_name" required="">
                                                      </div>
  
                                                  </div>
  
                                                  {{-- <input type="hidden" id="patient_id" name="patient_id" value="17">
                                                  <input type="hidden" id="user_email" name="user_email" value="jane@doe.com"> --}}
                                                  <div class="modal-footer">
  
                                                      <a class="btn btn-danger" data-dismiss="modal">Close</a>
                                                      <button type="submit" class="btn btn-success">Submit</button>
  
                                                  </div>        
                                              </form>
                                          </div>
                                          <!-- /.modal-content -->
                                      </div>
                                      <!-- /.modal-dialog -->
                                  </div>
                                  <!-- /.modal -->
  
                              
                    </div>
                    <!-- /.card-body -->
          </div>
        </section>
        <div class="col-md-4">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Profile Picture</h3>
              </div>
              <div class="card-body">
                <p align="center"><img src="{{ asset('storage/receptionistprofileimage/' .$receptionists->avatar) }}" alt="" width="200px"></p>
                            <hr>
                            <p align="center">
                                <strong>
                                {{ $receptionists->first_name .' '.$receptionists->last_name}}
                                </strong>
                            </p>
                            <hr>
                            <p align="center">
                                <strong>#DCAS - 19870116 - P17</strong>
                            </p>

                            <form id="uploadAvatarAction" action="{{ route('imageupdate', Auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                                <span id="avatar_button" class="btn btn-block btn-default btn-file" rel="tooltip" data-placement="bottom" title="Select an avatar image from your hard-disk, only .jpg">
                                    UPLOAD NEW AVATAR <input type="file" id="avatar_file" name="avatar" required="">
                                </span>
                                {{ csrf_field() }}
                                <input type="hidden" name="MAX_FILE_SIZE" value="5000">
                                <input type="hidden" id="patient_id" name="patient_id" value="{{ Auth()->user()->id }}">
                                <input type="hidden" id="first_name" name="first_name" value="{{ $receptionists->first_name }}">
                                <input type="hidden" id="last_name" name="last_name" value="{{ $receptionists->last_name }}">
                                <input type="hidden" id="user_name" name="user_name" value="{{ Auth()->user()->name }}">
                                <input type="hidden" id="user_email" name="user_email" value="{{ Auth()->user()->email }}">
                                <output id="cbn_avatar_list"></output>
                                <input type="submit" id="avatar_upload" onclick="return comestoarraAlert( '#uploadAvatarAction', 'warning', '' );" class="btn btn-block btn-success" value="UPLOAD NEW AVATAR" style="display: none;">
                                <a id="avatar_upload_cancel" onclick="reload()" class="btn btn-block btn-danger" style="display: none;">CANCEL</a>
                            </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
    </div>
    </div>
</div>

@endsection