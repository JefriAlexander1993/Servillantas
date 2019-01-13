@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            <b>Nombre:</b> {{ $service->name }}
            <a href="{{ route('Services.edit', $service->id)}}" class="btn btn-primary pull-right"><i class="fa fa-edit"></i></a>   
        </h2>
          <a href="{{ route('Services.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
        <p>
           <b> Codigo:</b> {{ $service->code}}
        </p>
        <p>
           <b> Precio:</b>   {!! $service->price !!}
        </p>
        <p>
           <b> Descripción:</b>   {!! $service->body !!}
        </p>
    </div>
    <div class="col-sm-2">
    	@include('Services.fragment.aside')
    </div>
@endsection