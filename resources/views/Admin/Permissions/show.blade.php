@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Nombre: {{ $permission->namep }}</b>
      
                       <a href="{{ route('Permissions.edit', $permission->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>           
        </h2>
     
                     <a href="{{ route('Permissions.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
             
        <p><b>Nombre a mostrar:</b>
            {{ $permission->display_name }}
        </p>
             <p><b>Descripción:</b>
            {{ $permission->description }}
        </p>  
 
          
    </div>
    
    <div class="col-sm-2">
    	@include('Admin.Permissions.fragment.aside')
    </div>
@endsection