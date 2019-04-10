<div class="form-group">
    {!! Form::label('codes', 'Codigo (*)')!!}
	{!! Form::text('codes',null,['class'=> 'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('names', 'Nombre del servicio (*)')!!}
	{!! Form::text('names',null,['class'=> 'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('prices', 'Precio del servicio (*)')!!}
	{!! Form::number('prices',null,['class'=> 'form-control','required'=>'required']) !!}
</div>
<div class="form-group">
    {!! Form::label('bodys','Descripcion del servicio')!!}
	{!! Form::textarea('bodys',null,['class'=> 'form-control','cols'=>"40" ,'rows'=>"5"]) !!}
</div>
<div class="form-group text-center">
    {!!Form::button('
    <i aria-hidden="true" class="fa fa-floppy-o">
    </i>
    ', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>