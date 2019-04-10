@extends('layouts.admin')

@section('content')

    <div class="col-sm-10">
    	<h2>

    		Listado de servicios.
    		<a href="{{ route('Services.create')}}" class="btn btn-success pull-right"><i class="fa fa-plus-square"></i></a>
    	</h2>

    	<table class="table table-hover table-striped">
    		<thead>
    			<tr>
    		        <th>Codigo</th>
    				<th>Nombre del Servicio</th>
                    <th>Precio</th>
                    <th class="text-center">Descripción</th>
    				<th colspan="3" class="text-center">Acción&nbsp;</th>
    			</tr>
    		</thead>
            <tbody>
            	@foreach($services1 as $service)
                <tr>
                    <td>{{ $service->codes}}</td>
                	<td>{{ $service->names }}</td>
                    <td>{{ $service->prices }}</td>
                    <td>{{ $service->bodys}}</td>
                	<td>
                		<a href="{{ route('Services.show', $service->id)}}" class="btn btn-link  btn-xs"><i class="fa fa-eye"></i></a>
                	</td>
                	<td>
                	    <a href="{{ route('Services.edit', $service->id)}}" class="btn btn-primary  btn-xs"><i class="fa fa-edit"></i></a>
                	</td>
                	<td>
                		<form action="{{ route('Services.destroy', $service->id) }}" method="POST">
                			{{ csrf_field() }}
                			<input type="hidden" name="_method" value="DELETE">
                			<button class="btn btn-danger  btn-xs"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                		</form>
                	</td>
                </tr>
            	@endforeach
            </tbody>
    	</table>
    	{!! $services1->render() !!}
    </div>
    <div class="col-sm-2">
    	@include('Services.fragment.aside')
    </div>

@endsection