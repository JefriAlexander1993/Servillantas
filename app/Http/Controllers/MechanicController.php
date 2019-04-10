<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use App\Appointment;
use Auth;

class MechanicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
           $mechanics1 = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->join('users', 'role_user.user_id', '=', 'users.id')
                ->select('users.*')->where('roles.name','ROL_MECANICO') 
                ->orderBy('id', 'desc')     
                ->paginate('8');    

   
        return view('Mechanics.index',compact('mechanics1'));
    }

     public function assignedShow(Request $request,$id){

         $mechanicU = User::findOrFail($id); 
  
        // Con está consulta solo se la mostrará la citas al mecanico que se le asigno . 
         // $appointment1= DB::table('users')
         //        ->join('appointments', 'appointments.mechanic_id','=','users.id')
         //        ->select('appointments.*','users.name_user')
         //         ->where('users.id','=', $mechanicU->id)
         //         ->where(function ($query) {
         //                $query->where('attended','No');
         //        })->orderBy('id', 'asc')     
         //        ->paginate('3');    

        // Con esta consulta todos verán las citas.
       /* $appointment1= DB::table('users')
                ->join('appointments', 'appointments.mechanic_id','=','users.id')
                ->select('appointments.*','users.name_user')
                >where('attended','No');
                })->orderBy('id', 'asc')     
                ->paginate('3');    
        */

        // Con esta consulta solo la veran el rol mecanico, pero veran todas las citas, cualquier mecanico ve citas de los demás        

           $appointment1= DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->join('users', 'role_user.user_id', '=', 'users.id')
                ->join('appointments', 'appointments.mechanic_id','=','users.id')
                ->select('appointments.*','users.name_user')
                ->where('attended','No')
                ->where(function ($query) {
                        $query->where('roles.name','ROL_MECANICO');
            })->orderBy('id', 'asc')     
                ->paginate('3');
        
        return view('Mechanics.showAssignation', compact('appointment1'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $mechanicU = User::findOrFail($id); 
       $mechanic=DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->join('users', 'role_user.user_id', '=', 'users.id')
                ->select('users.*')
                ->where('users.id', $mechanicU->id)->first();
 
        return view('Mechanics.show',compact('mechanic'));
    }

    public function showMecanic($id)
    {
       $mechanicU = User::findOrFail($id); 
       $mechanic=DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->join('users', 'role_user.user_id', '=', 'users.id')
                ->select('users.*')
                ->where('users.id', $mechanicU->id)
                ->where(function ($query) {
                $query->where('roles.name','ROL_MECANICO',);
            })->first();
        
        if ($mechanic == null) {
                     return redirect()->route('Mechanics.index')
                ->with('danger','No tienes rol de mecanico.');
            
        }        
        return view('Mechanics.show',compact('mechanic'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Mechanics.edit',['mechanic'=> User::findOrFail($id)]);
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
            $user = User::find($id);
            $id = $user->id;
            $user->update($request->all());

            return redirect()->route('Mechanics.show', $id)
                ->with('info','El mecanico fue actualizada exitosamente.');
        
    }

}
