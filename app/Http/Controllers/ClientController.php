<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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
         $users = DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->join('users', 'role_user.user_id', '=', 'users.id')
                ->select('users.*')->where('roles.name_rol','ROL_CLIENTE') 
                ->orderBy('name', 'desc')->paginate('8');       
   
        return view('Clients.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Clients.show',['client'=> User::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {   
        $client = User::find(Auth::id());
       // $user = User::all()->first();

          //   $client = DB::table('users')->select()
            //    ->where('users.id',  Auth::id())->get();  
           
        return view('Clients.edit' , compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $user = User::find($id)->update($request->all());
         return redirect()->route('Clients.show', Auth::id())
                ->with('info','La cita fue actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
 
}
