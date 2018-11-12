@extends('sidebar.sidebar')


@section('content')

   <!-- page content -->
        <div class="right_col" role="main">
        
         
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> EDITAR</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="fondo-beca" >
                    <br/>                    
                
 	@foreach($pagos as $pago)		      
      {!! Form::open(['route' => ['meses.update',$pago->id], 'method'=>'PUT', 'files'=>true,'data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}    
                  
                  <div class="x_content">

                    <table class="table table-bordered tablas">
                      <thead class="color-tablas">
                        <tr>
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
  
                        <tr>
                          <td>
                            <select name="01" class="form-control col-1" required>
                                <option selected value="{{$pago->enero}}" >{{$pago->enero}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select> 
                          </td>
                          <td>
                            <select name="02" class="form-control col-1" required>
                                <option selected value="{{$pago->febrero}}">{{$pago->febrero}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="03" class="form-control col-1" required>
                                <option selected value="{{$pago->marzo}}">{{$pago->marzo}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="04" class="form-control col-1" required>
                                <option selected value="{{$pago->abril}}">{{$pago->abril}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="05" class="form-control col-1" required>
                                <option selected value="{{$pago->mayo}}">{{$pago->mayo}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="06" class="form-control col-1" required>
                                <option selected value="{{$pago->junio}}">{{$pago->junio}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="07" class="form-control col-1" required>
                                <option selected value="{{$pago->julio}}">{{$pago->julio}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="08" class="form-control col-1" required>
                                <option selected value="{{$pago->agosto}}">{{$pago->agosto}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="09" class="form-control col-1" required>
                                <option selected value="{{$pago->septiembre}}">{{$pago->septiembre}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="10" class="form-control col-1" required>
                                <option selected value="{{$pago->octubre}}">{{$pago->octubre}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>
                          <td>
                            <select name="11" class="form-control col-1" required>
                                <option selected value="{{$pago->noviembre}}">{{$pago->noviembre}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td>                          
                          <td>
                            <select name="12" class="form-control col-1" required>
                                <option selected value="{{$pago->diciembre}}">{{$pago->diciembre}}</option>
                                <option value="SI">SI</option>
                                <option value="NO">NO</option>
                                <option value="AMBOS PERIODO">AMBOS PERIODO</option>                                 
                            </select>
                          </td> 
                        </tr>
             

                      </tbody>
                    </table>
                      {!! Form::submit('Guardar',['class'=>'btn btn-success','id'=>'btnEmpty' ]) !!}   
                  </div>
					
   @endforeach
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