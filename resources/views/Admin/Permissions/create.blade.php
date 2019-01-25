@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h2>
        Nuevo permisos
        <a class="btn btn-default pull-right" href="{{ route('Permissions.index')}}" title="Listado de todos los usuarios.">
            <i class="fa fa-list-ol">
            </i>
        </a>
    </h2>
    {!! Form::open(['route' => 'Permissions.store']) !!}

           @include('Admin.Permissions.fragment.form')

           {!! Form::close() !!}
</div>
<div class="col-sm-2">
    @include('Admin.Permissions.fragment.aside')
</div>
@endsection
