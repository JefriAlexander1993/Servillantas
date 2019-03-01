@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Nombre del usuario: {{ $user->name_user }}</b>
      
                       <a href="{{ route('Role_users.edit', $role_user->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>           
        </h2>
     
                     <a href="{{ route('Role_users.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
             
        <p><b> Nombre del rol:</b>
            {{ $role->name }}
          
    </div>
    
    <div class="col-sm-2">
    	@include('Admin.Role_users.fragment.aside')
    </div>
@endsection