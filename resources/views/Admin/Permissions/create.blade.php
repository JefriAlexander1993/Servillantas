@extends('layouts.admin')

@section('content')

    <div class="col-sm-10">
    	<h2>
            Nuevo usuario
                <a href="{{ route('Permissions.index')}}" class="btn btn-default pull-right" title="Listado de todos los usuarios."><i class="fa fa-list-ol"></i></a>   
        </h2>


           {!! Form::open(['route' => 'Permissions.store']) !!}

           @include('Admin.Permissions.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Permissions.fragment.aside')
    </div>
@endsection