<div class="form-group">
    {!! Form::label('title','Asunto (*)')!!}
	{!! Form::text('title',null,['class'=> 'form-control', 'required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('license_plate', 'Placa del vehiculo (*)')!!}
	{!! Form::text('license_plate',null,['class'=> 'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('date_end', 'Fecha de la cita (*)')!!}
    <input class="form-control date" name="date_end" required="" type="datetime-local" value="">
    </input>
</div>
<div class="form-group">
    {!! Form::label('color', 'Color (*)')!!}
	{!! Form::color('color',null,['class'=> 'form-control','required'=>'required']) !!}
</div>
<div class="form-group text-center">
    {!!Form::button('
    <i aria-hidden="true" class="fa fa-floppy-o">
    </i>
    ', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block' ))!!}
</div>