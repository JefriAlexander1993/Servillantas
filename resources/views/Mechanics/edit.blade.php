@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Actualizar Mecanico.
             <a href="{{ route('Mechanics.show',Auth::id())}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-eye"></i></a>  
          
        </h2>

           {!! Form::model($mechanic, ['route' => ['Mechanics.update', Auth::id()], 'method' => 'PUT']) !!}

           @include('Mechanics.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Mechanics.fragment.aside')
    </div>
@endsection