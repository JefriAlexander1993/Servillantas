@extends('layouts.admin')
   @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true) 
@section('content')

    <div class="col-sm-10">
    	<h2>

    		Listado de mecanicos.
    		<a href="{{ route('Mechanics.create')}}" class="btn btn-success pull-right" title="Agregar producto"><i class="fa fa-plus-square"></i></a>
    	</h2>

  
           

    <table class="table table-hover" style="margin-top:8px">
		  <tr>
		  	<th class="text-center">Nuip</th>
		  	<th class="text-center">Nombres</th>
		  	<th class="text-center">Apellidos</th>
		    <th class="text-center">Email</th>
		    <th class="text-center">Dirección</th>
		    <th class="text-center">Teléfono</th>
			<th colspan="3" class="text-center">Acción&nbsp;</th>
		  </tr>
		  @foreach($mechanics1 as $mechanic)
		    <tr>
		      <td class="text-center">{{ $mechanic->nuip }}</th>	
		      <td class="text-center">{{ $mechanic->name }}</th>
		      <td class="text-center">{{ $mechanic->lastname }}</th>	
		      <td class="text-center">{{ $mechanic->email }}</th>
		      <td class="text-center">{{ $mechanic->address }}</th>	
		      <td class="text-center">{{ $mechanic->phone }}</th>		
		     
		 
		      <td>
               		<a href="{{ route('Mechanics.show', $mechanic->id)}}" class="btn btn-secundary btn-xs " title="Ver Usuario"><i class="fa fa-eye"></i></a>
              </td>
              <td>
              	 <a class="btn btn-default btn-xs" href="{{ route('Mechanics.edit', $mechanic->id) }}"><i  class="fa fa-pencil-square-o " aria-hidden="true" title="Editar usuario"></i></a>

              </td>
		      <td>  <form action="{{ route('Mechanics.destroy', $mechanic->id) }}" method="post">
		          <input type="hidden" name="_method" value="DELETE">
		          <input type="hidden" name="_token" value="{{ csrf_token() }}">
		         
		          <button type="submit" class="btn  btn-danger btn-xs" title="Eliminar usuario"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
		        </form>
		      </td>  
		    
		    </tr>
		  @endforeach
		</table>


<!-- </div> -->
    	{!! $mechanics1->render() !!}
    </div>
  
    <div class="col-sm-2">
    	@include('Mechanics.fragment.aside')
    </div>
  @else
    		<h2>No estas autorizado.</h2>
   @endif
@endsection



