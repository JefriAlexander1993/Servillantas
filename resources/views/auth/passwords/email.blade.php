@extends('layouts.layouta') <!--Aqui llamo al layout --> 

@section('content')  <!-- Le ingreso contenido al espacio que asigne desde el layout -->

<div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Servillantas</b>El Cerrito</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Recuperacion de contraseña</p>
        <form action="{{ route('password.email') }}" class="form-horizontal" method="POST" >
                        {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

        <div class="form-group has-feedback col-md-12" style="margin-left:3px"  >

            <label for="email" class="col-md-4 control-label">correo electronico:</label>
            <input autofocus="" class="form-control" id="email" type="email"  name="email" required="" type="text" value="{{ old('email') }}"  placeholder="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            
        </div>
          
            <div class="col-md-6" >
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                    </input>
          

            
          </div>
         
          <div class="row">
            

            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">enviar</button>
            </div><!-- /.col -->
          </div>
        </form>
     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    @endsection