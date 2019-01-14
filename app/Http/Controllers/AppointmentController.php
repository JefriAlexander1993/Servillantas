<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use Validator;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use DateTime;
use DB;
class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(){

                                 
       return view('Appointments.index', ['appointments'=>Appointment::orderBy('date_end','Asc')->paginate('8')]); 


    }

    public function calendary()
    {

      $event =[];
      $appointments = Appointment::all();

       if($appointments->count()) {
        foreach ($appointments as $row) {
       //    $date_create = $row->date_end."24:00:00";
           
            $event[] =\Calendar::event(
                $row->title. ' - ' . $row->license_plate.' - '.date('d m Y', strtotime($row->date_end)).' - '.date('H:i', strtotime($row->date_end)).' ',
                false,
                new \DateTime($row->created_at),
                new \DateTime($row->date_end),
                   
                $row->id,
                
                [
                    'color'=> $row->color,
                ]
            );

        }
      
    }
      $calendar = \Calendar::addEvents($event)->setOptions([
                'schedulerLicenseKey '=> 'GPL-My-Project-Is-Open-Source',
                'FirstDay' => 1,
                'contentheight' => 650,
                'editable' => false,
                'allDay' => false,
                'aspectRatio' => 2,
                'slotLabelFormat' =>'d-m-Y h:i:s',
                              
                ])->setCallbacks([]);; 
        return view('Appointments.calendary',compact('appointments', 'calendar')); 
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
       
               $appointment =  Appointment::create($request->all())->save();

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
