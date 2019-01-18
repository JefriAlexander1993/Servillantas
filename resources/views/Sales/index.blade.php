@extends('layouts.admin')
    @section('content')
<div class="row">
<div class="col-sm-10">
<div class="form-group">
<a href="{{route('Sales.create')}}" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
</div>
</div>
<div class="col-sm-2">
<div class="form-group">
{!!Form:: label('totalSales','Total de ventas')!!}
<input class="form-control" style="align:right" disabled  value="{{$totalSales}}"  type="text">
</div>
</div>
</div>

<div class="row">
<div class="col-sm-8" style="text-align:center"><h2><strong>LISTADO DE VENTAS.</strong></h2>
</div>
<div class="col-sm-4">
@include('Sales.fragment.aside') 
</div>
</div> 
<div class="col-md-12 table-responsive">
	<table class="table table-hover ">
	<thead>
		<tr>
		<th class="text-center">Id</th>
		<th class="text-center">Fecha</th>
		<th class="text-center">Total</th>
		<th class="text-center" colspan="3">Acción</th>	
        </tr>
	</thead>
	<tbody>
		@foreach ($sales0 as $sale1)
		   <tr>
			   <td align="center">{{$sale1->id}}</td>
			   <td align="center">{{$sale1->created_at}}</td>
		       <td align="center">{{$sale1->totalsale}}</td>
			   <td align="center"> <a href="{{route('Sales.show', $sale1->id)}}" class="btn btn-xs btn-default"><i class="fa fa-eye" aria-hcodigoden="true"></i></a>
			   </td>
			   	<td align="center">
               <a href="{{ route('Sales.edit', $sale1->id)}}" class="btn btn-primary  btn-xs"><i class="fa fa-edit"></i></a>
               </td>
			   <td align="center">
			   <form action="{{route('Sales.destroy', $sale1->id)}}" method="POST">
		       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
		       <input type="hidden" name="_method" value="DELETE">	
			   <button class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
			   </form>
			   </td>
		   </tr>
		@endforeach
	</tbody>
</table>
<div class="text-center">
	{!! $sales0->render() !!}
</div>
    	
</div>


@endsection