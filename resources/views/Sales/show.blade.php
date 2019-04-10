@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-10">
    </div>
    <div class="col-sm-2">
        <a class="btn btn-default pull-right" href="{{ route('Sales.index')}}" title="Listado de todos los productos.">
            <i class="fa fa-list-ol">
            </i>
        </a>
    </div>
</div>
<br/>
<div class="row">
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong>
                    Productos
                </strong>
            </div>
            <div class="panel-body">
                @foreach ($detalles as $detalle1)
                <div class="col-sm-6">
                   <p>
                    <b>
                        Nombre:
                    </b>
                    {{ $detalle1->name }}
                   </p>  
                    <p>
                        <b>
                            Codigo:
                        </b>
                        {{ $detalle1->quantity}}
                    </p>
                    <p>
                        <b>
                            Precio:
                        </b>
                        {!! $detalle1->price !!}
                    </p>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                {!! $detalles->render() !!}
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong>
                    Servicios
                </strong>
            </div>
            <div class="panel-body">
                @foreach ($detallesServicios as $detalle)
                <div class="col-sm-6">
                    <p>
                        <b>
                            Nombre:
                        </b>
                        {{ $detalle->names }}
                    </p>
                    <p>
                        <b>
                            Codigo:
                        </b>
                        {{ $detalle->quantity}}
                    </p>
                    <p>
                        <b>
                            Precio:
                        </b>
                        {!! $detalle->prices !!}
                    </p>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                {!! $detallesServicios->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
