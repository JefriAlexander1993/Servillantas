@extends('layouts.admin')

@section('content')

    <div class="col-sm-10">
    	<h2>
            Asignación de un rol a un usuario.
                <a href="{{ route('Role_users.index')}}" class="btn btn-default pull-right" title="Listado de todos los usuarios."><i class="fa fa-list-ol"></i></a>   
        </h2>


           {!! Form::open(['route' => 'Role_users.store']) !!}

           @include('Admin.Role_users.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Role_users.fragment.aside')
    </div>

 @endsection   
