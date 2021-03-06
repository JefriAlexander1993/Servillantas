@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h2>
        Editar producto
        <a class="btn btn-default pull-right" href="{{ route('Products.index')}}" title="Listado de todos los productos.">
            <i class="fa fa-list-ol">
            </i>
        </a>
    </h2>
    {!! Form::model($product1, ['route' => ['Products.update', $product1->id], 'method' => 'PUT']) !!}

           @include('Products.fragment.form')

           {!! Form::close() !!}
</div>
<div class="col-sm-2">
    @include('Products.fragment.aside')
</div>
@endsection
