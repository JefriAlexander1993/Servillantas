@extends('layouts.admin')

  
@section('content')

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    
<div class="container" >

		<div class="row">
			<div class="col-md-11">
				<div class="panel panel-default" align="center">
					<div class="panel-heading" style="background: #2e6da4; color:white">
						<h4><strong>Cita</strong>
							<a href="{{ route('Appointments.index')}}" class="btn btn-default pull-right" title="Ver lista de citas"><i class="fa fa-list-ol"></i></a> 

							<a href="{{ route('Appointments.create')}}" class="btn btn-success pull-right" title="Agregar cita"><i class="fa fa-plus-square"></i></a>			
						</h4>
					</div>
					<div class="panel-body" >
						{!!$calendar->calendar()!!}
						{!!$calendar->script()!!}
					</div>	
				</div>
			</div>
		</div>

</div>
 
@endsection