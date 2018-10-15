<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Edusystem</title>
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
          
   <!--Estilos de sidebar -->        
  <link rel="stylesheet" type="text/css" href="{{asset('css/style-sidebar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('Semantic/semantic.css')}}">
    
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>


</head>

<body>

 
   <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">Edusystem</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/bootstrap4/assets/img/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong class="text-capitalize">{{ Auth::user()->name }}</strong>
                        </span>
                        <span class="user-role">{{ Auth::user()->type }}</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        @if(Auth::user()->Administrador())
                             <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-users"></i>
                                    <span>Usuarios</span>
                                    
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>                                    
                                        <li>
                                             <a href="{{route('admin.index')}}">Buscar usuario<i class="fas fa-search"></i></a>
                                        </li>
                                        <li>
                                             <a href="#">Usuarios sin permisos</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-tachometer-alt"></i>
                                    <span>Bitácora de usuarios</span>
                                   
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{route('admin.create')}}">Sesiones<i class="fas fa-hourglass-start"></i>                                            
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Acciones<i class="fas fa-laptop"></i></a>
                                        </li>
                                       
                                        
                                    </ul>
                                </div>
                            </li>
                        @endif
                        @if(Auth::user()->Operaciones())
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    
                                    <i class="fas fa-user-graduate"></i>
                                    <span>Aspirantes</span>
                                   
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li>
                                            <a href="{{route('aspirantes.create')}}">Agregar<i class="fas fa-plus"></i></a>
                                        </li>
                                         <li>
                                            <a href="{{route('aspirantes.index')}}">Buscar<i class="fas fa-search"></i>                                           
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">Acciones<i class="fas fa-laptop"></i></a>
                                        </li>
                                        <li>
                                            <a href="{{route('aspirantes.index')}}">Sesiones<i class="fas fa-hourglass-start"></i>                                            
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                       @endif
                      
                       
                      
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Calendario</span>
                            </a>
                        </li>               
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                  
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                   
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();                                                
                                                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off">                            
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                      </form>                           
                    </i>
                </a>
            </div>

        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
               

              @yield("content")


            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>

 <!--main js -->
  <script src="{{ asset('js/jquery-3.3.1.min.js')}}"></script>   
  <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
  <script src="{{ asset('js/dataTables.semanticui.min.js')}}"></script>   

  <script src="{{ asset('semantic/semantic.min.js') }}" ></script>
  
  <script src="{{ asset('js/main.js')}}"></script>    

  <script src="{{ asset('js/index-sidebar.js') }}"></script>
    


  @yield('script')
</body>

</html>
