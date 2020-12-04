{{-- <div class="row"> --}}
   
   {{-- <div class="col-md-2"></div>
    {{-- <div class="col-md-3">
      <a class="btn btn-info" onclick="printorderall()" type="submit" target="_blank"><i class="fa fa-print"></i>Dental Bill</a>
    </div> --}}
    {{-- <div class="col-md-3"> --}}
        {{-- <table class="table table-striped">
            <tr>
                <td>patient id</td>
                <td><input type="text" name="patient_d"></td>
            </tr>
            <tr>
                <td>
                    <td>Patient Name</td>
                    <td><input type="text" name="patient_name"></td>
                </td>
            </tr>
        </table> --}}
    {{-- </div> --}}
    <div class="col-md-12">
  
    <form action="{{route('save.bill')}}" method="POST" >
            {{csrf_field()}}


            <?php $total= 0 ?>
            @if($invoices)
                @foreach($invoices as $s)
                    @php
                    $rate = $s->total_amount;
                    $total += $rate;
                    @endphp
                 @endforeach
                
            @endif
            @php($i = 0)
           
            @foreach($invoices as $sc)
                <input type="hidden" name="particular_id[{{$i}}]" value="{{$sc->particular_id}}">
                <input type="hidden" name="particular[{{$i}}]" value="{{$sc->particular}}">
                <input type="hidden" name="rate[{{$i}}]" value="{{$sc->rate}}">
                <input type="hidden" name="quantity[{{$i}}]" value="{{$sc->quantity}}">
                <input type="hidden" name="total_amount[{{$i}}]" value="{{$sc->total_amount}}">
                
                @php($i++)
            @endforeach
            <input type="hidden" name="total_product" value="{{$i}}">
            
        <div class="row ml-5">
           
            <table class="table table-striped ml-2">
                <tr>
                    <td>grand total</td>
                <td><input type="text" name="grand_total" id="grandtotal" value="{{$total}}" class="form-control"></td>
                </tr>
                <tr>
                    <td>Discount</td>
                    <td><input type="text" name="discount" id="gdiscount"  class="form-control" ></td>
                </tr>
                <tr>
                    <td>VAT</td>
                    <td><input type="text" name="vat" id="vat" class="form-control" value="13" placeholder="13"></td>
                </tr>
                <tr>
                    <td>payable amount</td>
                    <td><input type="text" name="payable_amount" id="payable_amount" value="" class="form-control" ></td>
                </tr>
            <tr>
                <td>patient id</td>
                <td><input type="text" name="patient_id" id="pat_id" class="form-control" required></td>
            </tr>
            <tr>
                <td>Patient Name</td>
                <td><input type="text" name="patient_name" id="patient_name" value="" class="form-control" required></td>
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
               @endif
            </tr>
           </table>
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
       
            <button type="submit"  class="btn btn-info col-5" target="_blank" onclick="return confirm('Do You Print Out The Bill?')">Clear Sales Bucket</button>
            <a  type="submit" href="{{route('print')}}" target="_new"  class="btn btn-success col-5"><i class="fa fa-print" class="mr-2"></i>BIll</a>
        </form>
   
    </div>
{{-- </div> --}}
<script type="text/javascript">
 
//   function pat()
//   {
    
//     $value = $(this).value();
//     // $value =1;
//     console.log($value);
//     $.ajax({
//         type : 'get',
//         url : "{{url('/receptionist/patient/name')}}",
//         data:{'id':$value},
//         success:function(data){
//               console.log(data);
//                         // $('#patient_name').value(data);
//                             }
//         });
//   }
// $(document).ready(function(){

// // $.ajaxSetup({
// //             headers: {
// //                 'X-CRF-TOKEN': $('meat[name = "csrf-token"]').attr('content')
// //             }
// //         });
 
  $('#pat_id').on('keyup',function(){
    // e.preventDefault();
    $value=$(this).val();
    // $value=1;
    console.log($value);
    $.ajax({
        type : 'get',
        url : "{{url('/receptionist/patient/name')}}",
        data:{'id':$value},
        success:function(data){
              console.log(data);
                        $('#patient_name').val(data);
                            }
        });
     });
//   });



 
$('#gdiscount').on('keyup',
 function() {
    var gtotal= document.getElementById("grandtotal").value;
    var disc = document.getElementById("gdiscount").value;
    var vat =  document.getElementById('vat').value;
    
    if (disc > 0) {
        // document.getElementById('gtotal_amount').value = a * b;
                 var disc_amount = (disc/100)*gtotal;
                 var discounted_amnt = gtotal - disc_amount;

                 var vatamount = (vat/100)*discounted_amnt;
                 var paidamount = discounted_amnt+vatamount;
                 
                 document.getElementById("payable_amount").value = paidamount;
        
        // console.log(disc_amount);
        // console.log(discounted_amnt);
        // console.log(vatamount);
        // console.log(paidamount);

        // alert("you can offer ");

        // document.getElementById('Total').value = parseInt(document.getElementById('Result1').value) + parseInt(document.getElementById('Result2').value);
    }
    else if(disc >= 100){
        alert("you cannot offer ");
    }
    else
    {
        // var discounted_amnt = gtotal;

        var vatamount = (vat/100)*gtotal;
        var paidamount = parseFloat(gtotal + vatamount);

        document.getElementById("payable_amount").value = paidamount;
    }
   }
);
</script>