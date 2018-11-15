<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">         
    <title>EDUSYSTEM </title>
    
    <link rel="icon" type="image/png" href="<?php echo e(asset('img/icon.png')); ?>" />
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>"> 
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/vendors/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- NProgress -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/vendors/nprogress/nprogress.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/vendors/iCheck/skins/flat/green.css')); ?>">    
    <!-- bootstrap-progressbar -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')); ?>"> 
    <!-- JQVMap -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/vendors/jqvmap/dist/jqvmap.min.css')); ?>">
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/vendors/bootstrap-daterangepicker/daterangepicker.css')); ?>">
    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template/build/css/custom.css')); ?>">
    <!--Estilo propio mio -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">


    <?php echo $__env->yieldContent('link'); ?>

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title">
                <img src="<?php echo e(asset('img/img-01.png')); ?>" style="border-radius: 50%; height: 45px; "> 
                Edusystem
              </a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
               
              <?php if(Auth::user()->img_url==null ): ?>               
                    <img id="imagen-perfil" src="<?php echo e(asset('images/user.png')); ?>" width="60" height="60" alt="Taller" class="img-circle profile_img" style="width:50px; height: 50px" />                
                <?php else: ?>               
                    <img width="60" height="60"  src="/images/perfiles/<?php echo e(Auth::user()->img_url); ?>" class="img-circle profile_img"  width="60" height="60" alt="Taller" />                 
              <?php endif; ?> 
              </div>
              <div class="profile_info">
                <span><?php echo e(Auth::user()->type); ?></span>
                <h2 class="text-capitalize"><?php echo e(Auth::user()->name); ?></h2>
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
                          <li><a href="<?php echo e(route('calendario.index')); ?>"><i class="fa fa-plus"></i> Agregar periodos </a></li>
                          <li><a href="<?php echo e(route('calendario.academico')); ?>"><i class="fa fa-university"></i> Universidades</a></li>                           
                        </ul>
                    </li>
                    <li><a><i class="fa fa-money"></i> Pago meses convenios<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('meses.index')); ?>"><i class="fa fa-search"></i> Buscar universidad</a></li>
                          <li><a href="<?php echo e(route('meses.create')); ?>"><i class="fa fa-circle-o-notch"></i>Busqueda General</a></li>
                        </ul>
                    </li> 
                    <ul class="nav side-menu">
                    <li><a><i class="fa fa-graduation-cap"></i> Becas <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('becas.create')); ?>"><i class="fa fa-plus"></i> Crear Beca </a></li>
                          <li><a href="<?php echo e(route('becas.index')); ?>"><i class="fa fa-search"></i> Becas disponibles</a></li>                           
                        </ul>
                    </li>
                    <li><a><i class="fa fa-font"></i>Nombre complementaria<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('Cnombre.create')); ?>"><i class="fa fa-plus"></i>Añadir </a></li>
                          <li><a href="<?php echo e(route('complementaria.mostrar')); ?>"><i class="fa fa-search"></i>Buscar </a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-refresh"></i> Actualizacion <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('actualizacion.index')); ?>"><i class="fa fa-search"></i>Buscar becarios</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-check-square"></i> Estatus Becarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('estatus.index')); ?>"><i class="fa fa-search"></i>Buscar becarios</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-ban"></i>Retencion de pagos<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('retencion.index')); ?>"><i class="fa fa-search"></i> Buscar becarios</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-list-alt"></i>Planilas Generales<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('pre_planilla.index')); ?>"><i class="fa fa-search"></i> Buscar becarios</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-list-alt"></i>Plan. Complementarias<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('complementaria.index')); ?>"><i class="fa fa-search"></i> Buscar becarios</a></li>
                          <li><a href="<?php echo e(route('complementaria.create')); ?>"><i class="fa fa-search"></i> Complementarias</a></li>
                        </ul>
                    </li>  

                <?php if(Auth::user()->Administrador()): ?> 
                       <li><a><i class="fa fa-user"></i> Usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('admin.index')); ?>">Buscar Usuarios</a></li>                         
                        </ul>
                      </li>
                      <li><a><i class="fa fa-spinner"></i> Bitacora de usuarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('admin.create')); ?>">Historial de sesiones</a></li>
                          <li><a href="<?php echo e(route('admin.bitacora')); ?>">Historial de acciones en el sistema</a></li>                  
                        </ul>
                      </li>                              
                    </ul>
                <?php endif; ?>
                <?php if(Auth::user()->Operaciones()): ?>  
                       <li><a><i class="fa fa-slideshare"></i> Becarios <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="<?php echo e(route('aspirantes.create')); ?>"><i class="fa fa-plus"></i>Agregar</a></li>
                          <li><a href="<?php echo e(route('aspirantes.index')); ?>"><i class="fa fa-search"></i>Buscar</a></li>                         
                        </ul>
                      </li>                      
                    </ul>
                 <?php endif; ?>


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
              <a data-toggle="tooltip" data-placement="top" title="Logout"  href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();                                                
                                                     document.getElementById('logout-form').submit();">
                   <span class="glyphicon glyphicon-off" aria-hidden="true">                           
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo csrf_field(); ?>
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
                
                     <?php if(Auth::user()->img_url==null ): ?>
                       <img src="<?php echo e(asset('images/user.png')); ?>" alt=""><?php echo e(Auth::user()->name); ?>                              
                   <?php else: ?>
                    <img  style="width: 50px; height: 50px;"  src="/images/perfiles/<?php echo e(Auth::user()->img_url); ?>"/><?php echo e(Auth::user()->name); ?>   
                 
                 <?php endif; ?> 
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?php echo e(route('usuario.index')); ?>"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Opciones</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li>
                          <a data-toggle="tooltip" data-placement="top" title="Logout"  href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();                                                
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i> Cerrar Sesión                   
                      <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo csrf_field(); ?>
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
     
          <?php echo $__env->yieldContent('content'); ?>
     
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
    <script src="<?php echo e(asset('template/vendors/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo e(asset('template/vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('template/vendors/fastclick/lib/fastclick.js')); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo e(asset('template/vendors/nprogress/nprogress.js')); ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo e(asset('template/vendors/Chart.js/dist/Chart.min.js')); ?>"></script>  
    <!-- gauge.js -->
    <script src="<?php echo e(asset('template/vendors/gauge.js/dist/gauge.min.js')); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo e(asset('template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script> 
    <!-- iCheck -->
    <script src="<?php echo e(asset('template/vendors/iCheck/icheck.min.js')); ?>"></script>
    <!-- Skycons -->
    <script src="<?php echo e(asset('template/vendors/skycons/skycons.js')); ?>"></script>
    <!-- Flot -->
    <script src="<?php echo e(asset('template/vendors/Flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('template/vendors/Flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('template/vendors/Flot/jquery.flot.time.js')); ?>"></script>
    <script src="<?php echo e(asset('template/vendors/Flot/jquery.flot.stack.js')); ?>"></script> 
    <script src="<?php echo e(asset('template/vendors/Flot/jquery.flot.resize.js')); ?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo e(asset('template/vendors/flot.orderbars/js/jquery.flot.orderBars.js')); ?>"></script>
    <script src="<?php echo e(asset('template/vendors/flot-spline/js/jquery.flot.spline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('template/vendors/flot.curvedlines/curvedLines.js')); ?>"></script>
    <!-- DateJS -->
    <script src="<?php echo e(asset('template/vendors/DateJS/build/date.js')); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo e(asset('template/vendors/jqvmap/dist/jquery.vmap.js')); ?>"></script>
    <script src="<?php echo e(asset('template/vendors/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
    <script src="<?php echo e(asset('template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')); ?>"></script>  
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('template/vendors/moment/min/moment.min.js')); ?>"></script>    
    <script src="<?php echo e(asset('template/vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(asset('template/build/js/custom.js')); ?>"></script>

    <script type="text/javascript">
        <?php echo $__env->yieldContent('script-content'); ?>
    </script>
    
    <?php echo $__env->yieldContent('script'); ?>
  </body>
</html>
