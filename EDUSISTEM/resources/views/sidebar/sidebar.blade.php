<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">         
    <title>EDUSYSTEM </title>
    
    <link rel="icon" type="image/png" href="{{asset('img/icon.png')}}" />
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/bootstrap/dist/css/bootstrap.min.css')}}"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- NProgress -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/nprogress/nprogress.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/iCheck/skins/flat/green.css')}}">    
    <!-- bootstrap-progressbar -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}"> 
    <!-- JQVMap -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/jqvmap/dist/jqvmap.min.css')}}">
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/bootstrap-daterangepicker/daterangepicker.css')}}">
    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/build/css/custom.css')}}">
    <!--Estilo propio mio -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">


    @yield('link')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img src="{{asset('img/img-01.png')}}" style="border-radius: 50%; height: 45px; "> Edusystem</a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('template/production/images/img.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>{{ Auth::user()->type }}</span>
                <h2 class="text-capitalize">{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-calendar"></i> Periodos Academicos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('calendario.index')}}"><i class="fa fa-plus"></i> Agregar periodos </a></li>
                          <li><a href="{{route('calendario.academico')}}"><i class="fa fa-university"></i> Universidades</a></li>                           
                        </ul>
                    </li>
                    <li><a><i class="fa fa-money"></i> Pago meses convenios<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('meses.index')}}"><i class="fa fa-search"></i> Buscar universidad</a></li>
                          <li><a href="{{route('meses.create')}}"><i class="fa fa-circle-o-notch"></i>Busqueda General</a></li>
                        </ul>
                    </li> 
                    <ul class="nav side-menu">
                    <li><a><i class="fa fa-graduation-cap"></i> Becas <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('becas.create')}}"><i class="fa fa-plus"></i> Crear Beca </a></li>
                          <li><a href="{{route('becas.index')}}"><i class="fa fa-search"></i> Becas disponibles</a></li>                           
                        </ul>
                    </li>
                    <li><a><i class="fa fa-refresh"></i> Actualizacion <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('actualizacion.index')}}"><i class="fa fa-search"></i>Buscar becarios</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-ban"></i>Retencion de pagos<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('retencion.index')}}"><i class="fa fa-search"></i> Buscar becarios</a></li>
                        </ul>
                    </li>

                @if(Auth::user()->Administrador()) 
                       <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('admin.index')}}">Buscar Usuarios</a></li>                         
                        </ul>
                      </li>
                      <li><a><i class="fa fa-spinner"></i> Bitacora de usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('admin.create')}}">Historial de sesiones</a></li>
                          <li><a href="{{route('admin.bitacora')}}">Historial de acciones en el sistema</a></li>                  
                        </ul>
                      </li>                              
                    </ul>
                @endif
                @if(Auth::user()->Operaciones())  
                       <li><a><i class="fa fa-slideshare"></i> Becarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="{{route('aspirantes.create')}}"><i class="fa fa-plus"></i>Agregar</a></li>
                          <li><a href="{{route('aspirantes.index')}}"><i class="fa fa-search"></i>Buscar</a></li>                         
                        </ul>
                      </li>                      
                    </ul>
                 @endif


              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>           
              <a data-toggle="tooltip" data-placement="top" title="Logout"  href="{{ route('logout') }}" onclick="event.preventDefault();                                                
                                                     document.getElementById('logout-form').submit();">
                   <span class="glyphicon glyphicon-off" aria-hidden="true">                           
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                      </form>                           
                    </span>
             </a>
              
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('template/production/images/img.jpg')}}" alt="">{{ Auth::user()->name }}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{route('usuario.index')}}"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Opciones</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li>
                          <a data-toggle="tooltip" data-placement="top" title="Logout"  href="{{ route('logout') }}" onclick="event.preventDefault();                                                
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i> Cerrar Sesión                   
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                      </form>                           
                  
                    </a>
                    </li>
                  
                  </ul>
                </li>

              
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
     
          @yield('content')
     
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('template/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('template/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ asset('template/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ asset('template/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('template/vendors/Chart.js/dist/Chart.min.js')}}"></script>  
    <!-- gauge.js -->
    <script src="{{ asset('template/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script> 
    <!-- iCheck -->
    <script src="{{ asset('template/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{ asset('template/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{ asset('template/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('template/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('template/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ asset('template/vendors/Flot/jquery.flot.stack.js')}}"></script> 
    <script src="{{ asset('template/vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('template/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{ asset('template/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{ asset('template/vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{ asset('template/vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('template/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{ asset('template/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{ asset('template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>  
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('template/vendors/moment/min/moment.min.js')}}"></script>    
    <script src="{{ asset('template/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('template/build/js/custom.js')}}"></script>

    <script type="text/javascript">
        @yield('script-content')
    </script>
    
    @yield('script')
  </body>
</html>
