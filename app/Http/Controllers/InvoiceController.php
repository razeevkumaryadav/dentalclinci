<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Patient;
use App\Service;
use App\Subservice;
use App\Invoice;
use App\Invoicedetail;
use App\Bill;
use App\BillSummary;
use Carbon\Carbon;
use Auth;
use PDF;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subservices = Subservice::all();
        $patients = Patient::all();
        return view('receptionist.invoice', compact('subservices', 'patients'));
    }

    public function getrate(Request $request)
    {

        $id = $request->service_id;
        // dd($id);
        $services = Subservice::find($id);
        // dd($services);
        echo $services->rate;
    }

    public function refreshlist()
    {
        $subservices = Subservice::all();
        //  dd($subservices);

        return view('receptionist.refreshlist', compact('subservices'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            // 'patient_id' => 'required',
            // 'invoice_no' => 'required',
            'rate' => 'required',
            'quantity' => 'required',
            // 'total_amount' => 'required',
        ]);
        if ($request->ajax()) {
            $invoices = new Invoice();
            $subservices = Subservice::find($request->service_id);
            // $invoices->patient_id = $request->patient_id;
            // $invoices->invoice_no = $request->invoice_no;
            $invoices->particular_id = $request->service_id;
            $invoices->particular = $subservices->subname;
            $invoices->rate = $request->rate;
            $invoices->quantity = $request->quantity;
            // $invoices->discount = $request->discount;
            $invoices->total_amount = $request->quantity*$request->rate;
            // dd($invoices);
            $invoices->save();

        } else {
            return response(['error_message' => 'Filed To Make sales']);
        }
    }

    public function ajaxlist()
    {
        $invoices = Invoice::join('subservices', 'subservices.id', '=', 'invoices.particular_id')
            ->select('invoices.*', 'invoices.particular')
            ->orderBy('invoices.created_at', 'DESC')
            ->get();
        return view('receptionist.ajaxlist', compact('invoices'));
    }

    public function ajaxform()
    {
        $invoices = Invoice::all();
        return view('receptionist.ajaxform', compact('invoices'));
    }

    public function getpatientname(Request $request)
    {
      if($request->ajax())
      {
          
          $id = $request->id;
        
        try
        {
          $pat = Patient::findOrFail($id);
          $fullname = $pat->first_name.' '.$pat->middle_name.' '.$pat->last_name;
          return  $fullname;
        } catch(UserNotFoundException $exception)
        {
            report($exception);
            return back()->withError($exception->getMessage())->withInput();
        }
      
      }
    
    
    }

    public function savetobill(Request $request)
    {

//    dd($request->all());
// $this->validate($request, [
//     'patient_id' => 'required',
//     // 'invoice_no' => 'required',
//     'rate' => 'required',
//     'quantity' => 'required',
//     'grand_total' => 'required',
//     'patient_id'=>'required',
//     'payabl_amount'=>'required'
// ]);
    //   $inv = $this->invoiceno_generator();
    //   dd($inv);        

        $bill = new Bill();
        $bill->patient_id =$request->patient_id;
        $bill->patient_name= $request->patient_name;
        $bill->invoiceno = $this->invoiceno_generator();
        $bill->date = Carbon::today();
        $bill->grand_total = $request->grand_total;
        $bill->discount = $request->discount;
        $bill->vat = $request->vat;
        $bill->payable_amount = $request->payable_amount;
        $bill->user_id = Auth::user()->id;
        $bill->issued_by = Auth::user()->name;
        $bill->save();
        





         $particular = $request->particular_id;
   
        foreach($particular as $index=>$pat)
        {
            $pat=[
                'particular_id'=>$request['particular_id'][$index],
                'particular'=>$request['particular'][$index],
                'rate'=>$request['rate'][$index],
                'quantity'=>$request['quantity'][$index],
                'total_amount'=>$request['total_amount'][$index]
            ];
            // dd($bill);
            $bill->billsummary()->create($pat);
        }
        

         DB::table('invoices')->delete();
        return redirect()->back();

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
     
    public function billprint()
    {
        $bill = Bill::orderBy('created_at','DESC')->first();
        // dd($bill);
        $pdf = PDF::loadView('pdf.invoice', compact('bill'));
        // return  $pdf->download('customers.pdf');
        //   return view('pdf.invoice');
        return $pdf->stream();
    }

    public function invoiceno_generator()
    {
        $invoice = new Invoice();
        $lastInvoiceID = $invoice->orderBy('id', 'DESC')->pluck('id')->first();
        $newInvoiceID = date('YmdHis').'-'.$lastInvoiceID;
        return $newInvoiceID;
    }
}
