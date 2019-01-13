@extends('layouts.admin')

@section('content')
     @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true) 
    <div class="col-sm-10">
    	<h2>

    		Listado de Clientes.
    		<a href="{{ route('Users.create')}}" class="btn btn-success pull-right" title="Agregar producto"><i class="fa fa-plus-square"></i></a>
    	</h2>
           
    <table class="table table-hover" style="margin-top:8px">
		  <tr>
		  	<th class="text-center">NUip</th>
		  	<th class="text-center">Nombres</th>
		  	<th class="text-center">Apellidos</th>
		    <th class="text-center">Email</th>
		    <th class="text-center">Dirección</th>
		    <th class="text-center">Teléfono</th>
			<th colspan="3" class="text-center">Acción&nbsp;</th>
		  </tr>
		  @foreach($users as $user)
		    <tr>
		      <td class="text-center">{{ $user->nuip }}</th>	
		      <td class="text-center">{{ $user->name }}</th>
		      <td class="text-center">{{ $user->lastname }}</th>	
		      <td class="text-center">{{ $user->email }}</th>
		      <td class="text-center">{{ $user->address }}</th>	
		      <td class="text-center">{{ $user->phone }}</th>		
		     
		 
		      <td>
               		<a href="{{ route('Users.show', $user->id)}}" class="btn btn-secundary btn-xs " title="Ver Usuario"><i class="fa fa-eye"></i></a>
              </td>
              <td>
              	 <a class="btn btn-default btn-xs" href="{{ route('Users.edit', $user->id) }}"><i  class="fa fa-pencil-square-o " aria-hidden="true" title="Editar usuario"></i></a>

              </td>
		      <td>  <form action="{{ route('Users.destroy', $user->id) }}" method="post">
		          <input type="hidden" name="_method" value="DELETE">
		          <input type="hidden" name="_token" value="{{ csrf_token() }}">
		         
		          <button type="submit" class="btn  btn-danger btn-xs" title="Eliminar usuario"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		        </form>
		      </td>  
		    
		    </tr>
		  @endforeach
		</table>


<!-- </div> -->
    	{!! $users->render() !!}
    </div>

    <div class="col-sm-2">
    	@include('Admin.Users.fragment.aside')
    </div>
        @else
    		<h2 class="text-center">No estas autorizado.</h2>
    @endif

@stop



