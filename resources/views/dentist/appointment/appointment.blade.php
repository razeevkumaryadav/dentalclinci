@extends('backend.dentists')
@section('title')
Doctor | Appointment
@endsection
@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Patient</th>
          <th>Schedules</th>
          <th>Notes</th>
          <th>Dentist Notes</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($dentist as $item)  
           @foreach ($item->appointment as $app)
               
          <?php $i=1?>
           <tr>
           <form action="{{route('update.dentist.appointment',['id'=>$app->id] )}}" method="post">
            @csrf
          <td>{{$i++}}</td>
           <td>Milan <br><span class="badge badge-info right">{{$app->type}}</span>
          </td>
        <td>{{$app->appointment_date}}</td>
        <td> {{$app->notes}}</td>
      
        <td><input type="text" name="dentist_notes" value="{{$app->notes_dentist}}" class="form-control"></td>
        <td>
          
          @if($app->finished == 1)
          <span class="text-success">finished</span>
          @else
           <span class="text-danger">Unattended</span>
     
          @endif
        </td>
        <td class="form-inline">
          <select name="action" id="" class="form-control">
           <option value="1">finished</option>
           <option value="0">Canceled</option>
          </select>
          <button class="btn btn-success ml-2" type="submit">Submit</button>
        </td>
           </form>
        </tr>
           @endforeach
          @endforeach
         </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Schedules</th>
                <th>Notes</th>
                <th>Dentist Notes</th>
                <th>Action</th>
              </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>

@endsection
@section('script')
<script>
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
@endsection