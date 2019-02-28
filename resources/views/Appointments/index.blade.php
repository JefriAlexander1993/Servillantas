@extends('layouts.admin')

  
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div align="center" class="panel panel-default">
                <div class="panel-heading" style="background: #2e6da4; color:white">
                    <h4>
                        <strong>
                            Listado de citas.
                        </strong>
                        <a class="btn btn-info pull-right" href="{{ url('Calendary')}}" id="calendary" title="Ir al canlendario">
                            <i class="fa fa-calendar">
                            </i>
                        </a>
                    </h4>
                </div>
                <h3 class="pull-right">
                    Busqueda:  
        
            {{Form::open(['route'=>'Appointments.index', 'method'=>'GET', 'class'=>'form-inline pull-right'])}}
                    <div class="form-group">
                        {{Form::text('license', null,['class'=>'form-control','placeholder'=>'Placa'])}}
                    </div>
                    <div class="form-group">
                        {{Form::text('title', null,['class'=>'form-control','placeholder'=>'Asunto'])}}
                    </div>
                   
                    <div class="form-group">
                        <button class="btn btn-default" id="search" title="Busqueda" type="submit">
                            <i class="fa fa-search">
                            </i>
                        </button>
                    </div>
                    <div class="form-group " id="cancel">
                        <a class="btn btn-danger" href="{{url('/Appointments')}}" title="Cancelar busqueda">
                            <i class="fa fa-ban">
                            </i>
                        </a>
                    </div>
                    {{Form::close()}}
                </h3>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    Placa
                                </th>
                                <th class="text-center">
                                    Asunto
                                </th>
                                <th class="text-center" style="background: red;color:white">
                                    Fecha de la cita
                                </th>
                                <th class="text-center" style="background: red;color:white">
                                    Hora de la cita
                                </th>
                                <th class="text-center">
                                    Estado
                                </th>
                                <th class="text-center">
                                    Atendida
                                </th>
                                <th class="text-center" colspan="4">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                            <tr  @if(
                                $appointment->user_id === null)
										       				 style="background-color:#EF5350;color:#fff",
										       			@else
										       			 style="background-color:green;color:#fff",

       													@endif

										       	>
                                <td align="center">
                                    {{$appointment->license_plate}}
                                </td>
                                <td align="center">
                                    {{$appointment->title}}
                                </td>
                                <td align="center">
                                    {{ date('d M Y', strtotime($appointment->date))}}
                                </td>
                                <td align="center">
                                    {{ date('H:i', strtotime($appointment->hour_end))}}
                                </td>
                                <td align="center">
                                    {{$appointment->state}}
                                </td>
                                <td align="center">
                                    {{$appointment->attended}}
                                </td>
                                <td>
                                    <a class="btn bg-olive btn-flat btn-xs" href="{{url('Appointments/assignation', $appointment->id)}}" id="asignar" title="Asignar cita." type="button">
                                        <i class="fa fa-check-square-o">
                                        </i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-default btn-xs" href="{{route('Appointments.edit', $appointment->id)}}" id="edit" title="Editar cita.">
                                        <i class="fa fa-edit">
                                        </i>
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-xs" href="{{route('Appointments.show', $appointment->id)}}" title="Ver cita.">
                                        <i aria-hidden="true" class="fa fa-eye">
                                        </i>
                                    </a>
                                </td>
                                <td>
                                    <form action="{{route('Appointments.destroy', $appointment->id)}}" method="POST">
                                        {{csrf_field()}}
                                        <!--Toque para que sea eliminado por la aplicacion-->
                                        <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-xs btn-danger" title="Eliminar cita.">
                                                <i aria-hidden="true" class="fa fa-trash-o">
                                                </i>
                                            </button>
                                        </input>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
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
