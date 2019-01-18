@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Editar ventas
            <a href="{{ route('Sales.index')}}" class="btn btn-default pull-right" title="Listado de todas las ventas."><i class="fa fa-list-ol"></i></a>   
        </h2>

            @foreach ($detalles as $detalle)

           {!! Form::model($detalle, ['route' => ['Sales.update', $detalle->id], 'method' => 'PUT']) !!}

           @include('Sales.fragment.form')

           {!! Form::close() !!}
            @endforeach

    </div>
    <div class="col-sm-2">
    	@include('Sales.fragment.aside')
    </div>
@endsection