@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Asignar cita a mecanico.
            <a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>   
             <a href="{{ route('Appointments.edit', $appointment->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>
        </h2>

           {!! Form::model($appointment, ['route' => ['Appointments.assignationUpdate', $appointment->id], 'method' => 'PUT']) !!}

           @include('Appointments.fragment.formAssignation')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Appointments.fragment.aside')
    </div>
@endsection