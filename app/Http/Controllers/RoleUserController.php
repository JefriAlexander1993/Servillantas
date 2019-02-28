<?php

namespace App\Http\Controllers;

use App\Role;
use App\Role_user;
use App\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
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
    public function index()
    {
        return view('Admin.Role_users.index', ['role_users1' => Role_user::orderBy('id', 'desc')->paginate('8')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Role_users.create', ['roleid' => Role::pluck('name', 'id'), 'userid' => User::pluck('name_user', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_user = Role_user::create($request->all())->save();

        return redirect()->route('Role_users.index')
            ->with('info', 'La asignación de rol a usuario ha sido exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Admin.Role_users.show', ['role_user' => Role_user::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Role_users.edit', ['role_user' => Role_user::findOrFail($id), 'userid' => User::pluck('name', 'id'), 'roleid' => Role::pluck('name', 'id')]);
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
        $role_user = Role_user::find($id)->update($request->all());

        return redirect()->route('Role_users.index')
            ->with('info', 'La asignación de rol a usuario ha sido actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role_user = Role_user::find($id)->delete();
        return back()->with('danger', 'La asiganción ha sido eliminada exitosamente.');
    }
}
