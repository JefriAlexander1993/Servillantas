@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Editar Servicio
             <a href="{{ route('Services.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a> 
        </h2>


           {!! Form::model($service, ['route' => ['Services.update', $service->id], 'method' => 'PUT']) !!}

           @include('Services.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Services.fragment.aside')
    </div>
@endsection