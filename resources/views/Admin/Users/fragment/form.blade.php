<div class="row">
	<div class="col-sm-6">
		<div class="form-group ">
		{!! Form::label('name','Nombre(*).')!!}
		{!!Form::text('name',null,['class'=>'form-control','Nombre del usuario','title'=>'Nombre.','id'=>'name','required'=>'required'])!!}
		</div>
	</div>
	<div class="col-sm-6">
		<div class="form-group ">
		{!! Form::label('email','Email(*).')!!}
		{!!Form::email('email',null,['class'=>'form-control','Nombre del usuario','title'=>'Correo electronico.','id'=>'name','required'=>'required'])!!}
		</div>
	</div>
</div>
 <div class="row">
	<div class="col-sm-6">
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    		{!! Form::label('password','Contraseña(*).')!!}

                  
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                         
        </div>
    </div>    
    <div class="col-sm-6">
                        <div class="form-group">
                        	{!! Form::label('password-confirm','Confirmar contraseña(*).')!!}
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                       
                        </div>
    </div> 
</div>                      
<div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>
 
 