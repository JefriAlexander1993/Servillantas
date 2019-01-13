@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Editar asignación de rol a usuario.
            <a href="{{ route('Role_users.index')}}" class="btn btn-default pull-right" title="Listado de todos los permisos asignado a roles."><i class="fa fa-list-ol"></i></a>   
        </h2>

           {!! Form::model($role_user, ['route' => ['Role_users.update', $role_user->id], 'method' => 'PUT']) !!}

           @include('Admin.Role_users.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Role_users.fragment.aside')
    </div>
@endsection