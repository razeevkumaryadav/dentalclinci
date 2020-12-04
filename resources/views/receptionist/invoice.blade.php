@extends('backend.receptionist')
@section('title')
    Invoice
@endsection

@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Invoice Form</h3>
            </div>
            <div class="card-body">
                <form id="btnSave" action="{{ route('invoice.store') }}" method="post">
                     {{ csrf_field() }}
                        {{-- <div class="form-group row">
                            <label for="invoice_no" class="col-form-label">Invoice No.</label>
                            <input type="text" name="invoice_no" class="form-control" id="invoice_no">
                        </div> --}}
                        {{-- <div class="form-group row">
                            <label for="bill_type" class="col-form-label">Bill Type</label>
                            <select name="bill_type" id="bill_type" class="form-control">
                                <option value="vat">VAT</option>
                                <option value="pan">PAN</option>
                                <option value="non_vat">Non-VAT</option>
                            </select>
                        </div> --}}
                    {{-- <div class="form-group row">
                        <label for="patient_id" class="col-form-label">Patient Id</label>
                        <select name="patient_id" id="patient_id" class="form-control" required>
                            <option value="" selected>--Select List--</option>
                            @foreach($patients as $dent)
                                <option value="{{ $dent->id }}">{{ $dent->id .'. '. $dent->first_name .' '. $dent->middle_name .' '. $dent->last_name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="form-group row">
                        <label for="service_id" class="col-form-label">Services</label>
                        <select name="service_id" id="service_id" class="form-control js-example-basic-single" data-placeholder="--Search List--" required>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="rate" class="col-form-label">Rate</label>
                        <input type="text" name="rate" id="rate" class="form-control">
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-form-label">Quantity</label>
                        <input type="text" name="quantity" id="quantity" class="form-control">
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-form-label">Discount</label>
                        <input type="text" name="discount" id="discount" class="form-control" >
                    </div>
                    {{-- <div class="form-group row">
                        <label for="total_amount" class="col-form-label">Total Amount</label>
                        <input type="text" name="total_amount" id="gtotal_amount" class="form-control" onclick="total_amount()">
                    </div> --}}
                        {{-- <div class="form-group row">
                        <label for="tax" class="col-form-label">TAX</label>
                        <input type="text" name="tax" class="form-control" id="discount">
                        </div>
                        <div class="form-group row">
                            <label for="grand_total" class="col-form-label">Grand Total</label>
                            <input type="text" name="grand_total" class="form-control" id="grand_total">
                        </div> --}}
                        <div class="form-group">
                            <button type="submit" name="btnSave" class="btn btn-primary"> Make Invoice </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Quick Sales Billing
                    <span>Listing Billing</span>
                </h3>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
           {{--   <div> Customer Name: <input type="text" name="name" class="form-control"></div> --}}
            <div class="x_content">
                <div id="saleslist">

                </div>
                <div id="ajaxform">

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="{{asset('backend/plugins/select2/js/select2.min.js')}}">

$(document).ready(function () {
            $(".js-example-basic-single").select2();
        });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#service_id').on('change', function () {
            // refreshlist();
            var prdid = $(this).val();
            var path = '/receptionist/getrate';
            $.ajax({
                url: path,
                method: 'post',
                data: {'service_id': prdid, '_token': $('input[name=_token]').val()},
                dataType: 'text',
                success: function (resp) {
                    
                    console.log(resp);
                    //$('#quantity').empty();
                    $('#rate').val(resp);
                }
            });
        });
    });
    refreshlist();
    // discount();
    total_amount();
    function refreshlist() {
            $.ajax({
                type: 'get',
                url: "{{url('/receptionist/refresh-list')}}",
                dataType: 'html',
                success: function (data) {
                        console.log(data);
                    $('#service_id').html(data);
                }
            })
        }
    function total_amount() {
    var a = parseInt(document.getElementById('rate').value);
    var b = parseInt(document.getElementById('quantity').value);
    if (a > 0 && b > 0) {
        document.getElementById('gtotal_amount').value = a * b;
        console.log(a*b);
        // document.getElementById('Total').value = parseInt(document.getElementById('Result1').value) + parseInt(document.getElementById('Result2').value);
    }
}


</script>
<script type="text/javascript">

// $(document).ready(function(){

// $.ajaxSetup({
//             headers: {
//                 'X-CRF-TOKEN': $('meat[name = "csrf-token"]').attr('content')
//             }
//         });
 
//   $('#patient_id').on('click',function(e){
//     e.preventDefault();
//     $value=$(this).val();
//     console.log($value);
//     $.ajax({
//         type : 'post',
//         url : "{{url('/receptionist/patient/name')}}",
//         data:{'id':$value},
//         success:function(data){
//               console.log(data);
//                         $('#patient_name').value(data);
//                             }
//         });
//      });
//   });

</script>
<script>
$(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CRF-TOKEN': $('meat[name = "csrf-token"]').attr('content')
                }
            });
            $('#btnSave').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                // var post = $(this).attr('method');
                var data = $(this).serialize();
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    success: function (data) {
                        refreshlist();
                        readsales();
                        ajaxform();
                        var m = "<div class='alert alert-success'>" + data.success_message + "</div>";
                        // alert(data.success_message);
                        $('.resp').html(m);
                        document.getElementById("btnSave").reset();
                    }
                });
            });
        });
        readsales();
        refreshlist();
        readsales();
        refreshlist();
        ajaxform();
        function readsales() {
            $.ajax({
                type: 'get',
                url: "{{url('/receptionist/ajaxservice-list')}}",
                dataType: 'html',
                success: function (data) {
                    console.log(data);
                    $('#saleslist').html(data);
                }
            })
        }
        function ajaxform() {
            $.ajax({
                type: 'get',
                url: "{{url('/receptionist/ajax-form')}}",
                dataType: 'html',
                success: function (data) {
                    $('#ajaxform').html(data);
                }
            })
        }

</script>

@endsection