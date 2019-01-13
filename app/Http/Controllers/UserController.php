<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Admin.Users.index', ['users' => User::orderBy('id' ,'desc')->paginate('8') ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request){
       
            $user = new User;
            $user->name = $request->name;
            $user->email= $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

                return redirect()->route('Users.index')
                     ->with('info','El usuario  fue registrado exitosamente.');

    }



    public function store(Request $request)
    {
        $user =User::create($request->all())->save();


            return redirect()->route('Users.index')
                ->with('info','El usuario  fue ha guardado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('Admin.Users.show',['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            return view('Admin.Users.edit',['user' => User::findOrFail($id)]);
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
          $user->name = $request->name;
          $user->email= $request->email;
          $user->password = bcrypt($request->password);
          $user->save();


            return redirect()->route('Users.index')
                ->with('info','El usuario actualizado exitosamente su datos.');

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

        return back()->with('danger','El usuario fue eliminada exitosamente.');
    }
}
