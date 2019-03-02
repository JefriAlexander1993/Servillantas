@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h2>
        Listado de clientes.

    </h2>
    <table class="table table-hover" style="margin-top:8px">
        <tr>
            <th class="text-center">
                Nuip
            </th>
            <th class="text-center">
                Nombres
            </th>
            <th class="text-center">
                Apellidos
            </th>
            <th class="text-center">
                Email
            </th>
            <th class="text-center">
                Dirección
            </th>
            <th class="text-center">
                Teléfono
            </th>
            <th class="text-center" colspan="3">
                Acción
            </th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td class="text-center">
                {{ $user->nuip }}
            </td>
            <td class="text-center">
                {{ $user->name_user }}
            </td>
            <td class="text-center">
                {{ $user->lastname }}
            </td>
            <td class="text-center">
                {{ $user->email }}
            </td>
            <td class="text-center">
                {{ $user->address }}
            </td>
            <td class="text-center">
                {{ $user->phone }}
            </td>
            <td>
                <a class="btn btn-secundary btn-xs " href="{{ route('Clients.show', $user->id)}}" title="Ver cliente">
                    <i class="fa fa-eye">
                    </i>
                </a>
            </td>
            <td>
                <a class="btn btn-default btn-xs" href="{{ route('Clients.edit', $user->id) }}">
                    <i aria-hidden="true" class="fa fa-pencil-square-o " title="Editar cliente">
                    </i>
                </a>
            </td>
            <td>
                <form action="{{ route('Clients.destroy', $user->id) }}" method="post">
                    <input name="_method" type="hidden" value="DELETE">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <button class="btn btn-danger btn-xs" title="Eliminar cliente" type="submit">
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
