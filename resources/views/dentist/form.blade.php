@extends('layouts.dentist')
@section('title')    
@endsection
@section('content')
<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header">Dentist Form</div>
            <div class="card-body">
                    <form enctype="multipart/form-data">
                            <div class="form-group row">
                              <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control mt-1" name="firstName" placeholder="first Name">
                                <input type="text" class="form-control mt-1" name="MiddleName" placeholder="Middle Name">
                                <input type="text" class="form-control mt-1" name="LastName" placeholder="Last Name">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputPassword" class="col-sm-2 col-form-label">Address</label>
                              <div class="col-sm-10">
                                <input type="text" class="form-control" name="Address">
                              </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Bio</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="Bio">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Avatar</label>
                                    <div class="col-sm-10">
                                      <input type="file" class="form-control" name="avatar">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Specialities</label>
                                    <div class="col-sm-10">
                                      <select name="specialities" class="form-control">
                                          <option value="General Dentistry">General Dentistry</option>
                                          <option value="Dental Public Health">Dental Public Health</option>
                                          <option value="Endodontics">Endodontics</option>
                                          <option value="Oral and Maxillofacial Surgery">Oral and Maxillofacial Surgery</option>
                                          <option value="Oral Medicine and Pathology">Oral Medicine and Pathology</option>
                                          <option value="Orthodontics and Dentafacial Orthopedics">"Orthodontics and Dentafacial Orthopedics</option>
                                          <option value="Oral $Maxillofacial Radiology">Oral $Maxillofacial Radiology</option>
                                          <option value="Periodontics">Periodontics</option>
                                          <option value="Proshtodontics">Proshtodontics</option>
                                      </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="phone">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Cell Phone</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" name="cellphone">
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Gender</label>
                                    <div class="col-sm-10">
                                            <select name="specialities" class="form-control">
                                                    <option value="0">Male</option>
                                                    <option value="1">female</option>
                                                    <option value="2">other</option>
                                            </select>
                                    </div>
                            </div>
                            <div class="form-group row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Birth Date</label>
                                    <div class="col-sm-10">
                                      <input type="date" class="form-control" name="birthdate">
                                    </div>
                            </div>
                          </form>
            </div>
        </div>
        
    </div>
</div>


@endsection