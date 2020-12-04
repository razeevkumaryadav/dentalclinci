<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dentist;

class DentistRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        return view('auth.dentistregister');
    }

    public function postForm(Request $request)
    {
        // dd($request->all());
        $dentist = new Dentist();
        $dentist->user_id = Auth::id();

        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->input('FirstName'). rand(1,99). '.' . $ext;
            $file->storeAs('/public/dentistprofile', $filename);
            $dentist->avatar = '/storage/dentistprofile/'.$filename;
        }
        else
        {
            $dentist->avatar = '';
        }
        $dentist->first_name = $request->FirstName;
        $dentist->middle_name = $request->MiddleName;
        $dentist->last_name = $request->LastName;
        $dentist->address = $request->Address;
        $dentist->bio = $request->Bio;
        $dentist->specialities = $request->specialities;
        $dentist->phone = $request->phone;
        $dentist->cellphone = $request->cellphone;
        $dentist->gender = $request->gender;
        $dentist->birthdate = $request->birthdate;
        $dentist->save();
        return redirect()->route('dentist.dashboard');
    }
}
