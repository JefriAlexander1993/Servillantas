@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			    <div class="col-sm-11">
			    	<h2>
						Asignar cita
						@role('ROL_ADMINISTRADOR')
			            <a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Listado de citas."><i class="fa fa-list-ol"></i></a>
			            @endrole   
			             <a href="{{ route('Appointments.myAppointments')}}" class="btn btn-default pull-right" title="Listado de mi citas."><i class="fa fa-list"></i></a>
			        </h2>


			           {!! Form::open(['route' => 'Appointments.store']) !!}

			           @include('Appointments.fragment.form')

			           {!! Form::close() !!}
    			</div>
				
		</div>		
	</div>
	


@endsection