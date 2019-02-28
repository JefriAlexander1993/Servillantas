<div class="form-group">
    {!! Form::label('title','Asunto (*)')!!}
	{!! Form::text('title',null,['class'=> 'form-control', 'required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('license_plate', 'Placa del vehiculo (*)')!!}
	{!! Form::text('license_plate',null,['class'=> 'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('date', 'Fecha de la cita (*)')!!}

   <input class="form-control date" name="date" required="" type="Date" value="<?php echo date("d-M-Y");?>">
    </input> 
</div>
<div class="form-group">
    {!! Form::label('hour_end', 'Hora de la cita (*)')!!}
    <input class="form-control date" name="hour_end" required="" type="Time" value="<?php echo date("H:i:s");  ?>">
    </input>
</div>
<div class="form-group">
    {!! Form::label('description ', 'Descripción (*)')!!}
	{!! Form::textarea('description',null,['class'=> 'form-control','required'=>'required','rows'=>"4"]) !!}
</div>
<div class="form-group text-center">
    {!!Form::button('
    <i aria-hidden="true" class="fa fa-floppy-o">
    </i>
    ', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block' ))!!}
</div>