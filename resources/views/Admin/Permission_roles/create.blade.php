@extends('layouts.admin')

@section('content')

    <div class="col-sm-10">
    	<h2>
            Asignación de  permiso a un rol.
                <a href="{{ route('Permission_roles.index')}}" class="btn btn-default pull-right" title="Listado de todos los usuarios."><i class="fa fa-list-ol"></i></a>   
        </h2>


           {!! Form::open(['route' => 'Permission_roles.store']) !!}

           @include('Admin.Permission_roles.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Permission_roles.fragment.aside')
    </div>
@endsection