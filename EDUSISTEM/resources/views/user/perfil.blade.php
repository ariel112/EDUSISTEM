@extends('sidebar.sidebar')

@section('link')
 



@endsection

@section("content")
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Perfil del usuario</h3>
              </div>            
            </div>            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Reporte de usuario <small>Reporte de actividad</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                    
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="{{asset('template/production/images/picture.jpg')}}" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3 class="text-capitalize">{{ $user->name }}</h3>
                      <ul class="list-unstyled user_data">                       

                        <li>
                          <h4> <i class="fa fa-briefcase user-profile-icon"></i> <i id="cargo">{{ $user->type }}</i></h4>
                        </li>                     
                      </ul>
                      <a data-toggle="modal" data-target="#myCasa" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Asignarle Cargo</a>
                      <br/>
                      <br> 
                      <!-- start skills -->
                      <h4>Departamentos Asignados</h4>
                      <a data-toggle="modal" data-target="#mydepa" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i> Asignarle Departamento</a>
                      <br/>
                      <ul class="list-unstyled user_data">
                          <table class="ui blue table">
                            <thead>
                              <tr>
                                <th>Departamento</th>
                                <th>Fecha de Asignado</th>
                                <th>Accion</th>                              
                              </tr>
                            </thead>
                            <tbody id="tbody">
                              @foreach($depas as $depa)                              
                              <tr>
                                <td>{{$depa->name}}</td>
                                <td>{{$depa->fecha}}</td>
                                <td>
                                  {!! Form::open(['route'=>['editar-estado', $depa->id], 'method' => 'POST']) !!}
                                      <a href="#" class="btn btn-danger btn-delete"><i class="fa fa-power-off"></i></a>
                                  {!! Form::close() !!}                                  
                                 </td>                              
                              </tr>                              
                              @endforeach
                            </tbody>
                          </table>
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <!-- end of user-activity-graph -->
                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Actividades recientes</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Historial de inicio de sesiones</a>
                          </li>                        
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <!-- start recent activity -->
                            <ul class="messages">
                              <li>
                                <img src="{{asset('template/production/images/img.jpg')}}" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">24</h3>
                                  <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">Edito al becario</h4>
                                  <blockquote class="message">beacrio .</blockquote>
                                  <br />
                              
                                </div>
                              </li>
                              <li>
                                <img src="{{asset('template/production/images/img.jpg')}}" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-error">21</h3>
                                  <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">Guardo inforamcion del becario</h4>
                                  <blockquote class="message">becario</blockquote>
                                  <br />
                                                              </div>
                              </li>
                              <li>
                                <img src="{{asset('template/production/images/img.jpg')}}" class="avatar" alt="Avatar">
                                <div class="message_date">
                                  <h3 class="date text-info">24</h3>
                                  <p class="month">May</p>
                                </div>
                                <div class="message_wrapper">
                                  <h4 class="heading">Actulizo datos</h4>
                                  <blockquote class="message">universitario</blockquote>
                                  <br/>                               
                                </div>
                              </li>                              
                            </ul>
                            <!-- end recent activity -->
                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>                            
                              <th>Nombre</th>
                              <th>Cargo</th>                                        
                              <th>Fecha </th>                
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($sesiones as $sesion)         
                                      <tr>                                  
                                          <td>{{$sesion->name}}</td>
                                          <td>{{$sesion->type}}</td>
                                          <td>{{$sesion->fecha}}</td>             
                                      </tr>                                     
                              @endforeach    
                            </tbody>
                          </table>
                            <!-- end user projects -->
                          </div>                    
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!--Ventana modal de la departamento asignado -->
    <div id="mydepa" class="modal fade" role="dialog">
      <div  class="modal-dialog">
        <!-- Modal content-->
        <div  class="modal-content">
          <div class="modal-header">             
            <h4 class="modal-title" align="center" " ><b>Asignar Departamento</b></h4>
          </div>
          <div class="modal-body">
                    <div>
                          {!! Form::open(['route' => ['depa-agregar',$user->id], 'method'=>'PUT', 'files'=>true, 'id'=>'formEmpty1','data-smk-icon'=>'glyphicon-remove-sign']) !!}                     
                           <div class="form-group" >       
                                {!! Form::label('name','Nombre:' ) !!}
                                {{$user->name}}                                     
                           </div>
                            <div class="form-group" style="width: 209px;"  >    
                           {!! Form::label('Departamento','Departamento:',['class'=>'control-label']) !!}
                            <div style="width: 195px;">                             
                                <select name="departamento_id_depto" id="depa">
                                 @foreach($depars as $depar)
                                  <option value="{{$depar->id_depto}}">{{$depar->departamento}}</option> 
                                 @endforeach          
                                </select>                           
                            </div>
                        </div>
                    </div>

          </div>
          <div class="modal-footer">                                
            <div align="center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success ','id'=>'btnEmpty1' ]) !!}
                {!! Form::close()!!}
                </div>                            
          </div>
        </div>
      </div>
    </div>


    <!--Ventana modal del cargo asignado -->
    <div id="myCasa" class="modal fade" role="dialog">
      <div  class="modal-dialog">
        <!-- Modal content-->
        <div  class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" align="center" " ><b>Asignar cargo</b></h4>
          </div>                           
          <div class="modal-body">
                    <div>
                         {!! Form::open(['route' => ['agregar-estado',$user->id], 'method'=>'PUT', 'files'=>true, 'id'=>'form','data-smk-icon'=>'glyphicon-remove-sign']) !!}      
                           <div class="form-group" >       
                                {!! Form::label('name','Nombre:' ) !!}
                                {{$user->name}}                                                     
                           </div>
                            <div class="form-group" style="width: 209px;"  >    
                           {!! Form::label('Cargo','Cargo:',['class'=>'control-label']) !!}
                            <div style="width: 195px;">
                              {!! Form::select('type',
                              [
                              'Gerencia de Formacion y Capacitacion'=> 'Formacion Y Capacitacion',
                              'Gerencia de Compromiso Social y Juvenil'=>'Compromiso Social y Juvenil',
                              'Gerencia de Monitoreo y Evaluacion'=>'Gerencia de Monitoreo y Evaluacion',
                              'Gerencia de Formacion y Liderazgo'=>'Gerencia de Formacion y Liderazgo',
                              'Gerencia Contabilidad'=>'Gerencia Contabilidad',
                              'Gerencia Planilla'=>'Gerencia Planilla',
                              'Operaciones'=>'Operaciones',
                              'Administrador'=>'Administrador'
                              ]
                                ,$user->type,
                              ['class'=>'form-control', 'required','placeholder'=>'Seleccione un Cargo', 'id'=>'carg'])!!}
                            </div>
                        </div>
                    </div>

          </div>
          <div class="modal-footer">                                
            <div align="center">
                {!! Form::submit('Registrar',['class'=>'btn btn-success ','id'=>'btnEmpty12' ]) !!}
                {!! Form::close() !!}
                </div>                            
          </div>
        </div>
      </div>
    </div>

@endsection


@section('script')
    <!-- morris.js -->
    <script type="text/javascript" src="{{asset('template/vendors/raphael/raphael.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/morris.js/morris.min.js')}}"></script>
    <!--Este script es para las peticiones con ajax -->
    <script src="{{ asset('js/script.js')}}"></script>

    <!-- Datatables -->
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>  
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/net-buttons/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>



    
@endsection