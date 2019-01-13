@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
           <b> Placa: {{ $appointment->license_plate}}</b>
      
                       <a href="{{ route('Appointments.edit', $appointment->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>
           
        </h2>
     
                     <a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
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
    	@include('Products.fragment.aside')
    </div>
@endsection