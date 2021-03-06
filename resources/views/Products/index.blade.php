

@extends('layouts.admin')

@section('content')
    
    <div class="col-sm-10">
    	<h2>

    		Listado de productos.
    		<a href="{{ route('Products.create')}}" class="btn btn-success pull-right" title="Agregar producto"><i class="fa fa-plus-square"></i></a>
    	</h2>

    	<table class="table table-hover table-striped">
    		<thead>
    			<tr>
    	
    				<th>Nombre del producto</th>
                    <th>Codigo</th>
                    <th>Precio</th>
                    <th>Descripción</th>
    				<th colspan="3" class="text-center">Acción&nbsp;</th>
    			</tr>
    		</thead>
            <tbody>
            	@foreach($products as $product)
                <tr>
             
                	<td>{{ $product->name }}</td>
                    <td>{{$product->code}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->body}}</td>
                	<td>
                		<a href="{{ route('Products.show', $product->id)}}" class="btn btn-secundary  btn-xs" title="Ver producto"><i class="fa fa-eye"></i></a>
                	</td>
                	<td>
                	    <a href="{{ route('Products.edit', $product->id)}}" class="btn btn btn-primary  btn-xs" title="Editar producto"><i class="fa fa-edit"></i></a>
                	</td>
                	<td>
                		<form action="{{ route('Products.destroy', $product->id) }}" method="POST">
                			{{ csrf_field() }}
                			<input type="hidden" name="_method" value="DELETE">
                			<button class="btn btn btn-danger  btn-xs" title="Eliminar producto"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                		</form>
                	</td>
                </tr>
            	@endforeach
            </tbody>
    	</table>
        <div class="text-center">
            {!! $products->render() !!}
        </div>
    	
    </div>
    <div class="col-sm-2">
    	@include('Products.fragment.aside')
    </div>

@stop