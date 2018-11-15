@extends('sidebar.sidebar')


@section('content')

   <!-- page content -->
        <div class="right_col" role="main">
        
         
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Convenios</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="fondo-beca" >
                    <br/>                    
                
 			 {!! Form::open(['route' => 'calendario.store', 'method'=>'POST', 'files'=>true, 'id'=>'formAspi','data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}
  		
 					
                 
                          <div align="center"><h2><i class="fa fa-book"></i></h2></div>
                          
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Universidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="universidad" name="universidad_id" class="form-control" required>
		                      <option selected disabled>Seleccion la universidad</option>
                              @foreach($universidades as $universidad)
                              <option value="{{$universidad->id}}">{{$universidad->nombre}}</option>                             
                              @endforeach    
		                      </select>
                            </div>
                          </div>
                       
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Selecione fecha de inicio:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date"  name="inicio" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Selecione fecha final:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date"  name="final" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                                     
                  
                         
                          </div>
							
						          <div align="center">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                      
                             <button class="btn btn-primary" type="reset">Limpiar Formulario</button>
                               {!! Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnEmpty' ]) !!}
                           
                          </div>
                        </div>    
                      </div>
                    

                  {{Form::close()}}














                  </div>
                </div>
              </div>
            </div>

      
            

         
        </div>
        <!-- /page content -->
@endsection