@extends('sidebar.sidebar')


@section('link')

<!-- Dropzone.js -->
        <link rel="stylesheet" type="text/css" href="{{asset('template/vendors/dropzone/dist/min/dropzone.min.css')}}"> 

@endsection

@section('content')


     <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
                      
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perfil<small>usuario</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div align="center" class="x_content">
					
                      <div class="profile_img">
                        <div id="crop-avatar">

                		@if(Auth::user()->img_url==null )
		    			<a id="posicion-a" href="{{route('usuario.foto')}}" class="image">
		    				<img id="imagen-perfil" src="{{ asset('images/user.png') }}"  alt="Taller" class="img-responsive img-rounded"/>
		    			</a>
		    			 @else
		    			 <a id="posicion-a" href="{{route('usuario.foto')}}" class="image">
		    			 	<img id="imagen-perfil"  src="/images/perfiles/{{ Auth::user()->img_url}}"  alt="Taller" class="img-responsive img-rounded"/>
		    			 </a>
		    		     @endif	


                        </div>
                      </div>
                  
                      <br>
                      <h2 class="text-capitalize">{{ Auth::user()->name }}</h2>
                      <ul class="list-unstyled user_data">                       

                        <li>
                          <h3> <i class="fa fa-briefcase user-profile-icon"></i> <i id="cargo">{{ Auth::user()->type }}</i></h3>
                        </li>                     
                      </ul>
   
             		 <a data-toggle="modal" data-target="#myperfil" class="btn btn-info"><i class="fa fa-edit m-right-xs"></i>Cambiar foto de perfil</a>                  


                  </div>




                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     


        <!--Ventana modal de la departamento asignado -->
    <div id="myperfil" class="modal fade" role="dialog">
      <div  class="modal-dialog">
        <!-- Modal content-->
        <div  class="modal-content">
          <div class="modal-header">             
            <h4 class="modal-title" align="center" " ><b>Seleccione una Fotografia</b></h4>
          </div>
          <div class="modal-body">
                    <div>
                          {!! Form::open(['route' => ['usuario.show', Auth::user()->id], 'method'=>'POST', 'files'=>true]) !!}    
                          <!-- page content -->
					
					     
					        
					      <!-- /page content -->                     
                       

                    </div>

          </div>
          <div class="modal-footer">                                
            <div align="center">
                {!! Form::submit('Guardar',['class'=>'btn btn-success ','id'=>'btnEmpty1' ]) !!}
                {!! Form::close()!!}
                </div>                            
          </div>
        </div>
      </div>
    </div>



  
@endsection


@section('script')
 <!-- Dropzone.js -->
 <script type="text/javascript" src="{{asset('template/vendors/dropzone/dist/min/dropzone.min.js')}}"></script>  
 
@endsection