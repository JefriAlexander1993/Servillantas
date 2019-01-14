@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>

    		Listado de vehiculos.
    		<a href="{{ route('Vehicles.create')}}" class="btn btn-success pull-right" title="Agregar producto"><i class="fa fa-plus-square"></i></a>
    	</h2>

    	<table class="table table-hover table-striped">
    		<thead>
    			<tr>
    				<th class="text-center">Placa</th>
    				<th class="text-center">Linea</th>
                    <th class="text-center">Modelo</th>
                    <th class="text-center">Marca</th>
                    <th class="text-center">Kilometraje</th>
    				<th colspan="3" class="text-center">Acción&nbsp;</th>
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
                	<td>
                		<a href="{{ route('Vehicles.show', $vehicle->id)}}" class="btn btn-secundary btn-xs" title="Ver producto"><i class="fa fa-eye"></i></a>
                	</td>
                	<td>
                	    <a href="{{ route('Vehicles.edit', $vehicle->id)}}" class="btn btn btn-primary btn-xs " title="Editar producto"><i class="fa fa-edit"></i></a>
                	</td>
                	<td>
                		<form action="{{ route('Vehicles.destroy', $vehicle->id) }}" method="POST">
                			{{ csrf_field() }}
                			<input type="hidden" name="_method" value="DELETE">
                			<button class="btn btn btn-danger btn-xs " title="Eliminar producto"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                		</form>
                	</td>
                </tr>
            	@endforeach
            </tbody>
    	</table>
    	{!! $vehicles->render() !!}
    </div>
    <div class="col-sm-2">
    	@include('Products.fragment.aside')
    </div>

@stop