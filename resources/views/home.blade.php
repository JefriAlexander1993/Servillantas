@extends('layouts.admin')

@section('contenido')
<div class="container">
     <header></header>

     @yield('content')
    <div class="row">
          <div class="col-md-12 text-center">
              
                <h1 style="color:#367fa9">Bienvenido al panel administrativo.</h1>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5><b>Usted se ha logeado satisfatoriamente.</b><h5>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
