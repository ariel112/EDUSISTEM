@extends('sidebar.sidebar')

@section('link')
 

 <link href="{{ asset('css/main.css') }}" rel="stylesheet">

@endsection    
@section("content")
<div class="right_col" role="main">

{!! Form::open(['route' => 'pre_planilla.store', 'method'=>'POST', 'files'=>true, 'id'=>'formAspi','data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pre Planilla</h2> 
                    <div align="center" class="
                     container">                           
                            <div class="col-md-3 col-sm-3 col-xs-3">
                              @if($nuevo=='NO')
                              Seleccione la fecha: <input id="mesPrePlanilla"  name="fechaPrePlanilla" class="form-control"  type="date" required >
                              @else() 
                              Seleccione la fecha: <input id="mesPrePlanilla" name="fechaPrePlanilla" class="form-control" value="{{$date}}" type="date" required>
                              @endif                             
                            </div>
                            <br>
                    </div>
   {!! Form::submit('Generar ',['class'=>'btn btn-success','id'=>'btnEmpty' ]) !!}
      @if($nuevo=='NO')
      @else()      
      <a href="{{url("decargar/$date/preplanilla")}}" class="btn btn-success">Descargar excel</a>
      @endif     
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th class="alinear" >Imagen</th>
                        <th>Identidad</th>
                        <th>Nombre</th>
                        <th>Celular</th>
                        <th>Abreviatura</th>
                        <th>Departamento</th>
                        <th>Mes</th>
                        </tr>
                      </thead>
                      <tbody >
                      @if($nuevo=='NO')
                       @else()  
                         @foreach($nuevo as $becario)
                         <tr>
                           @if($becario->genero==1)
                                    <td class="center">
                                        <a href="{{route('aspirantes.perfil', $becario->id_datos_personales)}}">
                                            <img class="center-imagen" width="50" height="50" src="{{asset('images/estudentM.png')}}">
                                        </a>    
                                    </td>
                                    @else
                                    <td class="center">
                                        <a href="{{route('aspirantes.perfil',$becario->id_datos_personales)}}">
                                            <img class="center-imagen" width="50" height="50" src="{{asset('images/estudentF.png')}}">
                                        </a>    
                                    </td>
                                    @endif
                           <td>{{$becario->identidad}}</td>
                           <td>{{$becario->nombre}}</td>
                           <td>{{$becario->celular}}</td>
                           <td>{{$becario->abreviatura}}</td>
                           <td>{{$becario->departamento}}</td>
                           <td>{{$mesP}}</td>
                         </tr> 
                         @endforeach
                       
                        @endif 

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

</div>
@endsection


@section('script')

   
    <!--Este script es para las peticiones con ajax -->
    <script src="{{ asset('js/script.js')}}"></script> 

 <!-- Datatables -->
<script type="text/javascript" src="{{asset('template/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>  
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>

<script type="text/javascript" src="{{asset('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/jszip/dist/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('template/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

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