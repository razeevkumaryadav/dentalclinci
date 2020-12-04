<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Receptionist;

class ReceptionistRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        return view('auth.receptionistregister');
    }

    public function postForm(Request $request)
    {
        // dd($request->all());
        $receptionist = new Receptionist();
        $receptionist->user_id = Auth::id();

        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->input('first_name'). rand(1,99). '.' . $ext;
            $file->storeAs('/public/receptionistprofileimage', $filename);
            $receptionist->avatar = $filename;
        }
        else
        {
            $receptionist->avatar = '';
        }

        $receptionist->first_name = $request->input('first_name');
        $receptionist->middle_name = $request->input('middle_name');
        $receptionist->last_name = $request->input('last_name');
        $receptionist->address = $request->input('address');
        $receptionist->phone = $request->input('phone');
        $receptionist->cellphone = $request->input('cellphone');
        $receptionist->gender = $request->input('gender');
        $receptionist->bio = $request->input('bio');
        $receptionist->birthdate = $request->input('date');
        $receptionist->save();
        return redirect()->route('r-dashboard');
        // return request()->all();
    }
}
