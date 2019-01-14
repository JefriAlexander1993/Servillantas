@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Actualizar vehiculo.
             <a href="{{ route('Vehicles.show', $vehicle->id)}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-eye"></i></a>  
          
        </h2>

           {!! Form::model($vehicle, ['route' => ['Vehicles.update', Auth::id()], 'method' => 'PUT']) !!}

           @include('Vehicles.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Vehicles.fragment.aside')
    </div>
@endsection