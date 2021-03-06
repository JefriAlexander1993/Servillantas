@extends('layouts.admin')

@section('content')
<div class="col-sm-10">
    <h2>
        Actualizar Mecanico.
        <a class="btn btn-default pull-right" href="{{ route('Mechanics.show',Auth::id())}}" title="Listado de todos los productos.">
            <i class="fa fa-eye">
            </i>
        </a>
         @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true)
        <a class="btn btn-default pull-right" href="{{ route('Mechanics.index')}}" title="Listado de todos los productos.">
            <i class="fa fa-list-ol">
            </i>
        </a>
        @endif
        <a class="btn btn-secundary btn-sm " href="{{ route('Mechanics.show', auth::id())}}" title="Ver mechanic">
                    <i class="fa fa-eye">
                    </i>
            </a>
    </h2>
    {!! Form::model($mechanic, ['route' => ['Mechanics.update', $mechanic->id], 'method' => 'PUT']) !!}

           @include('Mechanics.fragment.form')

           {!! Form::close() !!}
</div>
<div class="col-sm-2">
    @include('Mechanics.fragment.aside')
</div>
@endsection
