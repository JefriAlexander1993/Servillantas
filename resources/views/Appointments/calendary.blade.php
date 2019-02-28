@extends('layouts.admin')

  
@section('content')

<h2 class="text-center">
    <strong>
        Citas
    </strong>
    	<a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Ver lista de citas"><i class="fa fa-list-ol"></i></a> 

							<a href="{{ route('Appointments.create')}}" class="btn btn-success pull-right" title="Agregar cita"><i class="fa fa-plus-square"></i></a>	
</h2>
<div class="col-lg-12">
    <div class="row">
        @foreach($appointments as $appointment )
            <div class="col-sm-3">
             <div class="box">
                                <div class="box-header with-border">
                                    <h2 class="box-title">
                                        <b>
                                           {{$appointment->title}}
                                        </b>
                                    </h2>
                                </div>
                                <!-- /.box-header -->
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

                                </div>
                            </div>
             </div>    

   
     
      
        @endforeach
    </div>
</div>

@endsection