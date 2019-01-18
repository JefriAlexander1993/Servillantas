@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	
    	@foreach ($detalles as $detalle)
    	<h2>
            <b>Nombre:</b> {{ $detalle->name }}
          
        </h2>
          <a href="{{ route('Sales.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
        <p>
           <b> Codigo:</b> {{ $detalle->quantity}}
        </p>
        <p>
           <b> Precio:</b>   {!! $detalle->price !!}
        </p>
        <p>
           <b> Descripción:</b>   {!! $detalle->total !!}
        </p>
        @endforeach
    </div>
    <div class="text-center">
	{!! $detalles->render() !!}
	</div>
    <div class="col-sm-2">
    	@include('Sales.fragment.aside')
    </div>
@endsection