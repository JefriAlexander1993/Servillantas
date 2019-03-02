<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vehicle;
use App\User;
use DB;


class VehicleController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Vehicles.index', ['vehicles' => Vehicle::orderBy('id','desc')->paginate('8')] );

  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $clients = User::pluck('name_user','id'); 

        return view('Vehicles.create',compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $user = User::findOrFail(Auth::id());
         if($user->nuip===$request->nuip){
            $vehicle = Vehicle::create($request->all())->save();
            return redirect()->route('Appointments.create')
                ->with('info','El vehiculo se ha guardado exitosamente.');
        }
            return back()
                ->with('danger','El nuip no conside con el usuario.');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         // $client=User::findOrFail(Auth::id());
      
         return view('Vehicles.show' ,[ 'vehicle' => Vehicle::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
         
         return view('Vehicles.edit' ,[ 'vehicle' => Vehicle::findOrFail($id),'clients'=>User::pluck('name_user','id')]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
          
        $user = User::findOrFail(Auth::id());

         if($user->nuip===$request->nuip){
           $vehicle = Vehicle::findOrFail($id)->update($request->all()); 
            return redirect()->route('Vehicles.index')
                ->with('info','El vehiculo se ha guardado exitosamente.');
        }
            return back()
                ->with('danger','El nuip no conside con el usuario.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $vehicle =  Vehicle::find($id)->delete();
                return back()->with('danger','El vehiculo fue eliminada exitosamente.');
    }
}
