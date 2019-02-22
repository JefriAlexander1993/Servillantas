@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h2>
        Listado de permisos.
        <a class="btn btn-success pull-right" href="{{ route('Permissions.create')}}" title="Agregar producto">
            <i class="fa fa-plus-square">
            </i>
        </a>
    </h2>
    <h3 class="pull-right">
        Busqueda:  
        
            {{Form::open(['route'=>'Permissions.index', 'method'=>'GET', 'class'=>'form-inline pull-right'])}}
        <div class="form-group">
            {{Form::text('namep', null,['class'=>'form-control','placeholder'=>'Nombre'])}}
        </div>
        <div class="form-group">
            {{Form::text('descriptionp', null,['class'=>'form-control','placeholder'=>'Descripción'])}}
        </div>
        <div class="form-group">
            <button class="btn btn-default" id="search" title="Busqueda" type="submit">
                <i class="fa fa-search">
                </i>
            </button>
        </div>
        <div class="form-group " id="cancel">
            <a class="btn btn-danger" href="{{url('/Permissions')}}" title="Cancelar busqueda">
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
        @foreach($permissions as $permission)
        <tr>
            <td>
                {{ $permission->name }}
            </td>
            <td>
                {{ $permission->display_name }}
            </td>
            <td>
                {{ $permission->description}}
            </td>
            <td>
                <a class="btn btn-secundary btn-xs" href="{{ route('Permissions.show', $permission->id)}}" title="Ver producto">
                    <i class="fa fa-eye">
                    </i>
                </a>
            </td>
            <td>
                <a class="btn btn btn-primary btn-xs" href="{{ route('Permissions.edit', $permission->id)}}" title="Editar producto">
                    <i class="fa fa-edit">
                    </i>
                </a>
            </td>
            <td>
                <form action="{{ route('Permissions.destroy', $permission->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="DELETE">
                        <button class="btn btn btn-danger btn-xs" title="Eliminar permiso">
                            <i aria-hidden="true" class="fa fa-trash-o">
                            </i>
                        </button>
                    </input>
                </form>
            </td>
            @endforeach
        </tr>
    </table>
</div>
<div class="text-center">
    {!! $permissions->render() !!}
</div>
<div class="col-sm-2">
    @include('Admin.Permissions.fragment.aside')
</div>
@endsection
