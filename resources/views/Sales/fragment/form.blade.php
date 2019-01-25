<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            {!!Form:: label('totalSale','Total de venta')!!}
            <input class="form-control" id="totalSale" name="totalSale" readonly="readonly" text-aling="right" value="0">
            </input>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <input class="form-control" id="totalProduct" name="totalProduct" readonly="readonly" type="hidden" value="0">
            </input>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <input class="form-control" id="totalS" name="totalService" readonly="readonly" type="hidden" value="0">
            </input>
        </div>
    </div>
</div>
<div id="col-sm-12 container-main">
    <div class="accordion-container">
        <a class="accordion-titulo" href="#">
            <i class="fa fa-pinterest-square">
            </i>
            Productos
            <span class="toggle-icon">
            </span>
        </a>
        <div class="accordion-content">
            <div class="row">
                <div class="col-sm-12">
                    <input id="url_product" type="hidden" value="{{url('Product/getProduct/')}}">
                        <div class="form-group">
                            {!!Form::label('code','Codigo(*)')!!}
						{!!Form::number('code',null,['class'=>'form-control', 'placeholder'=>'Ej: 12' ,'id'=>'codeProduct', 'name'=>'codeProduct','min'=>'1', 'title'=>'Ingresa un codigo de un articulo existente'])!!}
                        </div>
                        <div class="form-group">
                            {!!Form::button('
                            <i aria-hidden="true" class="fa fa-plus">
                            </i>
                            ', array('type' => 'button', 'class'=>'btn btn-success', 'id'=>'btn-addProduct'))!!}
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="sale" name="cantidadarticulos" type="hidden" value="0">
                            </input>
                        </div>
                        <table class="table table-header" id="tbl-sale">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        Codigo
                                    </th>
                                    <th class="text-center">
                                        Nombre
                                    </th>
                                    <th class="text-center">
                                        Cantidad
                                    </th>
                                    <th class="text-center">
                                        Precio unitario
                                    </th>
                                    <th class="text-center">
                                        Total
                                    </th>
                                    <th class="text-center" colspan="3">
                                        Acción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </input>
                </div>
            </div>
        </div>
    </div>
    <div class="accordion-container">
        <a class="accordion-titulo" href="#">
            <i class="fa fa-file-text-o">
            </i>
            Servicios
            <span class="toggle-icon">
            </span>
        </a>
        <div class="accordion-content">
            <div class="row">
                <div class="form-group">
                    <input id="url_service" type="hidden" value="{{url('Service/getService/')}}">
                        {!!Form::label('code','Codigo(*)')!!}
									{!!Form::number('code',null,['class'=>'form-control', 'placeholder'=>'Ej: 12' ,'id'=>'codeService', 'name'=>'codeService','min'=>'1', 'title'=>'Ingresa un codigo de un articulo existente'])!!}
                    </input>
                </div>
                <div class="form-group">
                    {!!Form::button('
                    <i aria-hidden="true" class="fa fa-plus">
                    </i>
                    ', array('type' => 'button', 'class'=>'btn btn-success', 'id'=>'btn-addService'))!!}
                </div>
                <div class="form-group">
                    <input class="form-control" id="quantityService" name="quantityServices" type="hidden" value="0">
                    </input>
                </div>
                <table class="table table-header" id="tbl-service">
                    <thead>
                        <tr>
                            <th class="text-center">
                                Codigo
                            </th>
                            <th class="text-center">
                                Nombre
                            </th>
                            <th class="text-center">
                                Cantidad
                            </th>
                            <th class="text-center">
                                Precio unitario
                            </th>
                            <th class="text-center">
                                Total
                            </th>
                            <th class="text-center" colspan="3">
                                Acción
                            </th>
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
    {!!Form::button('
    <i aria-hidden="true" class="fa fa-floppy-o">
    </i>
    ', array('type' => 'sublime', 'id'=>'submitSale', 'class'=>'btn btn-primary btn-lg btn-block', 'onclick'=>'confirmacion()' ))!!}
</div>