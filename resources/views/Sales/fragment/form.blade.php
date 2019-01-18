<div class="row">
<div class="col-sm-4" >
	<div class="form-group">
	{!!Form:: label('totalSale','Total de venta')!!}
	<input class="form-control" id="totalSale" name="totalSale" readonly="readonly" value="0" text-aling="right">
	</div>
</div>
<div class="col-sm-4" >
	<div class="form-group">
	<input class="form-control" id="totalProduct" type="hidden" name="totalProduct" readonly="readonly" value="0" >
	</div>
</div>
<div class="col-sm-4" >
	<div class="form-group">
		<input class="form-control" type="hidden" id="totalService" name="totalService" readonly="readonly" value="0" >
	</div>
</div>
</div>
<div id="col-sm-12 container-main"> 
    <div class="accordion-container">
        <a href="#" class="accordion-titulo"><i class="fa  fa-pinterest-square"> </i> Productos<span class="toggle-icon"></span></a>
        <div class="accordion-content">     
			<div class="row">
						<div class="col-sm-12">
								<input id="url_product" type="hidden" value="{{url('Product/getProduct/')}}">

						<div class="form-group">
						{!!Form::label('code','Codigo(*)')!!}
						{!!Form::number('code',null,['class'=>'form-control', 'placeholder'=>'Ej: 12' ,'id'=>'codeProduct', 'name'=>'code','min'=>'1', 'title'=>'Ingresa un codigo de un articulo existente'])!!}
						</div>

						<div class="form-group">
						{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-success', 'id'=>'btn-addProduct'))!!}
						</div>

						<div class="form-group">
						<input  value="0" type="hidden" id="sale" name="cantidadarticulos" class="form-control" >
						</div>

							
								<table class="table table-header" id="tbl-sale">
									<thead>
										<tr>
										<th class="text-center" >Codigo</th>
										<th class="text-center">Nombre</th>
										<th class="text-center" >Cantidad</th>
									    <th class="text-center">Precio unitario</th>
										<th class="text-center" >Total</th>
										<th class="text-center" colspan="3">Acción</th>	
								        </tr>
									</thead>
									<tbody>

									</tbody>
								</table>
							</div>
						
					</div>
				</div>	
			</div>
    
    
    <div class="accordion-container">
        <a href="#" class="accordion-titulo"><i class="fa  fa-file-text-o"></i> Servicios<span class="toggle-icon"></span></a>
        <div class="accordion-content">
        	<div class="row">
						<div class="form-group" >
							<input id="url_service" type="hidden" value="{{url('Service/getService/')}}">
									{!!Form::label('code','Codigo(*)')!!}
									{!!Form::number('code',null,['class'=>'form-control', 'placeholder'=>'Ej: 12' ,'id'=>'codeService', 'name'=>'code','min'=>'1', 'title'=>'Ingresa un codigo de un articulo existente'])!!}
						</div>

								<div class="form-group">
								{!!Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;', array('type' => 'button', 'class'=>'btn btn-success', 'id'=>'btn-addService'))!!}
								</div>

								<div class="form-group">
								<input  value="0" type="hidden" id="quantityService" name="quantityServices" class="form-control" >
								</div>

									<table class="table table-header" id="tbl-service">
										<thead>
											<tr>
											<th class="text-center" >Codigo</th>
											<th class="text-center">Nombre</th>
											<th class="text-center">Cantidad</th>
										    <th class="text-center">Precio unitario</th>
											<th class="text-center" >Total</th>
											<th class="text-center" colspan="3">Acción</th>	
									        </tr>
										</thead>
										<tbody>

										</tbody>
									</table>
							
					</div>
			</div>
	</div>
</div>	
 <div class="form-group text-center">
{!!Form::button('<i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;', array('type' => 'sublime', 'id'=>'enviarVenta', 'class'=>'btn btn-primary btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
</div>