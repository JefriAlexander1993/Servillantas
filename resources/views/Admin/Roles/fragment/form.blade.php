<div class="form-group">
	{!! Form::label('name','Nombre')!!}
	{!! Form::text('name',null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('display_name', 'Nombre a mostrar')!!}
	{!! Form::text('display_name',null,['class'=> 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('description', 'Descripción del rol')!!}
	{!! Form::textarea('description',null,['class'=> 'form-control','cols'=>"40" ,'rows'=>"5"]) !!}
</div>


<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>


