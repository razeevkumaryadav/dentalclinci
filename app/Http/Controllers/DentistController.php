<?php

namespace App\Http\Controllers;

use App\Dentist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\TimeTable;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;
use App\Appointment;

class DentistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth()->user()->dentist->id;
        // dd($id);
        $dentist = Dentist::findOrFail($id)->with('appointment')->get();
        // dd($dentist);
        return view('dentist.dashboard',compact('dentist'));
    }

    public function today()
    {
        $id = Auth()->user()->dentist->id;
        $dentist = Dentist::findOrFail($id)->with('appointment')->get();
        return view('dentist.appointment.today',compact('dentist'));
    }
    
    public function tommorow()
    {
        $id = Auth()->user()->dentist->id;
        $dentist = Dentist::findOrFail($id)->with('appointment')->get();
        return view('dentist.appointment.tommorow',compact('dentist'));
    }
    
    public function finish()
    {
        $id = Auth()->user()->dentist->id;
        $dentist = Dentist::findOrFail($id)->with('appointment')->get();
        return view('dentist.appointment.finished',compact('dentist'));
    }
    public function cancelled()
    {
        $id = Auth()->user()->dentist->id;
        $dentist = Dentist::findOrFail($id)->with('appointment')->get();
        return view('dentist.appointment.cancel',compact('dentist'));
    }


    public function profile()
    {
        $id = Auth()->user()->dentist->id;
        $dentist  = Dentist::findOrFail($id)->with('timetable')->get();
        // dd($dentist);
        return view('dentist.profiles',compact('dentist'));
    }
    public function appointment()
    {
        $id = Auth()->user()->dentist->id;
        $dentist = Dentist::findOrFail($id)->with('appointment')->get();
        return view('dentist.appointment.appointment',compact('dentist'));
    }
    public function updateappointment(Request $request,$id)
    {
        // dd($request->all());

        $appointment = Appointment::findOrFail($id);
        // dd($appointment);
        $appointment->notes_dentist = $request->dentist_notes;
        $appointment->finished = $request->action;
        $appointment->update();
        return back();
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dent = new Dentist();
        $dent->first_name = $request->FirstName;
        $dent->middle_name = $request->MiddleName;
        $dent->last_name = $request->last_name;
        $dent->address = $request->address;
        $dent->bio = $request->bio;
        $dent->specialities = $request->specialities;
        $dent->phone = $request->phone;
        $dent->cellphone = $request->phone;
        $dent->gender = $request->gender;
        $dent->birthdate = $request->birthdate;
        $dent->save();

    }

    public function imageUpload(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
                           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
                            ]);
        $images = Dentist::where('user_id',$id);
       
        $imageName= $request->image->getClientOriginalName();
   
        $images->update([
            'avatar'=>'/storage/dentistprofile/'.$imageName
            ]
        );

    
        
        $images = $request->file('image')->storeAs('dentistprofile',$imageName);
        

        return back()

            ->with('success','You have successfully uploaded your profile')
            ->with('image',$imageName);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function show(Dentist $dentist)
    {
        // $dentists = Dentist::get()->all();
        $dentists  = Dentist::get()->all();
        //  dd($dentist);
        // $dentist = Dentist::get()->all();
        return view('profile.dentist.profile')->with(['dentists' => $dentists]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function edit(Dentist $dentist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
    {
        // dd($id);
        $updateDentistTable = Dentist::find($id);
        $detail = $request->all();
        $updateDentistTable->update($detail);
        return redirect()->back();

      
    }

    public function update_timetable(Request $request,$id)
    {
        // dd($request->all());
               foreach($request->day as $index=>$data)
        {
         
            $dentist = Dentist::find($id);
            $timetable = $dentist->timetable;
            $timetable[$index]->update([
             'day'=>$data,
             'start'=>$request->start[$index],
             'end'=>$request->end[$index],
            ]);
        }
        return redirect()->back();
    }

    public function create_timetables(Request $request,$id)
    {
        // dd($request->all());
        $dentist = Dentist::find($id);
        // $timetable = $dentist->timetable;
          $data=[];
               foreach($request->day as $index=>$data)
        {
               
            $datas[] = array(
                'day'=>$data,
                'start'=>$request->start[$index],
                'end'=>$request->end[$index],
            );      
        
        }
        // dd($datas);
  
        $dentist->timetable()->createMany($datas);    
        return redirect()->back();

    }

 public function password_update(Request $request,$id)
 {
      $dentist = Dentist::findOrFail($id);
    
    if(Hash::check($request->old_password,$dentist->user->password))
    {
        $dentist->user()->Update([
                   'password'=>bcrypt($request->new_password),
                   'name'=>$request->username,
              ]);
        Session::flash('success','Password Successfully updated');
        return redirect()->back();
    }
    else
    {
        // dd('error');
        Session::flash('error','your old password doesnot match with our records');
        return redirect()->back();
    }

 }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dentist  $dentist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dentist $dentist)
    {
        //
    }
}
