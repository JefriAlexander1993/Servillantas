@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h2>
        <b>
            Nombres: {{ $user->name_user }}
        </b>
        <a class="btn btn-primary pull-right" href="{{ route('Users.edit', $user->id)}}" title="Editar producto">
            <i class="fa fa-edit">
            </i>
        </a>
    </h2>
    <a class="btn btn-default pull-right" href="{{ route('Users.index')}}" title="Listado de todos los productos.">
        <i class="fa fa-list-ol">
        </i>
    </a>
    <p>
        <b>
            Apellidos:
        </b>
        {{ $user->lastname }}
    </p>
    <p>
        <b>
            Nuip:
        </b>
        {{ $user->nuip }}
    </p>
    <p>
        <b>
            Fecha de nacimiento:
        </b>
        {{ $user->date_birth}}
    </p>
    <p>
        <b>
            Dirección:
        </b>
        {{ $user->address}}
    </p>
    <p>
        <b>
            Teléfono:
        </b>
        {{ $user->phone}}
    </p>
    <p>
        <b>
            Email:
        </b>
        {{ $user->email}}
    </p>
</div>
<div class="col-sm-2">
    @include('Products.fragment.aside')
</div>
@endsection
