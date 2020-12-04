@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patient Information') }}</div>

                <div class="card-body">
                <form action="{{ route('patient.register') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{-- {{ method_field('POST') }} --}}
                  <div class="form-group row">
                    <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                  <label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                  <div class="col-md-6">
                      <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}" required autocomplete="middle_name" autofocus>

                      @error('middle_name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
                    <div class="form-group row">
                      <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>
      
                      <div class="col-md-6">
                          <input type="file" name="avatar">
                          @error('avatar')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                    <div class="form-group row">
                      <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
  
                      <div class="col-md-6">
                          <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
  
                          @error('address')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                  <label for="cellphone" class="col-md-4 col-form-label text-md-right">{{ __('Cellphone') }}</label>

                  <div class="col-md-6">
                      <input id="cellphone" type="text" class="form-control @error('cellphone') is-invalid @enderror" name="cellphone" value="{{ old('cellphone') }}" required autocomplete="cellphone" autofocus>

                      @error('cellphone')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
                    <div class="form-group row">
                      <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
  
                      <div class="col-md-6">
                          
                          <input type="radio" name="gender" value="male" >Male <input type="radio" name="gender" value="female"> Female
                          @error('gender')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                    <div class="form-group row">
                      <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>
  
                      <div class="col-md-6">
                          <textarea id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') }}" required autocomplete="bio" autofocus></textarea>
  
                          @error('bio')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                  <div class="form-group row">
                    <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>

                    <div class="col-md-6">
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                    <div class="form-group row mb-0">
                      <div class="col-md-6 offset-md-4">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Submit') }}
                          </button>
                      </div>
                  </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
