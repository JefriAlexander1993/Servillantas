@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Nuevo servicio
            <a href="{{ route('Services.index')}}" class="btn btn-default pull-right"><i class="fa fa-list-ol"></i></a>   
        </h2>


           {!! Form::open(['route' => 'Services.store']) !!}

           @include('Services.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Services.fragment.aside')
    </div>
@stop