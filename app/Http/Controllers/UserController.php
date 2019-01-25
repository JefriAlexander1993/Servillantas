<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function index()
    {
        /* $users = DB::table('role_user')
        ->join('roles', 'role_user.role_id', '=', 'roles.id')
        ->join('users', 'role_user.user_id', '=', 'users.id')
        ->select('users.*', 'roles.name')
        ->orderBy('id', 'desc')
        ->paginate('8');*/
        $users = User::orderBy('id', 'desc')->paginate('8');

        return view('Admin.Users.index', compact('users'));
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

    public function register(Request $request)
    {

        $user            = new User;
        $user->name_user = $request->name;
        $user->email     = $request->email;
        $user->password  = bcrypt($request->password);

        $user->save();

        return redirect()->route('Users.index')
            ->with('info', 'El usuario  fue registrado exitosamente.');

    }

    public function store(Request $request)
    {
        $user = User::create($request->all())->save();

        return redirect()->route('Users.index')
            ->with('info', 'El usuario  fue ha guardado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('Admin.Users.show', ['user' => User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Users.edit', ['user' => User::findOrFail($id)]);
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
        $user           = User::find($id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('Users.index')
            ->with('info', 'El usuario actualizado exitosamente su datos.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id)->delete();

        return back()->with('danger', 'El usuario fue eliminada exitosamente.');
    }
}
