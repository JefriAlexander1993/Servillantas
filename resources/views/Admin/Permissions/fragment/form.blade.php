<div class="form-group">
    {!! Form::label('name','Nombre')!!}
	{!! Form::text('name',null,['class'=> 'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('display_name', 'Nombre a mostrar')!!}
	{!! Form::text('display_name',null,['class'=> 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('description', 'Descripción del permiso')!!}
	{!! Form::textarea('description',null,['class'=> 'form-control','cols'=>"40" ,'rows'=>"5"]) !!}
</div>
<div class="form-group text-center">
    {!!Form::button('
    <i aria-hidden="true" class="fa fa-floppy-o">
    </i>
    ', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>
