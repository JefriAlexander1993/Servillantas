 <input type="hidden" name="_token" value="{{csrf_token()}}" id="token"></input>
<div class="form-group">
	{!! Form::label('title','Titulo')!!}
	{!! Form::text('title',null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('license_plate', 'Placa del vehiculo')!!}
	{!! Form::text('license_plate',null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('date_end', 'Fecha de la cita')!!}
	<input type="datetime-local" name="date_end" class="form-control  date" value="">

</div>


<div class="form-group">
	{!! Form::label('color', 'Color')!!}
	{!! Form::color('color',null,['class'=> 'form-control']) !!}
</div>



<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>