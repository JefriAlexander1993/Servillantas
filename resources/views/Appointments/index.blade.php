@extends('layouts.admin')

  
@section('content')

    

<div class="container" >

		<div class="row">
			<div class="col-md-9">
				<div class="panel panel-default" align="center">
					<div class="panel-heading" style="background: #2e6da4; color:white">
						<h4><strong>Listado de citas.</strong><a href="{{ url('Calendary')}}" class="btn btn-info pull-right" title="Ir al canlendario" id="calendary"><i class="fa fa-calendar"></i></a>
    </h4>
					</div>
					<div class="panel-body" >
									<table class="table table-hover">
										    <thead>
										        <tr>
										        <th  class="text-center">Id</th>
										        <th  class="text-center">Placa</th>
										        <th  class="text-center">Asunto</th>
										        <th  class="text-center" style="background: red;color:white">Fecha de la cita</th>
										        <th  class="text-center" style="background: red;color:white">Hora de la cita</th>
										        <th  class="text-center"colspan="3" >Acción</th>	
										        </tr>
										        </thead>
										    <tbody>
										        @foreach ($appointments as $appointment)
										       <tr>
										       <td align="center">{{$appointment->id}}</td>
										       <td align="center">{{$appointment->license_plate}}</td>
										       <td align="center">{{$appointment->title}}</td>
										       <td align="center">{{ date('d M Y', strtotime($appointment->date_end))}}</td>
										       <td align="center">{{ date('H:i', strtotime($appointment->date_end))}}</td>
										       <td><a title="Cerrar appointment." id="edit" href="{{route('Appointments.edit', $appointment->id)}}" class="btn btn-sm btn-secundary  btn-xs"><i class="fa fa-edit"></i></a></td>
											   <td><a title="Ver appointment." href="{{route('Appointments.show', $appointment->id)}}" class="btn btn-primary  btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										       <td><form action="{{route('Appointments.destroy', $appointment->id)}}" method="POST">
										       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
										       <input type="hidden" name="_method" value="DELETE">	
											   <button title="Eliminar appointment." class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
											   </form>
											   </td>
										       </tr>
										       @endforeach
										        </tbody>
										        </table>
								<div class="col-md-11" align="center" >
								{!!$appointments->render() !!}
								<?php 
								echo phpversion('tidy');
								?>
								</div>
					</div>	
				</div>
			</div>
				<div class="col-sm-2">
				    	@include('Appointments.fragment.aside')
				</div>

		</div>

</div>

@endsection