@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Actualizar cliente.
             <a href="{{ route('Clients.show',$client->id)}}" class="btn btn-default pull-right" title="Ver cliente."><i class="fa fa-eye"></i></a>  
          
        </h2>
           {!! Form::model($client, ['route' => ['Clients.update', $client->id], 'method' => 'PUT']) !!}

           @include('Clients.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Clients.fragment.aside')
    </div>
@endsection