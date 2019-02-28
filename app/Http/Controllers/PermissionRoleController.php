<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission_role;
use App\Permission;
use App\Role;

class PermissionRoleController extends Controller
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
        return view('Admin.Permission_roles.index' ,['permission_roles1' => Permission_role::orderBy('created_at','desc')->paginate('8')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Admin.Permission_roles.create',['roleid' => Role::pluck('name','id'),'permissionid' => Permission::pluck('name','id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission_role = Permission_role::create($request->all())->save();

            return redirect()->route('Permission_roles.index')
                ->with('info','El rol y permiso se han asignado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          return view('Admin.Permission_roles.show',['permission_role' => Permission_role::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          return view('Admin.Permission_roles.edit',['permission_role' => Permission_role::findOrFail($id),'roleid' => Role::pluck('name','id'),'permissionid' => Permission::pluck('name','id')]);
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
        $permission_role = Permission_role::find($id)->update($request->all());
              return redirect()->route('PermissionRole.index')
                ->with('info','El rol y permiso se han actualizado exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission_role = Permission_role::find($id)->delete();
         return back()->with('danger','La cita fue eliminada exitosamente.');
    }
}
