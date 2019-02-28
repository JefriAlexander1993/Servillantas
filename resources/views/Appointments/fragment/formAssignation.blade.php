     <div class="col-sm-10">
    	<h2>
           <b> Placa: {{ $appointment->license_plate}}</b>     
        </h2>
     
        <p><b>Asunto:</b>
            {{ $appointment->title}}
        </p><b>Fecha de cita:</b>

            {!!  date('d M Y', strtotime($appointment->date)) !!}
         </p>
         <p><b>Hora de cita:</b>
         	  {!!  date('H:i', strtotime($appointment->hour_end)) !!}
   		  </p>
   		   <div class="form-group">
             {!!Form::label('user_id ','Mecanico(*).')!!}
             {!!Form::select('user_id',$users,null,['class'=>'form-control','id'=>'permission_id','title'=>'Elige el id de role.', 'required'=>'required','placeholder'=>'Seleccionar...']);!!}
         </div>
          
    </div>
	<div class="form-group text-center">
	{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>', array('type' => 'submit', 'class'=>'btn btn-success btn-lg btn-block'))!!}
	</div>



