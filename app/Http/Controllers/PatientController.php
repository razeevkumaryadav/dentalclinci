<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Appointment;
use App\Dentist;
use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; 

class PatientController extends Controller
{
    /***************************************************************************************************
     *
     * Appointment controller
     * 
     **************************************************************************************************/

    public function index()
    {
        $dentists = Dentist::all();
        $patients = Patient::all();
        $appointments = Appointment::all(); 
        $mytime =   Carbon::now();
        $times = $mytime->toDateTimeString(); 
        // dd($dentists);
        return view('patient.dashboard', compact('dentists','appointments', 'patients','times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dentists = Dentist::all();
        return view('patient.appointment')->with('dentists', $dentists);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $patient = new Appointment();
        // dd($request->patient_id);
        $patient->patient_id = $request->patient_id;
        $patient->type = $request->input('type');
        $patient->dentist_id = $request->dentist_id;
        $patient->start = $request->input('dentist_timetable');
        $patient->appointment_date = $request->input('datepicker');
        $patient->appointment_time = $request->input('appointment_time_pick');
        $patient->notes = $request->input('notes');
        $patient->save();
        return redirect()->route('p-dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // dd($id);
        $appointment = Appointment::findOrFail($id);
        $dentists = Dentist::all();
        // return view('patient.appointment-edit')->with('appointment', $appointment);
        return view('patient.appointment-edit', compact('appointment', 'dentists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $patient = Appointment::find($id);
        $patient->patient_id = $request->patient_id;
        $patient->type = $request->input('type');
        $patient->dentist_id = $request->dentist_id;
        $patient->start = $request->input('dentist_timetable');
        $patient->appointment_date = $request->input('datepicker');
        $patient->appointment_time = $request->input('appointment_time_pick');
        $patient->notes = $request->input('notes');
        $patient->update();
        return redirect()->route('p-dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patients = Appointment::findOrFail($id);
        $patients->delete();
        return redirect()->route('p-dashboard');
    }

    public function appointment()
    {
        $dentists = Dentist::all();
        return view('patient.appointment', compact('dentists'));
    }


      /***************************************************************************************************
     *
     * Appointment controller end
     * 
     **************************************************************************************************/

       /***************************************************************************************************
     *
     * Profile controller
     * 
     **************************************************************************************************/

    public function showprofile(Request $request)
    {

        $id = Auth::id();
        // $id = Auth()->user()->id;
        // dd($id);
        // $patientprofile = Patient::find($id);
        $patients = User::find($id)->patient;

        // $patient = Patient::findOrFail($id);
        // dd($patients);
        return view('patient.profile', compact('patients'));
    }

    public function updateprofile(Request $request, $id)
    {
        $patient = Patient::where('user_id', $id);
        // $patient->first_name = $request->input('first_name');
        // $patient->last_name = $request->input('last_name');
        // $patient->birthdate = $request->input('datepicker');
        // $patient->phone = $request->input('phone');
        // $patient->cellphone = $request->input('cellphone');
        // $patient->gender = $request->input('gender');
        // $patient->bio = $request->input('bio');
        // $patient->address = $request->input('address');
        $patient->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'birthdate' => $request->input('datepicker'),
            'phone' => $request->input('phone'),
            'cellphone' => $request->input('cellphone'),
            'gender' => $request->input('gender'),
            'bio' => $request->input('bio'),
            'address' => $request->input('address'),
        ]);
        return back();
    }

    public function emailupdate(Request $request, $id)
    {
        // dd($request->all());
        $patient = User::find($id);
        $patient->email = $request->input('user_email');
        $patient->update();
        return redirect()->back();
    }

    public function usernameupdate(Request $request, $id)
    {
        $patient = User::find($id);
        $patient->name = $request->input('user_name');
        $patient->update();
        return back();
    }

    public function profileimageupdate(Request $request, $id)
    {
        // dd($request->all());
        $patient = Patient::where('user_id', $id);
        if ($request->hasfile('avatar')) 
        {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->input('first_name'). rand(1,99). '.' . $ext;
            $file->storeAs('/public/patientprofile', $filename);
            $patient->update(['avatar' => $filename]);
        }
        // $patient->update($pname);
        return back();

    }

    // public function updatepassword(Request $request, $id)
    // {
    //     $patient = Patient::find($id)->user;
    //     $patient->password = $request->input('user_password_new');
    //     $patient->password = $request->input('user_password_repeat');
    //     $patient->update();
    //     return back();
    // }

    // public function patientform()
    // {
    //     return view('patient.patientform');
    // }

    // public function patientformstore(Request $request)
    // {
    //     // $this->validate(request(), [
    //     //     'first_name' => 'required',
    //     //     'last_name' => 'required',
    //     //     'address' => 'required',
    //     //     'cellphone' => 'required|numeric',
    //     //     'gender' => 'required',
    //     //     'birthdate' => 'required',
    //     // ]);

    //     // $uploadedImage = $request->avatar;
    //     // $fileName = str::slug($request->first_name).'.'.$uploadedImage->getClientOriginalExtension();
    //     // $uploadedImage->storePubliclyAs('profile_picture',$fileName);

    //     if ($request->image->getClientOriginalName()) 
    //     {
    //         $ext = $request->image->getClientOriginalExtension();
    //         $file = date('YmdHis').rand(1,999999).'.'. $ext;
    //         $request->image->storeAs('/public/patientprofile', $file);
    //     }
    //     else
    //     {
    //         $file = '';
    //     }
       
    //     $patient = new Patient();
    //     $patient->patient_id = Auth::id();
    //     $patient->avatar = $file;
    //     $patient->first_name = $request->input('first_name');
    //     $patient->middle_name = $request->input('middle_name');
    //     $patient->last_name = $request->input('last_name');
    //     $patient->address = $request->input('address');
    //     $patient->phone = $request->input('phone');
    //     $patient->cellphone = $request->input('cellphone');
    //     $patient->gender = $request->input('gender');
    //     $patient->bio = $request->input('bio');
    //     $patient->birthdate = $request->input('datepicker');
    //     $patient->save();
    //     return redirect('/dashboard');
    // }
}
