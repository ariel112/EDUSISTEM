@extends('sidebar.sidebar')

@section('content')
			 					



@foreach($becarios as $becario)

<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perfil del becario Para la retención del pago</h2>                    
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
                        <li class="active"><a href="#home" data-toggle="tab">Retención de pagos</a>
                        </li>
                        <li><a href="#profile" data-toggle="tab">Información Universitaria</a>
                        </li>
                        <li><a href="#messages" data-toggle="tab">Persona Dependiente</a>
                        </li>
                        <li><a href="#settings" data-toggle="tab">Datos Familiares</a>
                        </li>
                         <li><a href="#beca" data-toggle="tab">Datos Becas 20/20</a>
                        </li>
                        <li><a href="#doc" data-toggle="tab">Expediente</a>
                        </li>
                        <li><a href="#ficha" data-toggle="tab">Ficha 01</a>
                        </li>
                        <li><a href="#iden" data-toggle="tab">Identidad Digitalizada</a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane active" id="home">
                          <p class="lead">Retenciones de pagos</p>
						 	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Retener pago </button>                                                               
                               <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>                                    
                                    <th>año</th>
                                    <th>Inicio</th>
                                    <th>Final</th>
                                    <th>Observación</th>                                  
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($retencions as $retencion)
                                            <tr>                                              
                                                <td class="center">                                                    
                                                   {{$retencion->inicio}} 
                                                </td>
                                                <td>{{$retencion->inicio}}</td>
                                                <td>{{$retencion->final}}</td>
                                                <td>{{$retencion->descripcion}}</td>
                                                                              
                                            </tr>
                                     @endforeach       
                                  </tbody>
                                </table>   
                            
                        </div>
                        <div class="tab-pane" id="profile">
                            <p class="lead">Información Universitaria</p>
                                <div class="col-md-6  ">
                                    <h2>Universidad: </h2><p>{{$becario->universidad}}</p>
                                    <h2>Campus: </h2><P>{{$becario->campus}}</P>
                                    <h2>Facultad: </h2><p>{{$becario->facultad}}</p>
                                    <h2>Carrera: </h2><p>{{$becario->carrera}}</p>
                                    <h2>Cuenta: </h2> <p>{{$becario->cuenta_universitaria}}</p>                           
                                  </div>
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
                                <button class="btn btn-success">Agregar Documentos</button>
                                 <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                    <th class="alinear" >Imagen</th>
                                    <th>Nombre</th>
                                    <th>Periodo</th>
                                    <th>año</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                            <tr>
                                                <td class="center">                                                    
                                                    <img class="center-imagen" width="50" height="50" src="{{asset('img/pdf.png')}}">
                                                </td>
                                                <td>forma 03</td>
                                                <td>I Periodo</td>
                                                <td>2018</td>                                        
                                            </tr>
                                  </tbody>
                                </table>


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
                            
                            <div class="container mt-3">                      
                              <h2>  Ficha 01: <img class="center-imagen" width="50" height="50" src="{{asset('img/pdf.png')}}">
                                año:  2018
                              </h2>                          
                             </div>
                        </div>
                        <div class="tab-pane" id="iden">
                            <p class="lead">Identidad digitalizada</p>                            
                            <div class="container mt-3">                               
                                <h2>Identidad: <img class="center-imagen" width="50" height="50" src="{{asset('img/pdf.png')}}"><h2>                        
                             </div>
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


 
{!! Form::open(['route'=>['retencion.store'], 'method'=>'POST', 'files'=>true,'data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}
 <input type="text" name="id_datos_personales" style="display: none;" value="{{$becario->id}}" class="form-control" style="width: 60px;">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel">Retencion de pagos</h5>
        <h3>RETENCIÓN DE PAGO</h3>
     
      </div>
      <div class="modal-body">
      	<div class="form-group">
            <label for="recipient-name" class="col-form-label">Descripcion:</label>
            <textarea name="descripcion" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha Inicio:</label>
            <input type="date" name="inicio" class="form-control" style="width: 260px;">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Fecha Final:</label>
            <input type="date" name="final" class="form-control" style="width: 260px;">
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