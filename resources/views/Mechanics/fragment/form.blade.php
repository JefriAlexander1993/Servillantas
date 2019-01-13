<div class="row">
	<div class="col-sm-6">
		<div class="form-group ">
		{!! Form::label('name','Nombre(*).')!!}
		{!!Form::text('name',null,['class'=>'form-control','Nombre del usuario','title'=>'Nombre.','id'=>'name','required'=>'required'])!!}
		</div>
	</div>

<div class="col-sm-6">
	<div class="form-group">
		{!!Form::label('lastname','Apellidos(*).')!!}
		{!!Form::text('lastname',null,['class'=>'form-control','title'=>'Apellidos.','id'=>'lastname'])!!}
	</div>
</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group ">
		{!! Form::label('email','Email(*).')!!}
		{!!Form::email('email',null,['class'=>'form-control','Nombre del usuario','title'=>'Correo electronico.','id'=>'name','required'=>'required'])!!}
		</div>
	</div>

<div class="col-sm-6">
	<div class="form-group ">
		{!!Form::label('phone','Teléfono(*).')!!}
		{!!Form::text('phone',null,['class'=>'form-control','title'=>'Teléfono.','id'=>'phone'])!!}
	</div>
</div>
</div>
<div class="row">
	<div class="col-sm-6">
		<div class="form-group ">
		{!! Form::label('address','Dirección.')!!}
		{!!Form::text('address',null,['class'=>'form-control','title'=>'Dirección.','id'=>'address','required'=>'required'])!!}
		</div>
	</div>

<div class="col-sm-6">
	<div class="form-group ">
		{!!Form::label('date_birth','Fecha de cumpleaños(*).')!!}
		{!!Form::date('date_birth',null,['class'=>'form-control','title'=>'Fecha de cumpleaños.','id'=>'date_birth'])!!}
	</div>
</div>
</div>
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>
 
 