@extends('sidebar.sidebar')

@section('link')
 



@endsection    
@section("content")
<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Estatus en el sistema de los becarios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th class="alinear" >Imagen</th>
                        <th>Nombre</th>
                        <th>Identidad</th>
                        <th>Estado</th>
                        <th>Fecha del estado</th>
                        <TH>Observación</TH>                      
                        
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
                                    <td>{{$dato->nombre}}</td>
                                    <td>{{$dato->identidad}}</td>
                                    <td>{{$dato->estado}}</td>
                                    <td>{{$dato->fecha}}</td>
                                    @if($dato->practica==null)
                                    <td> </td>
                                    @else()
                                    <td> 
                                        <p class="color-negro">{{$dato->practica}}</p> 
                                        <p class="estilo-verde" ><i class="fa fa-star"></i> Inicio:{{$dato->practica_inicio}}</p>
                                        <p class="estilo-anaranjado"><i class="fa fa-star-o"></i> Fin:{{$dato->practica_fin}}</p>  
                                    </td>
                                    @endif
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