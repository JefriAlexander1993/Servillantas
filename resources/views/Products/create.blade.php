@extends('layouts.admin')

@section('content')

    <div class="col-sm-10">
    	<h2>
            Nuevo producto
                <a href="{{ route('Products.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>   
        </h2>


           {!! Form::open(['route' => 'Products.store']) !!}

           @include('Products.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Products.fragment.aside')
    </div>
@endsection