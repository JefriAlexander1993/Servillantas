<nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo right">Logo</a>
      <a href="#" data-activates="slide-out" class="btn_menu brand-logo left" style="padding-left: 10px;"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <ul id="slide-out" class="side-nav">
    <li><div class="user-view">
      <div class="background">
        <img src="http://materializecss.com/images/office.jpg">
      </div>
      <a href="#!user"><img class="circle" src="http://materializecss.com/images/yuna.jpg"></a>
      @if (Auth::user()->perfil_id===1)
        <a href="#!name"><span class="white-text name">{{Auth::user()->name}} (Secretaria)</span></a>
      @else
        <a href="#!name"><span class="white-text name">{{Auth::user()->name}} (Paciente)</span></a>
      @endif
      
      <a href="#!email"><span class="white-text email">{{Auth::user()->email}}</span></a>
      <a class="white-text" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
          Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </div></li>
    @if (Auth::user()->perfil_id===1)
      <li><a class="subheader">Mantenedores</a></li>
      <li><a class="waves-effect" href="usuario"><i class="material-icons">account_circle</i>Usuario</a></li>
      <li><a class="waves-effect" href="perfil"><i class="material-icons">assignment_ind</i>Perfil</a></li>
      <li><a class="waves-effect" href="producto"><i class="material-icons">archive</i>Producto</a></li>
      <li><a class="waves-effect" href="variedad"><i class="material-icons">archive</i>Variedad</a></li>
    @else
      <li><a class="subheader">Cliente</a></li>
      <li><a href="uno"><i class="material-icons">cloud</i>Uno</a></li>
    @endif
    
  </ul>
  <script>
  $(document).ready(function(){
    $(".btn_menu").sideNav();
    });
  </script>
  @yield('contenido')