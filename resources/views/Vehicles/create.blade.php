@extends('layouts.admin')

@section('content')

    <div class="col-sm-10">
    	<h2>
            Nuevo vehiculo.
            @role('ROL_ADMINISTRADOR')
                <a href="{{ route('Vehicles.index')}}" class="btn btn-default pull-right" title="Listado de todos los vehiculos."><i class="fa fa-list-ol"></i></a>   
             @endrole   
        </h2>


           {!! Form::open(['route' => 'Vehicles.store']) !!}

           @include('Vehicles.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Vehicles.fragment.aside')
    </div>
@endsection