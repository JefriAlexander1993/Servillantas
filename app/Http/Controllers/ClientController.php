<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{


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
        $clientUser=DB::table('role_user')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->join('users', 'role_user.user_id', '=', 'users.id')
                ->select('users.*')
                ->where('users.id', $client->id)->first();  

        $vehicles =DB::table('vehicles')->where('user_id',$client->id)->get();
               
         return view('Clients.show', compact('client','vehicles'));

    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        // $client = DB::table('role_user')
        //     ->join('roles', 'role_user.role_id', '=', 'roles.id')
        //     ->join('users', 'role_user.user_id', '=','users.id')
        //     ->where('roles.name', 'ROL_CLIENTE')
        //     ->where('users.id', $id)
        //     ->select('users.*')
        //     ->get();

        //     dd($client);
         $client = User::find($id);

        return view('Clients.edit', compact('client'));
    }

        public function editClient($id)
    {
        // $client = DB::table('role_user')
        //     ->join('roles', 'role_user.role_id', '=', 'roles.id')
        //     ->join('users', 'role_user.user_id', '=','users.id')
        //     ->where('roles.name', 'ROL_CLIENTE')
        //     ->where('users.id', $id)
        //     ->select('users.*')
        //     ->get();

        //     dd($client);
         $client = User::find($id);

        return view('Clients.editClient', compact('client'));
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
        $client->update($request->all());
        return redirect()->route('Clients.index')
            ->with('info', 'La cita fue actualizada exitosamente.');
    }

    public function updateClient(Request $request, $id)
    {
        $client = User::find($id);
        $client->update($request->all());
        return redirect()->route('Clients.show',Auth::id())
            ->with('info', 'La cita fue actualizada exitosamente.');
    }
     public function desploy( $id)
    {
        $client = User::find($id)->delete();
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
