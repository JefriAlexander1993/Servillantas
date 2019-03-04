@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
        <h1 class="text-center"><b>CITA</b></h1>
    	<h2>
           <b> Placa: {{ $appointment->license_plate}}</b>
      
                       <a href="{{ route('Appointments.edit', $appointment->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>
           
        </h2>
             
        <p><b>Asunto:</b>
            {{ $appointment->title}}
        </p><b>Fecha de cita:</b>

            {!!  date('d M Y', strtotime($appointment->date_end)) !!}
         </p>
         <p><b>Hora de cita:</b>
         	  {!!  date('H:i', strtotime($appointment->date_end)) !!}
   		  </p>
          
    </div>
    <div class="col-sm-2">
        @role('ROL_ADMINISTRADOR')
            <a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Listado de citas."><i class="fa fa-list-ol"></i></a>
            @endrole   
             <a href="{{ route('Appointments.myAppointments')}}" class="btn btn-default pull-right" title="Listado de mi citas."><i class="fa fa-list"></i></a>
    </div>
@endsection