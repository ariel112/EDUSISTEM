@extends('sidebar.sidebar')

@section('link')
 



@endsection    
@section("content")
<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pre Planilla</h2> <br><br>
                    
                    <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">selecione universidad:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
                            <select name="id_municipio" id="municipio" required class="form-control" >
                                 <option selected disabled >Seleccione un universidad </option>      
                            </select> 
                            </div>
                          </div>
                    
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
                        
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($datos as $dato)
                                <tr>
                                    @if($dato->genero==1)
                                    <td class="center">
                                        <a href="{{route('estatus.perfil', $dato->id)}}">
                                            <img class="center-imagen" width="50" height="50" src="{{asset('images/estudentM.png')}}">
                                        </a>    
                                    </td>
                                    @else
                                    <td class="center">
                                        <a href="{{route('estatus.perfil',$dato->id)}}">
                                            <img class="center-imagen" width="50" height="50" src="{{asset('images/estudentF.png')}}">
                                        </a>    
                                    </td>
                                    @endif
                                    <td>{{$dato->identidad}}</td>
                                    <td>{{$dato->nombre}}</td>                                    
                                    <td>{{$dato->celular}}</td>
                                    <td>{{$dato->abreviatura}}</td>                                   
                                    <td>{{$dato->depa}}</td>                                   
                                </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

</div>
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