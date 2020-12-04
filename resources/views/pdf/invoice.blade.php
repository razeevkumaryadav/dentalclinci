<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>INVOICE-{{$bill->patient_name}}</title>
    <style type="text/css">
  
  table, td, th {  
  border: 1px solid #ddd;
  /* text-align: left; */
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
    </style>
</head>
<body>
    <div class="wrapper">
       <div class="header" style="width:100%; height:150px;">
            <div class="box logo" style="width:100px; float:left; margin-right:5em">
                <img src="{{public_path('/image/amex.png')}}" style="width: 150px;
                    height: 150px">
            </div>
           <div class="box company" style=" width:75%">
           <div class="content" style=" float:inherit; margin-left:50px; padding:5px;">
           <h2>OM DENTAL CLINIC</h2>
           <h4>Old Baneshwor, Kathmandu</h4>
           </div>
           </div>
       </div>
    <div class="invoice">
          <h2 align="center">Invoice</h2>
       </div>
      
    <div class="filed-area">
           <div class="patient" style="float:left; margin-right:5em;">
           <h4> PATIENT ID   :{{ $bill->patient_id}} <br>
            PATIENT Name :{{$bill->patient_name}}</h4>
           </div>
           <div class="date" style="float:inherit; margin-left:150px;">
           <h4>INVOICE NO:{{$bill->invoiceno}}<br>
           DATE:{{$bill->date}}</h4>

           </div>
       </div>
       <div class="tables">
           <table>
               <tr>
                   <td>S.N</td>
                   <td>Service Name</td>
                   <td>Rate</td>
                   <td>Quantity</td>
                   <td>Total Amount</td>
               </tr>
               <?php $i=1?>
               @foreach ($bill->billsummary as $item)
                   
             
               <tr>
               <td>{{$i++}}</td>
                   <td>{{$item->particular}}</td>
               <td>{{$item->rate}}</td>
               <td>{{$item->quantity}}</td>
               <td>{{$item->total_amount}}</td>
               </tr>
               @endforeach
               <tr>
                   <td colspan="4" align="right">DISCOUNT %</td>
               <td>{{$bill->discount}}</td>
                </tr>
                <tr>
                    <td colspan="4" align="right">VAT %</td>
                <td>{{$bill->vat}}</td>
                 </tr>
                 <tr>
                    <td colspan="4" align="right">PAYABLE AMOUNT</td>
                 <td>{{$bill->payable_amount}}</td>
                 </tr>
           </table>
       </div>
    </div>
</body>
</html>