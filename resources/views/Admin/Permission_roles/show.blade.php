@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Id del permiso: {{ $permission_role->permission_id }}</b>
      
                       <a href="{{ route('Permission_roles.edit', $permission_role->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>           
        </h2>
     
                     <a href="{{ route('Permission_roles.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
             
        <p><b> Id del rol:</b>
            {{ $permission_role->role_id }}
          
    </div>
    
    <div class="col-sm-2">
    	@include('Admin.Permission_roles.fragment.aside')
    </div>
@endsection