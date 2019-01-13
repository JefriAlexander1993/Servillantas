@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>

    		Listado de Roles
    		<a href="{{ route('Roles.create')}}" class="btn btn-success pull-right" title="Agregar producto"><i class="fa fa-plus-square"></i></a>
    	</h2>
			<table class="table table-hover" style="margin-top:8px">
			    <tr>
			        <th>Nombre</th>
			        <th>Nombre a mostrar</th>
			        <th>Descripción</th>
			        <th colspan="3" class="text-center">Acción&nbsp;</th>

			    </tr>
			    @foreach($roles as $role)
			        <tr>
			            <td>{{ $role->name }}</th>
			         	<td>{{ $role->display_name }}</th>
			            <td>{{ $role->description}}</th>
		
			            <td>
                			<a href="{{ route('Roles.show', $role->id)}}" class="btn btn-secundary " title="Ver producto"><i class="fa fa-eye"></i></a>
                		</td>
                		<td>
                	    <a href="{{ route('Roles.edit', $role->id)}}" class="btn btn btn-primary " title="Editar producto"><i class="fa fa-edit"></i></a>
                		</td>
			            <td >
			      			<form action="{{ route('Roles.destroy', $role->id) }}" method="POST">
                			{{ csrf_field() }}
                			<input type="hidden" name="_method" value="DELETE">
                			<button class="btn btn btn-danger " title="Eliminar permiso"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                			</form>
			            </td>
			        </tr>
			    @endforeach
			</table>
   
    	{!! $roles->render() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Roles.fragment.aside')
    </div>

@endsection


