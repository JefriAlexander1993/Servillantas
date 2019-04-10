@extends('layouts.layouta')

@section('content')
<div class="login-box">
      <div class="login-logo">
        <a href="{{ url('/') }}"><b>Servillantas</b>El Cerrito</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">registrese</p>
        <form action="{{ route('register') }}" class="form-horizontal" method="POST">
          {{ csrf_field() }}
        <div class="form-group{{ $errors->has('name_user') ? ' has-error' : '' }}">
          
          <div class="form-group has-feedback col-md-12" style="margin-left:3px"  >
             
            <label class="control-label" for="name_user">Nombres</label>
            <input  autofocus="" class="form-control" id="name" name="name_user" required="" type="text" value="{{ old('name_user') }}" placeholder="Nombres" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
          <div class="col-md-6" >
                                    @if ($errors->has('name_user'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('name_user') }}
                                        </strong>
                                    </span>
                                    @endif
                                
                            </div>
                            </input>
        </div>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            
          
          <div class="form-group has-feedback col-md-12" style="margin-left:3px">
            <label class="control-label" for="email">Correo  electronico:</label>
            <input class="form-control" id="email" name="email" required="" type="email" value="{{ old('email') }}" placeholder="correo electronico">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          
                            <div class="col-md-6">
                                
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('email') }}
                                        </strong>
                                    </span>
                                    @endif
                                
                            </div>
                            </input>
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            
          
          <div class="form-group has-feedback col-md-12" style="margin-left:3px">
            <label class="control-label" for="password">constraseña:</label>
            <input class="form-control" id="password" name="password" required="" type="password" placeholder="contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
                            <div class="col-md-6">
                                
                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>
                                            {{ $errors->first('password') }}
                                        </strong>
                                    </span>
                                    @endif
                                
                            </div>
                            </input>
        </div>
        <div class="form-group">
                            
            
          <div class="form-group has-feedback col-md-12" style="margin-left:3px">
            <label class="control-label" for="password-confirm">confirmar:</label>
            <input class="form-control" id="password-confirm" name="password_confirmation" required="" type="password" placeholder="confirmar contraseña">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          
                            <div class="col-md-6">
                                
                                
                            </div>
                            </input>
                        </div>
         
          <div class="row">
            

            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
            </div><!-- /.col -->
          </div>
        </form>

     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    
@endsection
