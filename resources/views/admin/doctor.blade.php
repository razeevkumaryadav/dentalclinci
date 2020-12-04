@extends('backend.admin')
@section('title')
Doctors
@endsection

@section('content')
    
<div class="container">
    <div class="col-md-12">
        <h4 style="font-size: 2.2rem">All Doctor List </h4>  
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
                  <label class="float-right">Search:<input type="search" name="search" id="search" class="form-control form-control-sm" placeholder="serach patient" aria-controls="example1">
                  </label>
                </div>
            </div>
        </div>
        <thead class="bg-black">
            <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>Address</th>
                <th>Cellphone</th>
                <th>Gender</th>
                <th>Specialities</th>
                <th width="150px">Action</th>
            </tr>
         </thead>
         <tbody>
             <?php $i=1 ?>
             @foreach ($doctors as $item)
                 <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->first_name .' '. $item->middle_name .' '. $item->last_name }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->cellphone }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->specialities }}</td>
                    <td><a href="#" class="btn btn-info">View</a></td>
                 </tr>
             @endforeach
         </tbody>
      </table>
    </div>
</div>

{{-- <script>
$(document).ready(function(){

 fetch_patient();

 function fetch_patient(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_patient(query);
 });
});
</script> --}}

@endsection