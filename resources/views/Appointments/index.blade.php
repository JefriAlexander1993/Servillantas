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
										        <th  class="text-center">Placa</th>
										        <th  class="text-center">Asunto</th>
										        <th  class="text-center" style="background: red;color:white">Fecha de la cita</th>
										        <th  class="text-center" style="background: red;color:white">Hora de la cita</th>
										        <th  class="text-center" >Estado</th>
										        <th  class="text-center"colspan="4" >Acción</th>	
										        </tr>
										        </thead>
										    <tbody>
										        @foreach ($appointments as $appointment)
										       <tr      @if($appointment->user_id == null)
										       				 style="background-color:#EF5350;color:#fff",
										       			@else
										       			 style="background-color:green;color:#fff",

       													@endif

										       	>
										       <td align="center">{{$appointment->license_plate}}</td>
										       <td align="center">{{$appointment->title}}</td>
										       <td align="center">{{ date('d M Y', strtotime($appointment->date_end))}}</td>
										       <td align="center">{{ date('H:i', strtotime($appointment->date_end))}}</td>
										       <td align="center">{{$appointment->state}}</td>	
										     	<td><a  type="button" title="Asignar cita." id="asignar" href="{{url('Appointments/assignation', $appointment->id)}}" class="btn bg-olive btn-flat btn-xs"><i class="fa fa-check-square-o"></i></a></td>
										       <td><a title="Editar cita." id="edit" href="{{route('Appointments.edit', $appointment->id)}}" class="btn btn-sm btn-default  btn-xs"><i class="fa fa-edit"></i></a></td>
										      
											   <td><a title="Ver cita." href="{{route('Appointments.show', $appointment->id)}}" class="btn btn-primary  btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										       <td><form action="{{route('Appointments.destroy', $appointment->id)}}" method="POST">
										       {{csrf_field()}} <!--Toque para que sea eliminado por la aplicacion-->
										       <input type="hidden" name="_method" value="DELETE">	
											   <button title="Eliminar cita." class="btn btn-xs btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>	
											   </form>
											   </td>
										       </tr>
										       @endforeach
										        </tbody>
										        </table>
								<div class="text-center" >
								{!!$appointments->render() !!}
							
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