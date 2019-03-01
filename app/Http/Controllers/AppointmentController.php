<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use Validator;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use DateTime;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
  
        $license= $request->get('license');
        $title= $request->get('title');
      
        $appointments=  Appointment::orderBy('id','asc')->lincense($license)->title($title)->paginate('8');   
                return view('Appointments.index', compact('appointments')); 


    }
    
    public function assignation($id){

            $appointment =  Appointment::findOrFail($id);   


             $users=   DB::table('role_user')
                        ->join('roles', 'role_user.role_id', 'roles.id')
                        ->join('users', 'role_user.user_id', 'users.id')
                        ->where('roles.name','=','ROL_MECANICO')
                        ->pluck('users.name_user','users.id'); 

             return view(' Appointments.assignation', compact('appointment','users')) ;        


    }

    public function assignationUpdate(Request $request , $id){

        $appointment =   Appointment::where('id','=',$id)->first();
        $appointment->user_id = $request->user_id;
        $appointment->state ='Asignada';
        $appointment->save(); 
            return redirect()->route('Appointments.index')
                ->with('info','La cita se ha asignado  exitosamente.');

    }





    public function calendary()
    {
          
      $appointments= Appointment::where('attended','No')->get();
      $appointments->sortBy('date');
      $appointments->sortBy('hour_end');

      return view('Appointments.calendary', compact('appointments'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validatedData = $request->validate([
                'hour_end' => 'required|unique:appointments',
            ]);
         $appointment = Appointment::create($request->all());
    
            return redirect()->route('Appointments.index')
                ->with('info','La cita se fue ha guardado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Appointments.show', ['appointment' =>Appointment::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('Appointments.edit', ['appointment' =>Appointment::findOrFail($id)]);
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
        $appointment = Appointment::find($id)->update($request->all());

            return redirect()->route('Appointments.index')
                ->with('info','La cita fue actualizada exitosamente.');

    }
    public function updateAttended(Request $request, $id)
    {
        $idU = Auth::id();
        $user = User::findOrFail($idU);
        $appointment = Appointment::find($id);
        if ($user->nuip ===$request->nuipM) {
              $appointment->attended= $request->attended;
              $appointment->save();
               return back()->with('info','La cita fue cumplida exitosamente.');
                 
                
        }
               return back()
                ->with('danger','Su nuip no fue correcto, vulve a intentarlo.');
      
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $appointment =  Appointment::find($id)->delete();
               

        return back()->with('danger','La cita fue eliminada exitosamente.');
    }
}
