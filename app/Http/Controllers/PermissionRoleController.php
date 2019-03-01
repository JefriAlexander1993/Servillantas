<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission_role;
use App\Permission;
use App\Role;
use DB;

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
        $permission_roles1 = DB::table('permission_role')
            ->join('roles', 'permission_role.role_id', '=', 'roles.id')
            ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
            ->select('roles.name','permissions.id','permissions.namep')
            ->orderBy('id', 'desc')->paginate('8');
            // dd($permission_role);

        return view('Admin.Permission_roles.index',compact('permission_roles1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Admin.Permission_roles.create',['roleid' => Role::pluck('name','id'),'permissionid' => Permission::pluck('namep','id')]);
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
        $permission_role =Permission_role::findOrFail($id);
        $permission = Permission::findOrFail($permission_role->permission_id);
        $role = Role::findOrFail($permission_role->role_id);
          return view('Admin.Permission_roles.show',compact('permission_role','permission','role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          return view('Admin.Permission_roles.edit',['permission_role' => Permission_role::findOrFail($id),'roleid' => Role::pluck('name','id'),'permissionid' => Permission::pluck('namep','id')]);
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
