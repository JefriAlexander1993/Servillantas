@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Editar Rol
            <a href="{{ route('Roles.index')}}" class="btn btn-default pull-right" title="Listado de todos los roles."><i class="fa fa-list-ol"></i></a>   
        </h2>

           {!! Form::model($role, ['route' => ['Roles.update', $role->id], 'method' => 'PUT']) !!}

           @include('Admin.Roles.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Roles.fragment.aside')
    </div>
@endsection