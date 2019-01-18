@extends('layouts.admin')

@section('content')

    <div class="col-sm-12">
    	<h2>
            <strong>Nueva ventas</strong>
                <a href="{{ route('Sales.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>   
        </h2>


           {!! Form::open(['route' => 'Sales.store']) !!}

           @include('Sales.fragment.form')

           {!! Form::close() !!}
    </div>
 
@endsection