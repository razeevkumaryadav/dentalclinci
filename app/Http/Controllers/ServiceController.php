<?php

namespace App\Http\Controllers;

use App\Service;
use App\Subservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with('subservice')->get();
        $service = Service::with('subservice')->first();
        // dd($service);
        // $subservice = Subservice::all();
        return view('receptionist.services', compact('services', 'service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('receptionist.addservice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $service = new Service;
          $service->name = $request->input('name');
          $service->save();

          $id = $service->id;
        //   dd($request->all());
        // request gives all the data
        $input = $request->all();
            // input[subname] counts the total no. of subname inputs comming from services blade
            for($i=0;$i<count($input['subname']);$i++)  
            {
                $subservice = new Subservice();
                $subservice->service_id = $id;
                $subservice->subname = $input['subname'][$i];
                $subservice->rate = $input['rate'][$i];
                $subservice->save();
            }
          return redirect()->route('services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $services = Service::with('subservice')->Find($id);
        return view('receptionist.editservice', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    
        $service = Service::find($id);
        $service->name = $request->input('name');
        $service->update();
        $subservicess = Subservice::where('service_id',$id);
        foreach($request->subname as $index=>$data)
        {
            $subservice=Subservice::find($request->subservice_id[$index]);

            $subservice->subname= $data;
            $subservice->rate= $request->rate[$index];
            $subservice->update();


        }
     
        return redirect()->route('services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('services.index');
    }
}
