@extends('backend.receptionist')
@section('title')
Services
@endsection

@section('content')
    
<div class="container">
    <div class="col-md-12">
    <h4 style="font-size: 2.2rem">Service List <a href="{{ route('services.create') }}" class="btn btn-primary float-right">Add New Service</a></h4>  
    <br>
       <table class="table table-bordered bg-light">
                      <div class="row form-inline mb-3 col-md-12">
                         <div class="col-sm-12 col-md-6">
                            <div id="example1_filter" class="dataTables_filter">
                               <label class="float-left">Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1">
                               </label>
                            </div>
                         </div>
                      </div>
                   <thead class="bg-black">
                      <tr>
                      <th>S.No.</th>
                      <th>Service Name</th>
                      <th>Sub-Service Name</th>
                      <th>Rate</th>
                      <th width="150px">Action</th>
                   </tr>
                   </thead>
                   <tbody>
                        <?php $i = 1; ?>
                     @foreach ($services as $item)
                        @foreach ($item->subservice as $items)
                        <tr>
                           <td>{{ $i++ }}</td>
                           <td>{{ $item->name }}</td>
                           <td>{{ $items->subname }}</td>
                           <td>{{ $items->rate}}</td>
                           <td>
                              <form onsubmit="return confirm('Do you really want to delete?');" action="{{ route('services.destroy', $item->id) }}" method="POST">
                                 <a href="{{ route('services.edit', $item->id) }}" class="btn btn-info">Edit</a>&nbsp;
                                 {{ csrf_field() }}
                                 {{ method_field('DELETE') }}
                                 <button type="submit" class="btn btn-danger">Delete</button>
                              </form>   
                           </td>
                        </tr>
                        @endforeach
                     @endforeach
                   </tbody>
       </table>
     </div>
</div>

@endsection