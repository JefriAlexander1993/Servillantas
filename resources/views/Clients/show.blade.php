@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Nombres: {{ $client->name_user }}</b>
      
                       <a href="{{ route('Clients.edit', Auth::id())}}" class="btn btn-primary pull-right" title="Actualizar cliente"> <i class="fa fa-edit"></i></a>           
        </h2>
     
             
        <p><b>Apellidos:</b>
            {{ $client->lastname }}
        </p>
             <p><b>Nuip:</b>
            {{ $client->nuip }}
        </p>  
        <p><b>Fecha de nacimiento:</b>
            {{ $client->date_birth}}
         </p>
         <p><b>Dirección:</b>
            {{ $client->address}}
         </p>
         <p><b>Teléfono:</b>
            {{ $client->phone}}
         </p>
         <p><b>email:</b>
            {{ $client->email}}
         </p>
         <p><b>Vehiculo:</b>
            {{ $vehicle->brand}}
         </p>  
         <p><b>Placa:</b>
            {{ $vehicle->license_plate}}
         </p>  
          
    </div>
    
    <div class="col-sm-2">
    	@include('Clients.fragment.aside')
    </div>
@endsection