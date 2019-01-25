@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            {{ $product->name }}
      
                       <a href="{{ route('Products.edit', $product->id)}}" class="btn btn-primary pull-right" title="Editar producto"> <i class="fa fa-edit"></i></a>
           
        </h2>
     
                     <a href="{{ route('Products.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>
        <p><b>Codigo:</b>
            {{ $product->code}}
        </p><b>Precio:</b>

            {!! $product->price !!}
    </div>
    <div class="col-sm-2">
    	@include('Products.fragment.aside')
    </div>
@endsection