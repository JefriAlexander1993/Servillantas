@extends('layouts.admin')
@section('content')
	<div class="container">
		<div class="row">
			    <div class="col-sm-11">
			    	<h2>
						Asignar cita
			                <a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>   
			        </h2>


			           {!! Form::open(['route' => 'Appointments.store']) !!}

			           @include('Appointments.fragment.form')

			           {!! Form::close() !!}
    			</div>
				
		</div>		
	</div>
	


@endsection