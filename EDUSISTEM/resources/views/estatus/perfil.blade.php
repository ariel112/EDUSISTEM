@extends('sidebar.sidebar')

@section('content')			 					


@foreach($becarios as $becario)

<div class="right_col" role="main">
 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perfil del becario (Estatus)</h2>                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
					

                      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  @if($becario->genero==1)
                  <div class="x_title"><img class="imagen-aspirantes " src="{{asset('images/estudentM.png')}}">
                  @else
                  <div class="x_title"><img class="imagen-aspirantes " src="{{asset('images/estudentF.png')}}">
                  @endif

                    <div align="center">
                  <h2 class="mt-3">{{$becario->nombre}}</h2>
                  </div>
                  
                    <ul class="nav navbar-right panel_toolbox">
                     
                  
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#home" data-toggle="tab">Estatus Becario</a>
                        </li>
                        <li><a href="#profile" data-toggle="tab">Informacion de Practica</a>
                        </li>
                        <li><a href="#messages" data-toggle="tab">Persona Dependiente</a>
                        </li>
                        <li><a href="#settings" data-toggle="tab">Datos Familiares</a>
                        </li>
                         <li><a href="#beca" data-toggle="tab">Datos Becas 20/20</a>
                        </li>
                        <li><a href="#doc" data-toggle="tab">Expediente</a>
                        </li>
                      
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="home">
                          <p class="lead">Estatus del becario</p>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Cambiar Estatus </button>
                           <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Estado</th>
                                      <th>Descripcón</th>
                                      <th>Fecha</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($estado_estudios as $estudio)                        
                                    <tr>
                                      <td>{{$estudio->estado}}</td>
                                      <td>{{$estudio->descripcion}}</td>
                                      <td>{{$estudio->created_at}}</td>                                       
                                    </tr>
                                  @endforeach      
                                  </tbody>
                                </table>
                                                                
                              
                            
                        </div>
                        <div class="tab-pane" id="profile">
                            <p class="lead">Información de Practica</p>
                                  <table id="datatable-fixed-header" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                    <th class="alinear" >Documento</th>
                                    <th>Descripcón</th>
                                    <th>Estado</th>
                                    <th>Inicio</th>
                                    <th>Final</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($practicas as $practica)
                                          <tr>
                                             <td class="center">       
                                                  <a href="/documentos/practica/{{$practica->url}}" download="{{$becario->identidad}}">
                                                    <img class="center-imagen" width="50" height="50" src="{{asset('img/pdf.png')}}">
                                                  </a>
                                              </td>
                                              <td>{{$practica->nombre}}</td>
                                              <td>{{$practica->estado}}</td>
                                              <td>{{$practica->inicio}}</td>
                                              <td>{{$practica->final}}</td>                                       
                                           </tr>
                                    @endforeach                                             
                                  </tbody>
                                </table>
                        </div>
                        <div class="tab-pane" id="beca">
                            <p class="lead">Información de la Beca</p>
                                <div class="col-md-6  ">
                                    <h2>Tipo de becario: </h2><p>{{$becario->beca}}</p>
                                    <h2>Cargo: </h2><P>{{$becario->cargo}}</P>
                                    <h2>otros: </h2><p>otro tipo de informacion</p>
                                                             
                                  </div>
                        </div>
                        <div class="tab-pane" id="doc">
                            <p class="lead">Documentos Digitales</p>
                                
                                


                        </div>
                        <div class="tab-pane" id="messages">
                            <p class="lead">Persona dependiente</p>
                            
                            <div class="container mt-3">
                      
                                Nombre Completo: <p>{{$becario->nombreDependiente}}</p>
                                Identidad: <p>{{$becario->identidadDependiente}}</p>
                                celular: <p>{{$becario->celularDependiente}}</p>
                        
                             </div>
                        </div>
                        <div class="tab-pane" id="ficha">
                            <p class="lead">Ficha de Información del Solicitante</p>
                            
                           
                        </div>
                      
                        <div class="tab-pane" id="settings">
                            <p class="lead">Datos Familiares</p>
                            <div class="padre">
                            Padre
                            <hr>
                                Nombre Completo: <p>{{$becario->nombrePadre}}</p>
                                Identidad: <p>{{$becario->identidadPadre}}</p>
                                celular: <p>{{$becario->celularPadre}}</p> 
                                </div> 
                        <div class="madre">
                            Madre
                            <hr>
                        Nombre Completo: <p>{{$becario->nombreMadre}}</p>
                        Identidad: <p>{{$becario->identidadMadre}}</p>
                        celular: <p>{{$becario->celularMadre}}</p>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>

                    

                	
                
                  </div>
                </div>
</div>
</div>
 


{!! Form::open(['route' => ['estatus.store'], 'method'=>'POST', 'files'=>true,'data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel">Actualización de Estatus</h5>
        <h3>{{$becario->universidad}}</h3>
     
      </div>
      <div class="modal-body">
            <input type="text" name="datos_personales_id" style="display: none;" value="{{$becario->id}}" class="form-control" style="width: 60px;">
            <input type="text" name="identidad" style="display: none;" value="{{$becario->identidad}}" class="form-control" style="width: 60px;">

         <div class="form-group" >
            <label for="message-text" class="col-form-label">Estatus:</label>
            <select name="estatus" id="estatus" required class="form-control" >
              <option selected disabled >Seleccione un estatus</option>
              <option value="Practica" >Practica</option>
              <option value="Activo" >Activo</option>
              <option value="Inactivo">Inactivo</option>
              <option value="Egresado">Egresado</option>      
            </select> 
          </div>
          <div id="descripcion-estado" class="form-group" >
              <label for="message-text" class="col-form-label">Descripción:</label>             
              <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
          </div>
          <div id="tiempo-practica">
            <div class="form-group" >
              <label for="message-text" class="col-form-label">Inicio:</label>
              <input  type="date" class="form-control" id="inicio"  name="inicio"  style="width: 220px;">
            </div>
             <div class="form-group" >
              <label for="message-text" class="col-form-label">Final:</label>
              <input id="final" type="date" class="form-control"  name="final"  style="width: 220px;">
            </div>
            <div class="form-group">
              <label  class="col-form-label">Archivos:</label>
              <input id="archivo"  type="file" name="expediente"  >
            </div>
          </div>
        
        </form>
      </div>
      <div  class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         {!! Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnEmpty' ]) !!}  
      </div>
    </div>
  </div>
</div>

       
            {{Form::close()}}






  @endforeach

@endsection


@section('script')






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
    

    <script type="text/javascript" src="{{asset('template/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script type="text/javascript" src="{{asset('template/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script> 
    <script type="text/javascript" src="{{asset('template/vendors/google-code-prettify/src/prettify.js')}}"></script>    
    <!-- jQuery Tags Input -->
    <script type="text/javascript" src="{{asset('template/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>

    

    <!-- Switchery -->
    <script type="text/javascript" src="{{asset('template/vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script type="text/javascript" src="{{asset('template/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script type="text/javascript" src="{{asset('template/vendors/parsleyjs/dist/parsley.js')}}"></script>
    <!-- Autosize -->
    <script type="text/javascript" src="{{asset('template/vendors/autosize/dist/autosize.min.js')}}"></script>   
    <!-- jQuery autocomplete -->
    <script type="text/javascript" src="{{asset('template/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>
    <!-- starrr -->
    <script type="text/javascript" src="{{asset('template/vendors/starrr/dist/starrr.js')}}"></script> 
      
 
@endsection