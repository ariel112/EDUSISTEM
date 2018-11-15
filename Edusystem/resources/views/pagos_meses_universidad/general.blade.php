@extends('sidebar.sidebar')


@section('content')

   <!-- page content -->
        <div class="right_col" role="main">
        
         
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PAGOS CONVENIOS CORRESPONDIENTES A UNIVERSIDADES <i class="fa fa-university"></i></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="fondo-beca" >
                    <br/>                    
                
 			      
   
                
                  <div class="x_content">

                    <table class="table table-bordered tablas">
                      <thead class="color-tablas">
                        <tr>
                          <th>UNIVERSIDAD</th>
                          <th>ABREVIATURA</th>
                          <th>ENERO</th>
                          <th>FEBRERO</th>
                          <th>MARZO</th>
                          <th>ABRIL</th>
                          <th>MAYO</th>
                          <th>JUNIO</th>
                          <th>JULIO</th>
                          <th>AGOSTO</th>
                          <th>SEPTIEMBRE</th>
                          <th>OCTUBRE</th>
                          <th>NOVIEMBRE</th>
                          <th>DICIEMBRE</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
  
  @foreach($general as $gene)
                        <tr>
                          <td>{{$gene->universidad}}</td>
                          <td>{{$gene->abreviatura}}</td>
                          <td>{{$gene->enero}}</td>
                          <td>{{$gene->febrero}}</td>
                          <td>{{$gene->marzo}}</td>
                          <td>{{$gene->abril}}</td>
                          <td>{{$gene->mayo}}</td>
                          <td>{{$gene->junio}}</td>
                          <td>{{$gene->julio}}</td>
                          <td>{{$gene->agosto}}</td>
                          <td>{{$gene->septiembre}}</td>                          
                          <td>{{$gene->octubre}}</td>
                          <td>{{$gene->noviembre}}</td>
                          <td>{{$gene->diciembre}}</td> 
                        </tr>
             
@endforeach
                      </tbody>
                 </table>
                  </div>
					

                  </div>
                </div>
              </div>
            </div>
         
        </div>

   {{Form::close()}}
        <!-- /page content -->
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