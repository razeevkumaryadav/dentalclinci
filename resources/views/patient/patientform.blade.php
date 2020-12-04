@extends('backend.index')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in PATIENT Dashboard!
                </div>
                
            </div>
        </div>
    </div> --}}
    <div class="col-md-9">
        <div class="card card-outline card-danger">
          <div class="card-header">
            <h3 class="card-title">Patient Form</h3>
          </div>
          <div class="card-body">
          <form action="{{ route('patientsave')}}" method="post" enctype="multipart/form-data">
            @csrf
                    <div class="form-group row">
                        <label for="first_name" class="col-md-3 col-form-label text-md-left">First Name</label>
                        <div class="col-md-6">
                          <input type="text" name="first_name" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="middle_name" class="col-md-3 col-form-label text-md-left">Middle Name</label>
                        <div class="col-md-6">
                        <input type="text" name="middle_name" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="last_name" class="col-md-3 col-form-label text-md-left">Last Name</label>
                        <div class="col-md-6">
                        <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="avatar" class="col-md-3 col-form-label text-md-left">Avatar</label>
                            <div class="col-md-6">
                            <input type="file" name="image">
                          </div> 
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-md-3 col-form-label text-md-left">Address</label>
                        <div class="col-md-6">
                        <input type="text" name="address" class="form-control">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="phone" class="col-md-3 col-form-label text-md-left">Phone</label>
                      <div class="col-md-6">
                      <input type="text" name="phone" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="cellphone" class="col-md-3 col-form-label text-md-left">Cellphone</label>
                    <div class="col-md-6">
                    <input type="text" name="cellphone" class="form-control">
                  </div>
                </div>
                    <div class="form-group row">
                        <label for="gender" class="col-md-3 col-form-label text-md-left">Gender</label>
                        <div>
                        <input type="radio" name="gender" value="male" >Male <input type="radio" name="gender" value="female"> Female
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="bio" class="col-md-3 col-form-label text-md-left">Bio</label>
                        <div class="col-md-6">
                        <textarea name="bio" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthdate" class="col-md-3 col-form-label text-md-left">Birthdate</label>
                        <div class="col-md-6">
                        <input id="datepicker" class="form-control hasDatepicker" type="text" name="datepicker" required="" autocomplete="off">
                      </div>
                    </div>
                    <input type="submit" class="btn btn-info" value="Submit">
                    {{-- @if(count($errors))
                      <div class="form-group">
                        <div class="alert alert-danger">
                          <ul>
                            @foreach($errors->all() as $error)
                              <li>{{$error}}</li>
                            @endforeach
                          </ul>
                        </div>
                      </div>
                    @endif --}}
                </form>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
</div>
@endsection