<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\Vehicle;
use Illuminate\Http\Request;
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
            ->select('users.*')->where('roles.name', 'ROL_CLIENTE')
            ->orderBy('id', 'desc')->paginate('8');

        return view('Clients.index', compact('users'));
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
        $client = User::findOrFail($id);    
        $vehicle= Vehicle::findOrFail($client->vehicle_id);
        return view('Clients.show', compact('client','vehicle'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = User::find(Auth::id());

         $vehicles = Vehicle::pluck('brand','id'); 
        
        return view('Clients.edit', compact('client','vehicles'));
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
        $client = User::find($id);
        $client->vehicle_id =$request->vehicle_id;
        $client->update($request->all());
        return redirect()->route('Clients.show', Auth::id())
            ->with('info', 'La cita fue actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

}
