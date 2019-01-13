@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>

    		Listado de asiganciones de roles a usuario.
    		<a href="{{ route('Role_users.create')}}" class="btn btn-success pull-right" title="Agregar producto"><i class="fa fa-plus-square"></i></a>
    	</h2>
			<table class="table table-hover" style="margin-top:8px">
			    <tr>
			        <th>Id del usuario</th>
			        <th>Id del rol</th>
			        <th colspan="3" class="text-center">Acción&nbsp;</th>

			    </tr>
			    @foreach($role_users1 as $role_user)
			        <tr>
			            <td>{{ $role_user->user_id }}</th>
			         	<td>{{ $role_user->role_id }}</th>
		
			            <td>
                			<a href="{{ route('Role_users.show', $role_user->id)}}" class="btn btn-secundary " title="Ver asigancion de rol a un usuario"><i class="fa fa-eye"></i></a>
                		</td>
                		<td>
                	    <a href="{{ route('Role_users.edit', $role_user->id)}}" class="btn btn btn-primary " title="Editar una asigancion de rol a un usuario"><i class="fa fa-edit"></i></a>
                		</td>
			            <td >
			      			<form action="{{ route('Role_users.destroy', $role_user->id) }}" method="POST">
                			{{ csrf_field() }}
                			<input type="hidden" name="_method" value="DELETE">
                			<button class="btn btn btn-danger " title="Eliminar asigancion de rol a un usuario"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                			</form>
			            </td>
			        </tr>
			    @endforeach
			</table>
   
    	{!! $role_users1->render() !!}
    </div>
    <div class="col-sm-2">
    	@include('Admin.Permission_roles.fragment.aside')
    </div>

@endsection


