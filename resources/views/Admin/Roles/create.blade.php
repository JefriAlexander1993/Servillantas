@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h2>
        Nuevo Rol
        <a class="btn btn-default pull-right" href="{{ route('Roles.index')}}" title="Listado de todos los usuarios.">
            <i class="fa fa-list-ol">
            </i>
        </a>
    </h2>
    {!! Form::open(['route' => 'Roles.store']) !!}

           @include('Admin.Roles.fragment.form')

           {!! Form::close() !!}
</div>
<div class="col-sm-2">
    @include('Admin.Roles.fragment.aside')
</div>
@endsection
