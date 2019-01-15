@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
        <a href="{{ route('Mechanics.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
         @foreach($appointment1 as $appointment)
    	<h2>
           <b> Placa: {{ $appointment->license_plate}}</b>
           
        </h2>
     
                     
        <p><b>Asunto:</b>
            {{ $appointment->title}}
        </p><b>Fecha de cita:</b>

            {!!  date('d M Y', strtotime($appointment->date_end)) !!}
         </p>
         <p><b>Hora de cita:</b>
         	  {!!  date('H:i', strtotime($appointment->date_end)) !!}
   		  </p>
          <p>
            <b>Mecanico:</b>
            {!! $appointment->name_user !!}
          </p>
            
          @endforeach
    </div>

    <div class="col-sm-12 text-center">
    {!!$appointment1->render()!!}	
    </div>
@endsection