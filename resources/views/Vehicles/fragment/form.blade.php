<div class="row">
    <div class="col-sm-3">
        <div class="form-group ">
        {!! Form::label('user_id','Propietario.')!!}<br/>
        {!!Form::select('user_id',$clients, null,['class'=>'form-control','title'=>'Ingresa un codigo de un articulo existente', 'required'=>'required','name'=>'user_id',  'placeholder'=>'Elige un producto','style'=>'width:200px'])!!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group ">
        {!! Form::label('nuip','Numero de cédula.')!!}<br/>
        {!!Form::text('nuip',null,['class'=>'form-control','required'=>'required','name'=>'nuip']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('license_plate', 'Placa (*)')!!}
			{!! Form::text('license_plate',null,['class'=> 'form-control','required'=>'required','name'=>'license_plate']) !!}
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            {!! Form::label('line', 'Linea (*)')!!}
			{!! Form::text('line',null,['class'=> 'form-control','required'=>'required','name'=>'line']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('model','Modelo (*)')!!}
			{!! Form::text('model',null,['class'=> 'form-control','required'=>'required','name'=>'model']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('brand','Marca (*)')!!}
			{!! Form::text('brand',null,['class'=> 'form-control','required'=>'required','name'=>'brand']) !!}
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            {!! Form::label('mileage','Kilometraje (*)')!!}
			{!! Form::text('mileage',null,['class'=> 'form-control','required'=>'required','name'=>'mileage']) !!}
        </div>
    </div>
</div>
<div class="form-group text-center">
    {!!Form::button('
    <i aria-hidden="true" class="fa fa-floppy-o">
    </i>
    ', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>
