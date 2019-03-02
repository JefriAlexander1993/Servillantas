@extends('layouts.admin')

@section('content')
<div class="row"> 
    <h1 class="text-center"><b><ins>INFORMACIÓN DEL CLIENTE.</ins></b></h1>
    <div class="col-sm-4">
    	<h4>
           <b> NOMBRE: {{ $client->name_user }}</b>
      
            <a href="{{ route('Clients.edit', Auth::id())}}" class="btn btn-primary pull-right" title="Actualizar cliente"> <i class="fa fa-edit"></i></a>           
        </h4>
             
        <p><b>Apellidos:</b>
            {{ $client->lastname }}
        </p>
        <p><b>Nuip:</b>
            {{ $client->nuip }}
        </p>  
        <p><b>Email:</b>
            {{ $client->email }}
        </p>
        <p><b>Teléfono:</b>
            {{ $client->phone }}
        </p>  
        <p><b>Dirección:</b>
            {{ $client->address }}
        </p> 
    </div> 
    <div class="col-sm-8">   
        <h4 class="text-center"><b>VEHICULOS ASOCIADOS AL CLIENTE.</b></h4>
        <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Placa</th>
                        <th class="text-center">Linea</th>
                        <th class="text-center">Modelo</th>
                        <th class="text-center">Marca</th>
                        <th class="text-center">Kilometraje</th>
                        <!-- <th colspan="3" class="text-center">Acción&nbsp;</th> -->
                    </tr>
                </thead>
                <tbody>                  
                    @foreach($vehicles as $vehicle)
                    <tr>
                        <td class="text-center">{{ $vehicle->license_plate }}</td>
                        <td class="text-center">{{ $vehicle->line }}</td>
                        <td class="text-center">{{$vehicle->model}}</td>
                        <td class="text-center">{{$vehicle->brand}}</td>
                        <td class="text-center">{{$vehicle->mileage}}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>
@endsection