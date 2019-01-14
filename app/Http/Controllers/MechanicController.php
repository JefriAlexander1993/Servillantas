<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

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
                ->orderBy('name', 'desc')     
                ->paginate('8');       
   
        return view('Mechanics.index',compact('mechanics1'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Mechanics.show',['mechanic'=> User::findOrFail($id)]);
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
            $user = User::find($id)->update($request->all());
         return redirect()->route('Mechanics.show', Auth::id())
                ->with('info','El mecanico fue actualizada exitosamente.');
        
    }

}