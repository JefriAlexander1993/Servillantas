@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-12">
    	<h2>
            Editar cita
           @role('ROL_ADMINISTRADOR')
            <a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Listado de citas."><i class="fa fa-list-ol"></i></a>
            @endrole   
             <a href="{{ route('Appointments.myAppointments')}}" class="btn btn-default pull-right" title="Listado de mi citas."><i class="fa fa-list"></i></a>
        </h2>

           {!! Form::model($appointment, ['route' => ['Appointments.update', $appointment->id], 'method' => 'PUT']) !!}
           @include('Appointments.fragment.form')
           {!! Form::close() !!}
    </div>
   
@endsection