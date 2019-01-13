@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>
            Editar Usuario
            <a href="{{ route('Users.index')}}" class="btn btn-default pull-right" title="Listado de todos los productos."><i class="fa fa-list-ol"></i></a>   
        </h2>

           {!! Form::model($user, ['route' => ['Users.update', $user->id], 'method' => 'PUT']) !!}

           @include('Admin.Users.fragment.form')

           {!! Form::close() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Users.fragment.aside')
    </div>
@endsection