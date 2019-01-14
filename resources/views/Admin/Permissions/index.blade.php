
@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>

    		Listado de permisos.
    		<a href="{{ route('Permissions.create')}}" class="btn btn-success pull-right" title="Agregar producto"><i class="fa fa-plus-square"></i></a>
    	</h2>
			<table class="table table-hover" style="margin-top:8px">
			    <tr>
			        <th>Nombre</th>
			        <th>Nombre a mostrar</th>
			        <th>Descripción</th>
			        <th colspan="3" class="text-center">Acción&nbsp;</th>

			    </tr>
			    @foreach($permissions as $permission)
			        <tr>
			            <td>{{ $permission->name }}</th>
			         	<td>{{ $permission->display_name }}</th>
			            <td>{{ $permission->description}}</th>
		
			            <td>
                			<a href="{{ route('Permissions.show', $permission->id)}}" class="btn btn-secundary  btn-xs" title="Ver producto"><i class="fa fa-eye"></i></a>
                		</td>
                		<td>
                	    <a href="{{ route('Permissions.edit', $permission->id)}}" class="btn btn btn-primary  btn-xs" title="Editar producto"><i class="fa fa-edit"></i></a>
                		</td>
			            <td >
			      			<form action="{{ route('Permissions.destroy', $permission->id) }}" method="POST">
                			{{ csrf_field() }}
                			<input type="hidden" name="_method" value="DELETE">
                			<button class="btn btn btn-danger  btn-xs" title="Eliminar permiso"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                			</form>
			            </td>
			        </tr>
			    @endforeach
			</table>
   
    	{!! $permissions->render() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Permissions.fragment.aside')
    </div>

@endsection


