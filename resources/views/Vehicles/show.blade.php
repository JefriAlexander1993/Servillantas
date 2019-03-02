@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Placa: {{ $vehicle->license_plate }}</b>
      
            <a href="{{ route('Vehicles.edit', $vehicle->id)}}" class="btn btn-primary pull-right" title="Actualizar cliente"> <i class="fa fa-edit"></i></a>
            @role('ROL_ADMINISTRADOR')
            <a href="{{ route('Vehicles.index')}}" class="btn btn-default pull-right" title="Listado de todos los vehiculos."><i class="fa fa-list-ol"></i></a> 
            @endrole

        </h2>
     
             
        <p><b>Linea:</b>
            {{ $vehicle->line }}
        </p>
             <p><b>Modelo:</b>
            {{ $vehicle->model }}
        </p>  
        <p><b>Marca:</b>
            {{ $vehicle->brand}}
         </p>
         <p><b>Kilometraje:</b>
            {{ $vehicle->mileage}}
         </p>
    </div>
    
    <div class="col-sm-2">
    	@include('Vehicles.fragment.aside')
    </div>
@endsection