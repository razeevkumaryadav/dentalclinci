<?php

namespace App\Http\Controllers;

use App\Receptionist;
use Illuminate\Http\Request;
use App\Patient;
use App\Appointment;
use App\Dentist;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Hash;


class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dentists = Dentist::all();
        $patients = Patient::all();
        $appointments = Appointment::all(); 
        $mytime =   Carbon::now();
        $times = $mytime->toDateTimeString();
        return view('receptionist.dashboard', compact('dentists', 'patients', 'appointments', 'times'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function appointment()
    {
        $dentists = Dentist::all();
        return view('receptionist.appointment')->with('dentists', $dentists);
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
        return redirect()->route('r-dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function show(Receptionist $receptionist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function edit(Receptionist $receptionist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receptionist $receptionist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receptionist $receptionist)
    {
        //
    }

    public function profile(Request $request)
    {
        $id = Auth::id();
        $receptionists = User::find($id)->receptionist;
        // dd($receptionists);
        return view('receptionist.profile')->with('receptionists', $receptionists);
    }

    public function updateprofile(Request $request, $id)
    {
        // dd($request->all());
        // dd($id);
         

        $receptionists = Receptionist::where('user_id', $id);
        // // dd($receptionists);
        // $receptionists->first_name = $request->input('first_name');
        // $receptionists->last_name = $request->input('last_name');
        // $receptionists->birthdate = $request->input('datepicker');
        // $receptionists->phone = $request->input('phone');
        // $receptionists->cellphone = $request->input('cellphone');
        // $receptionists->gender = $request->input('gender');
        // $receptionists->bio = $request->input('bio');
        // $receptionists->address = $request->input('address');
        $receptionists->update(
            [
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'birthdate' => $request->input('datepicker'),
                'phone' => $request->input('phone'),
                'cellphone' => $request->input('cellphone'),
                'gender' => $request->input('gender'),
                'bio' => $request->input('bio'),
                'address' => $request->input('address'),
            ]
        );
        return back();
    }

    public function emailupdate(Request $request, $id)
    {
        $receptionists = User::find($id);
        $receptionists->email = $request->input('user_email');
        $receptionists->update();
        return back();
    }

    public function usernameupdate(Request $request, $id)
    {
        $receptionists = User::find($id);
        $receptionists->name = $request->input('user_name');
        $receptionists->update();
        return back();
    }

    public function profileimageupdate(Request $request, $id)
    {
        // dd($request->all());
        $receptionists = Receptionist::where('user_id',$id);
        if ($request->hasfile('avatar')) 
        {
            $file = $request->file('avatar');
            $ext = $file->getClientOriginalExtension();
            $filename = $request->input('first_name'). rand(1,99). '.' . $ext;
            $file->storeAs('/public/receptionistprofileimage', $filename);
            $receptionists->update(['avatar' => $filename]);
        }
        // $receptionists->update(['avatar' => $filename]);
        // $receptionists->update();
        return back();

    }

    public function patient()
    {
        $patients = Patient::all();
        return view('receptionist.patient', compact('patients'));
    }

    public function addpatient()
    {
        return view('receptionist.addpatient');
    }

    public function storepatient(Request $request)
    {
        $this->validate(request(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'first_name' => ['required', 'string', 'max:255', 'min:3'],
            'last_name' => ['required', 'string', 'max:255', 'min:3'],
            'address' => ['required', 'string', 'max:255', 'min:3'],
            'cellphone' => ['required', 'numeric'],
            'gender' => ['required'],
        ]);
        $user = new User();
        $random = mt_rand(10000,99999);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_id = $request->name.$random;
        $user->type = '4';
        $user->save();
        $patient = new Patient();
        $patient->user_id = $user->id;
        $patient->first_name = $request->input('first_name');
        $patient->last_name = $request->input('last_name');
        $patient->address = $request->input('address');
        $patient->cellphone = $request->input('cellphone');
        $patient->gender = $request->input('gender');
        $patient->birthdate = $request->input('date');
        $patient->save();
        return redirect()->route('patients');
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = Patient::where('Name', 'like', '%'.$query.'%')
         ->orWhere('Address', 'like', '%'.$query.'%')
         ->orWhere('Cellphone', 'like', '%'.$query.'%')
         ->orWhere('Gender', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = Patient::orderBy('id', 'desc')->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->Name.'</td>
         <td>'.$row->Address.'</td>
         <td>'.$row->Cellphone.'</td>
         <td>'.$row->Gender.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="6">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );
      echo json_encode($data);
     }
    }
}
