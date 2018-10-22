@extends('sidebar.sidebar')

@section('link')
 



@endsection    
@section("content")
<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Busqueda Global de becarios en el sistema</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                        <th>Telefono</th>                      
                        <th class="alinear"> Editar</th>
                        </tr>
                      </thead>


                      <tbody>
                         
                                <tr>

                                    <td class="center">
                                        <a href="{{route('aspirantes.perfil', 2)}}">
                                            <img class="center-imagen" src="{{asset('images/masculino.jpg')}}">
                                        </a>    
                                    </td>
                                    <td>Selvin Ariel Morazan Colindres</td>
                                    <td>0705199400130</td>
                                    <td>99138307</td>                                    
                                    <td class="alinear"><img class="center-imagen" src="{{asset('images/editar.png')}}"></td>
                            
                                </tr>

                                <tr>

                                    <td class="center">
                                        <a href="{{route('aspirantes.perfil', 2)}}">
                                            <img class="center-imagen" src="{{asset('images/femenino.jpg')}}">
                                        </a>    
                                    </td>
                                    <td>Marta Yolany Velasquez Daster</td>
                                    <td>0705199400130</td>
                                    <td>99138307</td>                                    
                                    <td class="alinear"><img class="center-imagen" src="{{asset('images/editar.png')}}"></td>
                            
                                </tr>

                      
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