@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Editar producto
            <a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>   
        </h2>

           {!! Form::model($appointment, ['route' => ['Appointments.update', $appointment->id], 'method' => 'PUT']) !!}

           @include('Appointments.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Appointments.fragment.aside')
    </div>
@endsection