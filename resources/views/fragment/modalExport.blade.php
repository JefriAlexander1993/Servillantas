
<div class="modal" id="myModal">
  <div class="modal-dialog">
    	<div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title" align="center"><b>EXPORTAR A PDF</b>
	        	  <button type="button" class="close" data-dismiss="modal" id="close">&times;</button></h4
	        	>
	      
	      </div>
	      <div class="modal-body">
	  		<div class="row">
	        <!--Formulario para generar pdf de ventas de solo  Ventas-->
	        {{Form::open(['url'=>'/salesServicePdf', 'method'=>'GET'])}}
	        	<h5 align="center"><b><u>SERVICIOS.</u></b></h5>
			       	<div class="col-xs-3">
		      		<div class="form-group">
		      			<label>Año</label>
		      		  	<input type="number" name="añoService" id="añoService"placeholder="2019" class="form-control" min="2019" >
				    </div>
			    	</div>
			       	<div class="col-xs-3">
				        <div class="form-group">
				        <label>Mes</label>	
				        <input type="number" class="form-control" name="mesService" id="mesService" placeholder="01" min="1" max="12" >	
				        </div>
				    </div>
		    	  	<div class="col-xs-3">
			        <div class="form-group">
			        <label>Dia</label>	
			        <input type="number" class="form-control" name="diaService" id="diaService" placeholder="01" min="1" max="31" >	
			        </div>
			    </div>
	    		<div class="col-xs-3">
		        <div class="form-group">
		        	<label>Generar</label>
		        	<br/>
		             <button class="btn btn-danger pull-center btn-block" href="{{url('/salesPdf')}}" type="submit" title="Generar pdf" id="btn-exportService" >
		                        <i aria-hidden="true" class="fa fa-file-pdf-o">
		                        </i>
		             </button>
		        </div>
	   		 	</div>
	        {{Form::close()}}
	        </div>
	        <!--Formulario para generar pdf de ventas de solo  Productos-->
	        <div class="row">
	        {{Form::open(['url'=>'/salesProductPdf', 'method'=>'GET'])}}
	        	  	 <h5 align="center"><b><u>PRODUCTOS.</u></b></h5>
		       	
		       	<div class="col-xs-3">
	      		<div class="form-group">
	      			<label>Año</label>
	      		  	<input type="number" name="añoProduct" id="añoProduct" placeholder="2019" min="2019" class="form-control" >
			    </div>
		    	</div>
		       	<div class="col-xs-3">
			        <div class="form-group">
			        <label>Mes</label>	
			        <input type="number" class="form-control" name="mesProduct" id ="mesProduct" placeholder="01" min="1" max="12">	
			        </div>
			    </div>
		    	<div class="col-xs-3">
	      		<div class="form-group">
	      			<label>Dia</label>
	      		  	<input type="number" name="diaProduct" id="diaProduct" placeholder="01" class="form-control" min="1" max="31">
			    </div>
		    	</div>
	    		<div class="col-xs-3">
		        <div class="form-group">
		        	<label>Generar</label>
		        	<br/>
		             <button class="btn btn-danger pull-center btn-block" href="{{url('/salesPdf')}}" type="submit" title="Generar pdf" id="btn-exportProduct">
		                        <i aria-hidden="true" class="fa fa-file-pdf-o">
		                        </i>
		             </button>
		        </div>
	   		 	</div>
	        {{Form::close()}}
	        </div>

	         <!--Formulario para generar pdf de ventas de solo  Productos-->
	        <div class="row">
	        {{Form::open(['url'=>'/salesProductServicePdf', 'method'=>'GET'])}}
	        	  	 <h5 align="center"><b><u>PRODUCTOS & SERVICIOS.</u></b></h5>
		       	<div class="col-xs-3">
	      		<div class="form-group">
	      			<label>Año</label>
	      		  	<input type="number" name="añoPS" id="añoPS" placeholder="2019" class="form-control"  min="2019">
			    </div>
		    	</div>
		    	<div class="col-xs-3">
	      		<div class="form-group">
	      			<label>Mes</label>
	      		  	<input type="number" name="mesPS" id="mesPS" placeholder="02" class="form-control" min="1" max="12">
			    </div>
		    	</div>
		    	  	<div class="col-xs-3">
	      		<div class="form-group">
	      			<label>Dia</label>
	      		  	<input type="number" name="diaPS" id="diaPS" placeholder="02" class="form-control" min="1" max="31">
			    </div>
		    	</div>
		     
	    		<div class="col-xs-3">
		        <div class="form-group">
		        	<label>Generar</label>
		        	<br/>
		             <button class="btn  btn-danger pull-center btn-block" href="{{url('/salesPdf')}}" type="submit" title="Generar pdf" id="btn-exportProductService">
		                        <i aria-hidden="true" class="fa fa-file-pdf-o">
		                        </i>
		             </button>
		        </div>
	   		 	</div>
	        {{Form::close()}}
	        </div>
	      </div>
   
  		</div>
	</div>
</div>