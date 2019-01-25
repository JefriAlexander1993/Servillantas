@extends('layouts.admin')
 
@section('content')
<div class="col-sm-10">
    <h2>
        Listado de mecanicos.
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
        @foreach($mechanics1 as $mechanic)
        <tr>
            <td class="text-center">
                {{ $mechanic->nuip }}
            </td>
            <td class="text-center">
                {{ $mechanic->name_user }}
            </td>
            <td class="text-center">
                {{ $mechanic->lastname }}
            </td>
            <td class="text-center">
                {{ $mechanic->email }}
            </td>
            <td class="text-center">
                {{ $mechanic->address }}
            </td>
            <td class="text-center">
                {{ $mechanic->phone }}
            </td>
            <td>
                <a class="btn btn-secundary btn-xs " href="{{ route('Mechanics.show', $mechanic->id)}}" title="Ver Usuario">
                    <i class="fa fa-eye">
                    </i>
                </a>
            </td>
            <td>
                <a class="btn btn-default btn-xs" href="{{ route('Mechanics.edit', $mechanic->id) }}">
                    <i aria-hidden="true" class="fa fa-pencil-square-o " title="Editar usuario">
                    </i>
                </a>
            </td>
            <td>
                <form action="{{ route('Mechanics.destroy', $mechanic->id) }}" method="post">
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
                {!! $mechanics1->render() !!}
            </div>
        </tr>
    </table>
</div>
<div class="col-sm-2">
    @include('Mechanics.fragment.aside')
</div>
@endsection
