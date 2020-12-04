@extends('backend.dentists')
@section('title')
Doctor |  Dashboard
    
@endsection
@section('content')
<div class="row">
  <?php $finished = 0; $cancelled = 0; $null = 0; $today=0; $tommarow=0?>
  @foreach ($dentist as $item)
   @foreach ($item->appointment as $app)
   {{-- {{$app->id}} --}}
   
      {{-- {{ $finished = count(@if($app->finished==1))}} --}}
      @if ($app->finished == 1)
          <?php $finished++ ?>
      @elseif($app->finished == 0)
         <?php $cancelled++ ?>
     
      @else 
        <?php $null++ ?>
          
      @endif
      @if($app->today == 0)
      <?php $today++ ?>
      @elseif($app->today == 1)
      <?php $tommarow++ ?>
      @endif
    @endforeach    

  @endforeach
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$finished}}</h3>

          <p>Finished Appointment</p>
        </div>
        <div class="icon">
          <i class="fas fa-check"></i>
        </div>
      <a href="{{route('dentist.finished.appointment')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>{{$cancelled}}</h3>

          <p>Unattended Appointment</p>
        </div>
        <div class="icon">
          <i class="fas fa-times"></i>
        </div>
        <a href="{{route('dentist.cancelled.appointment')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
        <h3>{{$today}}</h3>

          <p>Today Appointment</p>
        </div>
        <div class="icon">
          <i class="fas fa-calendar"></i>
        </div>
        <a href="{{route('dentist.today.appointment')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
        <h3>{{$tommarow}}</h3>

          <p>tommorow appointment</p>
        </div>
        <div class="icon">
          <i class="fas fa-calendar-alt"></i>
        </div>
      <a href="{{route('dentist.tommorow.appointment')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>    

@endsection