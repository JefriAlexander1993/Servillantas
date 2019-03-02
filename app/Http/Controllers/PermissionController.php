<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use App\Role;

class PermissionController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $namep= $request->get('namep');
        $descriptionp= $request->get('descriptionp');
        return view('Admin.Permissions.index', ['permissions'=>Permission::orderBy('id','desc')->name($namep)->description($descriptionp)->paginate('8')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Permissions.create' /*,['roles' =>Role::pluck('name','id')]*/);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permission = Permission::create($request->all())->save();
            return redirect()->route('Permissions.index')
                ->with('info','El permiso fue ha guardado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Admin.Permissions.show', ['permission'=> Permission::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.Permissions.edit', ['permission'=> Permission::findOrFail($id)/*, 'roles' =>Role::pluck('name','id')*/]);
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
        $permission = Permission::find($id)->update($request->all());

     
            return redirect()->route('Permissions.index')
                ->with('info','El permiso fue actualizado exitosamente.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id)->delete();

        return back()->with('danger','El permiso fue eliminado exitosamente.');
    }
}
