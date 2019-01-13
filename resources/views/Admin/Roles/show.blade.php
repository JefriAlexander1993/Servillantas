@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Nombre: {{ $role->name }}</b>
      
                       <a href="{{ route('Roles.edit', $role->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>           
        </h2>
     
                     <a href="{{ route('Roles.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
             
        <p><b>Nombre a mostrar:</b>
            {{ $role->display_name }}
        </p>
             <p><b>Descripción:</b>
            {{ $role->description }}
        </p>  
 
          
    </div>
    
    <div class="col-sm-2">
    	@include('Admin.Roles.fragment.aside')
    </div>
@endsection