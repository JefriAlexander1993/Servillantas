<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!!Form::label('user_id','Usuario(*).')!!}
              {!!Form::select('user_id',$userid,null,['class'=>'form-control','id'=>'role_id1','title'=>'Elige el id de usuario.', 'required'=>'required','placeholder'=>'Seleccionar...'])!!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {!!Form::label('role_id ','Rol(*).')!!}
             {!!Form::select('role_id',$roleid,null,['class'=>'form-control','id'=>'permission_id','title'=>'Elige el id de role.', 'required'=>'required','placeholder'=>'Seleccionar...']);!!}
        </div>
    </div>
</div>
<div class="form-group text-center">
    {!!Form::button('
    <i aria-hidden="true" class="fa fa-floppy-o">
    </i>
    ', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
</div>
