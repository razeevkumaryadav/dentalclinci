@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Receptionist Information') }}</div>

                <div class="card-body">
                    <form action="{{ route('receptionist.register') }}" method="post" enctype="multipart/form-data">
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
                              <input type="file" class="form-control-file" name="avatar">
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
                        
                        <input type="radio" name="gender" value="male" >Male <input type="radio" name="gender" value="female"> Female
                      
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
                        <input id="date" class="form-control" type="date" name="date" required="" autocomplete="off">
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
