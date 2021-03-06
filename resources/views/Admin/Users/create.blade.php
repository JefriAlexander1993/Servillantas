@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h2>
        Nuevo usuario
        <a class="btn btn-default pull-right" href="{{ route('Users.index')}}" title="Listado de todos los usuarios.">
            <i class="fa fa-list-ol">
            </i>
        </a>
    </h2>
    {!! Form::open(['url' => 'Users/register']) !!}

           @include('Admin.Users.fragment.form')

           {!! Form::close() !!}
</div>
<div class="col-sm-2">
    @include('Admin.Users.fragment.aside')
</div>
@endsection
