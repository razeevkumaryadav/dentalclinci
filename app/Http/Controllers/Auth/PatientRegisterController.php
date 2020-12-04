<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Patient;

class PatientRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        return view('auth.patientregister');
    }

    public function postForm(Request $request)
    {
        $patient = new Patient();
        $patient->user_id = Auth::id();

        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->input('first_name'). rand(1,99). '.' . $ext;
            $file->storeAs('/public/patientprofile', $filename);
            $patient->avatar = $filename;
        }
        else
        {
            $receptionist->avatar = '';
        }

        $patient->first_name = $request->input('first_name');
        $patient->middle_name = $request->input('middle_name');
        $patient->last_name = $request->input('last_name');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->cellphone = $request->input('cellphone');
        $patient->gender = $request->input('gender');
        $patient->bio = $request->input('bio');
        $patient->birthdate = $request->input('date');
        $patient->save();
        return redirect()->route('p-dashboard');
        // return request()->all();
    }
}
