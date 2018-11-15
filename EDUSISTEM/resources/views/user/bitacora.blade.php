@extends('sidebar.sidebar')


@section('link')
 <link rel="stylesheet" type="text/css" href="{{asset('Semantic/semantic.min.css')}}">



@endsection
@section("content")
<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Acciones realizadas en el sistema </h2>                    
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">
                
                     <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>                            
                              <th>Accion</th>
                                           
                              </tr>
                            </thead>
                            <tbody>
                               @foreach ($acciones as $accion)         
                                      <tr>                                  
                                          <td> 
                                              <div class="ui feed">

                                                <div class="event">
                                                  <div class="label">
                                                    <img src="{{asset('images/user.png')}}">
                                                  </div>
                                                  <div class="content">
                                                    <div class="summary">
                                                      <a class="user" class="text-capitalize">
                                                        {{$accion->nombre}} &nbsp;
                                                      </a> <font style="color:{{$accion->color}}; ">{{$accion->accion}}</font>&nbsp;&nbsp;
                                                       <font style="color: gray;">{{$accion->beca}}</font>
                                                      <div class="date">
                                                        {{$accion->fecha}}
                                                      </div>
                                                    </div>
                                                 
                                                  </div>
                                                </div>                                                
                                              </div>
                                          </td>
                                                     
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