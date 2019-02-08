<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <title>
                    Servillantas | El cerrito
                </title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                    <!-- Bootstrap 3.3.5 -->
                    <link href="{{asset('css/document.css')}}" rel="stylesheet">
                        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
                            <!-- Font Awesome -->
                            <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
                                <!-- Theme style -->
                                <link href="{{asset('css/AdminLTE.min.css')}}" rel="stylesheet">
                                    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
                                    <link href="{{asset('css/_all-skins.min.css')}}" rel="stylesheet">
                                        <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">
                                            <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon">
                                            </link>
                                        </link>
                                        <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </link>
                </meta>
            </meta>
        </meta>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a class="logo" href="#">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">
                        <b>
                            AD
                        </b>
                        V
                    </span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <b>
                            Servillantas
                        </b>
                    </span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a class="sidebar-toggle" data-toggle="offcanvas" href="#" role="button">
                        <span class="sr-only">
                            Navegación
                        </span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-circle-o text-green">
                                    </i>
                                    <strong>
                                        <span class="hidden-xs">
                                            {{ Auth::user()->name_user }}
                                        </span>
                                    </strong>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <p>
                                            www.incanatoit.com - Desarrollando Software
                                            <small>
                                                www.youtube.com/jcarlosad7
                                            </small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                <i aria-hidden="true" class="fa fa-power-off">
                                                </i>
                                                Cerrar
                                            </a>
                                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header" style="color: white">
                            <b>
                                MENÚ
                            </b>
                        </li>
                        <li class="active treeview" id="menu">
                            @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true)
                            <a href="#">
                                <i class="fa fa-dashboard">
                                </i>
                                <span>
                                    Administración
                                </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                            </a>
                            <ul class="treeview-menu" id="MainMenu" style="display: none;">
                                <li>
                                    <a href="{{route('Users.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Usuario
                                    </a>
                                </li>
                                <li class="active">
                                    <a "="" href="{{route('Roles.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Roles
                                    </a>
                                </li>
                                <li class="active">
                                    <a "="" href="{{route('Permissions.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Permisos
                                    </a>
                                </li>
                                <li class="active">
                                    <a "="" href="{{route('Role_users.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Asignación de roles
                                    </a>
                                </li>
                                <li class="active">
                                    <a "="" href="{{route('Permission_roles.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Asignación  de permisos
                                    </a>
                                </li>
                            </ul>
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-dashboard">
                                    </i>
                                    <span style="color:#fff">
                                        No estas autorizado.
                                    </span>
                                </a>
                            </li>
                            @endif
                        </li>
                        <li class="treeview">
                            <a href="{{url('Appointments')}}">
                                <i class="fa fa-calendar-o">
                                </i>
                                <span>
                                    Citas
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                @if(((Auth::user()->hasRole('ROL_CLIENTE')=== true) || (Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true)))
                                <li class="treeview">
                                    <a href="{{route('Appointments.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Lista de citas
                                    </a>
                                </li>
                                <li class="treeview">
                                    <a href="{{route('Appointments.create')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Agendar
                                    </a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{url('Calendary')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Programadas
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true)
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-money">
                                </i>
                                <span>
                                    Ventas
                                </span>
                                <i class="fa fa-angle-left pull-right">
                                </i>
                            </a>
                            <ul class="treeview-menu" id="MainMenu" style="display: none;">
                                <li>
                                    <a href="{{route('Sales.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Lista de ventas
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th">
                                </i>
                                <span style="color:#fff">
                                    No estas autorizado.
                                </span>
                            </a>
                        </li>
                        @endif
                        <li class="treeview">
                            @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true)
                            <a href="{{route('Products.index')}}">
                                <i class="fa fa-pinterest-square">
                                </i>
                                <span>
                                    Productos
                                </span>
                            </a>
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-th">
                                    </i>
                                    <span style="color:#fff">
                                        No estas autorizado.
                                    </span>
                                </a>
                            </li>
                            @endif
                        </li>
                        <li class="treeview">
                            @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true)
                            <a href="{{route('Services.index')}}">
                                <i class="fa fa-file-text-o">
                                </i>
                                <span>
                                    Servicios
                                </span>
                            </a>
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-th">
                                    </i>
                                    <span style="color:#fff">
                                        No estas autorizado.
                                    </span>
                                </a>
                            </li>
                            @endif
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-car">
                                </i>
                                <span>
                                    Vehiculos
                                </span>
                                <i class="fa fa-angle-left pull-right">
                                </i>
                            </a>
                            <ul class="treeview-menu" id="MainMenu" style="display: none;">
                                <li>
                                    <a href="{{route('Vehicles.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Lista de vehiculos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="active treeview">
                            @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true || Auth::user()->hasRole('ROL_CLIENTE')=== true)
                            <a href="#">
                                <i class="fa fa-users">
                                </i>
                                <span>
                                    Clientes
                                </span>
                                <i class="fa fa-angle-left pull-right">
                                </i>
                            </a>
                            <ul class="treeview-menu" id="MainMenu" style="display: none;">
                                <li>
                                    <a href="{{route('Clients.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Lista de clientes
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('Clients.show', Auth::id() )}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Ver mi perfil
                                    </a>
                                </li>
                            </ul>
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-th">
                                    </i>
                                    <span style="color:#fff">
                                        No estas autorizado.
                                    </span>
                                </a>
                            </li>
                            @endif
                        </li>
                        <li class="treeview">
                            @if(Auth::user()->hasRole('ROL_ADMINISTRADOR')=== true || Auth::user()->hasRole('ROL_MECANICO')=== true)
                            <a href="#">
                                <i class="fa fa-users">
                                </i>
                                <span>
                                    Mecanicos
                                </span>
                                <i class="fa fa-angle-left pull-right">
                                </i>
                            </a>
                            <ul class="treeview-menu" id="MainMenu" style="display: none;">
                                <li>
                                    <a href="{{route('Mechanics.index')}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Lista de mecanicos
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('Mechanics.show', Auth::id() )}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Ver mi perfil
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('Mechanics/assignationShow', Auth::id() )}}">
                                        <i class="fa fa-circle-o">
                                        </i>
                                        Citas asignadas.
                                    </a>
                                </li>
                            </ul>
                            @else
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-th">
                                    </i>
                                    <span style="color:#fff">
                                        No estas autorizado.
                                    </span>
                                </a>
                            </li>
                            @endif
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-plus-square">
                                </i>
                                <span>
                                    Ayuda
                                </span>
                                <small class="label pull-right bg-red">
                                    PDF
                                </small>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-info-circle">
                                </i>
                                <span>
                                    Acerca De...
                                </span>
                                <small class="label pull-right bg-yellow">
                                    IT
                                </small>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!--Contenido-->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    @include('fragment.error')    
      @include('fragment.info')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h2 class="box-title">
                                        <b>
                                            Sistema de Ventas
                                        </b>
                                    </h2>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Contenido-->
                                            @yield('content')
                                            <!--Fin Contenido-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.col -->
            <!-- /.row -->
            <footer align="bottom" class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>
                        Version
                    </b>
                    2.3.0
                </div>
                <strong>
                    Copyright © 2015-2020
                    <a href="www.incanatoit.com">
                        IncanatoIT
                    </a>
                    .
                </strong>
                All rights reserved.
            </footer>
        </div>
        <!-- /.content-wrapper -->
        <!--Fin-Contenido-->
        <!-- jQuery 2.1.4 -->
        <script src="{{asset('js/jquery-3.3.1.js')}}">
        </script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css" rel="stylesheet"/>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
        </script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js">
        </script>
        <script src="{{asset('js/app.min.js')}}">
        </script>
        <script src="{{asset('js/bootstrap.min.js')}}">
        </script>
        <!-- AdminLTE App -->
        <!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>-->
        <script src="{{asset('js/sweetalert.min.js')}}" type="text/javascript">
        </script>
        <script src="{{asset('js/document.js')}}" type="text/javascript">
        </script>
        <script src="{{asset('js/validation.js')}}" type="text/javascript">
        </script>
        {{--
        
        --}}
        <script src="{{asset('js/jquery.dataTables.min.js')}}">
        </script>
        <!-- Bootstrap 3.3.5 -->
    </body>
    {{--
    <link href="bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
        <script src="bootstrap-editable/js/bootstrap-editable.js">
        </script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
            <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js">
            </script>
        </link>
    </link>
    --}}
</html>
