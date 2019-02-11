@extends('layouts.admin')
    @section('content')
<div class="row">
    <input id="token" type="hidden" value="{{ csrf_token() }}"/>
    <div class="col-sm-10">
        <div class="form-group">
            <a class="btn btn-success" href="{{route('Sales.create')}}">
                <i aria-hidden="true" class="fa fa-plus-square-o">
                </i>
            </a>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            {!!Form:: label('totalSales','Total de ventas')!!}
            <input class="form-control" disabled="" style="align:right" type="text" value="{{$totalSales}}">
            </input>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-8" style="text-align:center">
        <h2>
            <strong>
                LISTADO DE VENTAS.
            </strong>
        </h2>
    </div>
    <div class="col-sm-4">
        @include('Sales.fragment.aside')
    </div>
</div>
<div class="col-md-12 table-responsive">
    <table class="table table-hover ">
        <thead>
            <tr>
                <th class="text-center">
                    Id
                </th>
                <th class="text-center">
                    Fecha
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
            @foreach ($sales0 as $sale1)
            <tr>
                <td align="center">
                    {{$sale1->id}}
                </td>
                <td align="center">
                    {{$sale1->created_at}}
                </td>
                <td align="center">
                    {{$sale1->totalsale}}
                </td>
                <td align="center">
                    <a class="btn btn-xs btn-default" href="{{route('Sales.show', $sale1->id)}}">
                        <i aria-hcodigoden="true" class="fa fa-eye">
                        </i>
                    </a>
                </td>
                <td align="center">
                    <input id="idSale" style="width:20px" type="hidden" value="{{$sale1->id}}"/>
                    <button class="btn btn-xs btn-danger" id="btn-deleteSale">
                        <i aria-hidden="true" class="fa fa-trash-o">
                        </i>
                    </button>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
</div>
<div class="text-center">
    {!! $sales0->render() !!}
</div>
@endsection
