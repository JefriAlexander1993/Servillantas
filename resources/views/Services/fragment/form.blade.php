<div class="form-group">
	{!! Form::label('name', 'Nombre del servicio')!!}
	{!! Form::text('name',null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
	{!! Form::label('code', 'Codigo')!!}
	{!! Form::text('code',null,['class'=> 'form-control']) !!}
</div>



<div class="form-group">
	{!! Form::label('price', 'Precio del servicio')!!}
	{!! Form::number('price',null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('body','Descripcion del servicio')!!}
	{!! Form::textarea('body',null,['class'=> 'form-control','cols'=>"40" ,'rows'=>"5"]) !!}
</div>


<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>