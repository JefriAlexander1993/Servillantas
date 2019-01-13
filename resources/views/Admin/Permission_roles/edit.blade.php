@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Editar asignación de permiso a role.
            <a href="{{ route('Permission_roles.index')}}" class="btn btn-default pull-right" title="Listado de todos los permisos asignado a roles."><i class="fa fa-list-ol"></i></a>   
        </h2>

           {!! Form::model($permission_role, ['route' => ['Permissions.update', $permission_role->id], 'method' => 'PUT']) !!}

           @include('Admin.Permission_roles.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Permission_roles.fragment.aside')
    </div>
@endsection