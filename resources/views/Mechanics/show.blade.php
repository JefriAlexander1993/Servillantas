@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Nombres: {{ $mechanic->name_user }}</b>
      
                       <a href="{{ route('Mechanics.edit', Auth::id())}}" class="btn btn-primary pull-right" title="Actualizar cliente"> <i class="fa fa-edit"></i></a>           
        </h2>
     
             
        <p><b>Apellidos:</b>
            {{ $mechanic->lastname }}
        </p>
             <p><b>Nuip:</b>
            {{ $mechanic->nuip }}
        </p>  
        <p><b>Fecha de nacimiento:</b>
            {{ $mechanic->date_birth}}
         </p>
         <p><b>Dirección:</b>
            {{ $mechanic->address}}
         </p>
         <p><b>Teléfono:</b>
            {{ $mechanic->phone}}
         </p>
            <p><b>email:</b>
            {{ $mechanic->email}}
         </p>
      
          
    </div>
    
    <div class="col-sm-2">
    	@include('Mechanics.fragment.aside')
    </div>
@endsection