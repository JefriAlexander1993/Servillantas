<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('license_plate', 'Placa (*)')!!}
			{!! Form::text('license_plate',null,['class'=> 'form-control','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {!! Form::label('line', 'Linea (*)')!!}
			{!! Form::text('line',null,['class'=> 'form-control','required'=>'required']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('model','Modelo (*)')!!}
			{!! Form::text('model',null,['class'=> 'form-control','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('brand','Marca (*)')!!}
			{!! Form::text('brand',null,['class'=> 'form-control','required'=>'required']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('mileage','Kilometraje (*)')!!}
			{!! Form::text('mileage',null,['class'=> 'form-control','required'=>'required']) !!}
        </div>
    </div>
</div>
<div class="form-group text-center">
    {!!Form::button('
    <i aria-hidden="true" class="fa fa-floppy-o">
    </i>
    ', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>
