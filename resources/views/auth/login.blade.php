@extends('layouts.layouta') <!--Aqui llamo al layout --> 

@section('content')  <!-- Le ingreso contenido al espacio que asigne desde el layout -->
    <div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Servillantas El Cerrito</b></a>
      </div><!-- /.login-logo -->
                <div class="login-box-body">
        <p class="login-box-msg">Ingrese al sistema</p>
        <form action="{{ route('login') }}" method="post">
            
          <div class="form-group has-feedback">
                        {{ csrf_field() }}
            <input id="email" type="email" class="form-control" placeholder="Email" name="email" e="{{ old('email') }}" required autofocus>
            @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            
         
          <div class="form-group has-feedback">
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

            <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
              
                            <div class="col-lg-8">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="col-lg-4">

                              <button type="submit" class="btn btn-primary btn-block btn-flat">ingrese</button>
                            </div>
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                            </a>
                       
          </div>

        </form>
      </div><!-- /.login-box-body -->

    </div><!-- /.login-box -->
    
@endsection