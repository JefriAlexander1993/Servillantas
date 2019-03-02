@extends('layouts.admin')

  
@section('content')

<h2 class="text-center">
    <strong>
        MI CITAS
    </strong>
     @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true)
    	<a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Ver lista de citas"><i class="fa fa-list-ol"></i></a> 

							<a href="{{ route('Appointments.create')}}" class="btn btn-success pull-right" title="Agregar cita"><i class="fa fa-plus-square"></i></a>	
                            @endif
</h2>
<div class="col-lg-12">
    <div class="row">
        @foreach($appointments as $appointment )
        <div class="col-lg-3">
             <div class="box">
                 <div class="box-header with-border">
                    <h2 class="box-title">
                       <b>
                        {{$appointment->title}}
                       </b>
                    </h2>
                 </div>
            <div class="box-body">
                <p class="card-text">
	                <b>Placa: {{$appointment->license_plate}}</b>
	            </p>
                <p class="card-text">
                    <b>Fecha:</b> {{ date('d M Y', strtotime($appointment->date))}}
                </p> 
                <p class="card-text">
	            <b>Hora:</b> {{ date('H:i', strtotime($appointment->hour_end))}}
	            </p> 
                        <div class="row text-center">
            <div class="col-sm-3 card-text"><b>Acción:</b></div>
            <div class="col-sm-3 card-center">
                <a class="btn btn-sm btn-default btn-xs" href="{{route('Appointments.edit', $appointment->id)}}" id="edit" title="Editar cita.">
                                        <i class="fa fa-edit">
                                        </i>
                </a>
            </div>
            <div class="col-sm-3 card-center"> 
                <a class="btn btn-primary btn-xs" href="{{route('Appointments.show', $appointment->id)}}" title="Ver cita.">
                <i aria-hidden="true" class="fa fa-eye"></i>
                </a>
            </div>
            <div class="col-sm-3 card-center"> 
                <form action="{{route('Appointments.destroy', $appointment->id)}}" method="POST">
                   {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn-xs btn-danger" title="Eliminar cita.">
                            <i aria-hidden="true" class="fa fa-trash-o"></i>
                        </button>
                    </input>
                </form>
            </div>   
        </div>              
            </div> 

            </div>
        </div>    
        @endforeach
    </div>
</div>

@endsection