@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h1>
        Listado de usuarios.
        <a class="btn btn-xs btn-success pull-right" href="{{ route('Users.create')}}" title="Agregar usuarios">
            <i class="fa fa-plus-square">
            </i>
        </a>
    </h1>
    <h3 class="pull-right">
        Busqueda: 
        
            {{Form::open(['route'=>'Users.index', 'method'=>'GET', 'class'=>'form-inline pull-right'])}}
        <div class="form-group">
            {{Form::text('name_user', null,['class'=>'form-control','placeholder'=>'Nombre'])}}
        </div>
        <div class="form-group">
            {{Form::text('email', null,['class'=>'form-control','placeholder'=>'Email'])}}
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <i class="fa fa-search">
                </i>
            </button>
        </div>
        {{Form::close()}}
    </h3>
    <table class="table table-hover" style="margin-top:8px">
        <tr>
            <th class="text-center">
                Id
            </th>
            <th class="text-center">
                Nombre
            </th>
            <th class="text-center">
                Email
            </th>
         {{--    <th class="text-center">
                Rol
            </th> --}}
            <th class="text-center">
                Fecha de creación
            </th>
            <th class="text-center" colspan="3">
                Acción
            </th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td class="text-center">
                {{ $user->id }}
            </td>
            <td class="text-center">
                {{ $user->name_user }}
            </td>
            <td class="text-center">
                {{ $user->email }}
            </td>
     {{--        <td class="text-center">
                {{ $user->name }}
            </td> --}}
            <td class="text-center">
                {{ $user->created_at}}
            </td>
            <td>
                <a class="btn btn-secundary btn-xs " href="{{ route('Users.show', $user->id)}}" title="Ver Usuario">
                    <i class="fa fa-eye">
                    </i>
                </a>
            </td>
            <td>
                <a class="btn btn-default btn-xs" href="{{ route('Users.edit', $user->id) }}">
                    <i aria-hidden="true" class="fa fa-pencil-square-o " title="Editar usuario">
                    </i>
                </a>
            </td>
            <td>
                <form action="{{ route('Users.destroy', $user->id) }}" method="post">
                    <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <button class="btn btn-danger btn-xs" title="Eliminar usuario" type="submit">
                                <i aria-hidden="true" class="fa fa-trash-o">
                                </i>
                            </button>
                        </input>
                    </input>
                </form>
            </td>
            @endforeach
            <!-- </div> -->
            <div class="text-center">
                {!! $users->render() !!}
            </div>
        </tr>
    </table>
</div>
<div class="col-sm-2">
    @include('Admin.Users.fragment.aside')
</div>
@stop
