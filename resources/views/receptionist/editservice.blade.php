@extends('backend.receptionist')
@section('title')
Edit Services
@endsection

@section('content')
<div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header">
                <h3>Edit Services <a href="{{ route('services.index')}}" class="btn btn-info float-right">Back</a></h3>        
              </div>
              <br>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9">
                    <form action="{{ route('services.update', $services->id) }}" method="post" id="dynamic-form">   
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      {{ method_field('PUT')}}
                      <div class="form-group row">
                            <label for="service-name" class="col-form-label">Service Name</label>
                            <input type="text" name="name" class="form-control" id="service-name" value="{{ $services->name }}">
                        </div>
                        <div class="form-group row">
                            <label for="sub-service-name" class="col-form-label">Sub-Service Name</label>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="70%">Sub-Service Name</th>
                                        <th width="25%">Rate</th>
                                        <th width="5%"><a href="#" class="btn btn-block btn-info btn-sm addRow">+</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($services->subservice as $items)
                                  <input type="hidden" name="service_id" value="{{ $items->service_id }}"> 
                                  <input type="hidden" name="subservice_id[]" value="{{ $items->id }}"> 
                                  <tr>
                                      <td><input type="text" name="subname[]" class="form-control" id="subservicename" value="{{ $items->subname }}"></td>
                                      <td><input type="text" name="rate[]" class="form-control" id="rate" value="{{ $items->rate }}"></td>
                                      <td><a href="#" class="btn btn-block btn-danger btn-sm remove">-</a></td>
                                  </tr>                                      
                                  @endforeach
                                </tbody>
                            </table>
                         </div>
                      <input type="submit" class="btn btn-info" value="Update">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div>
</div>

<script type="text/javascript">
    $('.addRow').on('click', function(){
        addRow();
    });

    function addRow(){
        var tr = '<tr>'+
                        '<td><input type="text" name="subname[]" class="form-control" id="subservicename"></td>'+
                        '<td><input type="text" name="rate[]" class="form-control" id="rate"></td>'+
                        '<td><a href="#" class="btn btn-block btn-danger btn-sm remove">-</a></td>'+
                    '</tr>';
            $('tbody').append(tr);        
    };

    $('tbody').on('click', '.remove', function(){
        $(this).parent().parent().remove();
    });
</script>

@endsection