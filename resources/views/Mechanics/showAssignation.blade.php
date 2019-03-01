@extends('layouts.admin')

@section('content')
    @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true) 
    <div class="col-sm-12">
        <a href="{{ route('Mechanics.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
    </div>   
    @endif 
         @foreach($appointment1 as $appointment)
    	<h2>
      <b> Placa: {{ $appointment->license_plate}}</b>   
      </h2>
      <p><b>Asunto:</b>
            {{ $appointment->title}}
      </p><b>Fecha de cita:</b>
            {!!  date('d M Y', strtotime($appointment->date)) !!}
      </p>
      <p><b>Hora de cita:</b>
         	  {!!  date('H:i', strtotime($appointment->hour_end)) !!}
   		</p>
      <p>
            <b>Mecanico:</b>
            {!! $appointment->name_user !!}
      </p>
      {!! Form::model($appointment, ['route' => ['Appointments.updateAttended', $appointment->id], 'method' => 'PUT']) !!}
                  <div class="row">
                      <div class="col-sm-3">
                          <div class="card text-center">
                            <label class="custom-control custom-checkbox">
                                  <input type="checkbox" class="custom-control-input "  name="attended" value="Si">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description">Si</span>
                            </label>
                            <input type="text" name="nuipM" required class="form-control" value="Ingresa tu numero de nuip">
                             <br/>
                          <div class="list-control text-left">
                                {!!Form::button('
                                <i aria-hidden="true" class="fa fa-floppy-o">
                                </i>
                                ', array('type' => 'submit', 'class'=>'btn btn-success btn-sm btn-block'))!!}
                          </div>
                          </div> 
                       </div> 
                  </div>
           {!! Form::close() !!}
          @endforeach
@endsection