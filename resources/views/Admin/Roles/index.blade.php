@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h1>
        Listado de roles.
        <a class="btn btn-success pull-right" href="{{ route('Roles.create')}}" title="Agregar producto">
            <i class="fa fa-plus-square">
            </i>
        </a>
    </h1>
    <h3 class="pull-right">
        Busqueda:  
        
            {{Form::open(['route'=>'Roles.index', 'method'=>'GET', 'class'=>'form-inline pull-right'])}}
        <div class="form-group">
            {{Form::text('name', null,['class'=>'form-control','placeholder'=>'Nombre'])}}
        </div>
        <div class="form-group">
            {{Form::text('description', null,['class'=>'form-control','placeholder'=>'Descripción'])}}
        </div>
        <div class="form-group">
            <button class="btn btn-default" id="search" title="Busqueda" type="submit">
                <i class="fa fa-search">
                </i>
            </button>
        </div>
        <div class="form-group " id="cancel">
            <a class="btn btn-danger" href="{{url('/Roles')}}" title="Cancelar busqueda">
                <i class="fa fa-ban">
                </i>
            </a>
        </div>
        {{Form::close()}}
    </h3>
    <table class="table table-hover" style="margin-top:8px">
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Nombre a mostrar
            </th>
            <th>
                Descripción
            </th>
            <th class="text-center" colspan="3">
                Acción
            </th>
        </tr>
        @foreach($roles as $role)
        <tr>
            <td>
                {{ $role->name }}
            </td>
            <td>
                {{ $role->display_name }}
            </td>
            <td>
                {{ $role->description}}
            </td>
            <td>
                <a class="btn btn-secundary btn-xs" href="{{ route('Roles.show', $role->id)}}" title="Ver rol">
                    <i class="fa fa-eye">
                    </i>
                </a>
            </td>
            <td>
                <a class="btn btn btn-primary btn-xs" href="{{ route('Roles.edit', $role->id)}}" title="Editar rol">
                    <i class="fa fa-edit">
                    </i>
                </a>
            </td>
            <td>
                <form action="{{ route('Roles.destroy', $role->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn btn-danger btn-xs " title="Eliminar permiso">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </button>
                    </input>
                </form>
            </td>
            @endforeach
            <div class="text-center">
                {!! $roles->render() !!}
            </div>
        </tr>
    </table>
</div>
<div class="col-sm-2">
    @include('Admin.Roles.fragment.aside')
</div>
@endsection
