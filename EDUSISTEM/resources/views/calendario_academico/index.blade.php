@extends('sidebar.sidebar')


@section('content')

   <!-- page content -->
        <div class="right_col" role="main">
        
         
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Periodos academicos</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="fondo-beca" >
                    <br/>


                    
                
 			 {!! Form::open(['route' => 'calendario.store', 'method'=>'POST', 'files'=>true, 'id'=>'formAspi','data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}
  		
 					
                 
                          <div align="center"><h2>CENTRO UNIVERSITARIO</h2></div>
                          <!--
							             <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nivel Educativo: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="genero" id="heard" class="form-control" required>
		                          <option selected disabled >Seleccion el nivel educativo:</option>
		                          <option value="1">Primaria</option>
		                          <option value="2">Secundaria</option>
		                          <option value="3">Universidad</option>
		                        </select> 
                            </div>
                          </div>  
                        -->
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Universidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="universidad" class="form-control" required>
		                      <option selected disabled>Seleccion la universidad</option>
                              @foreach($universidades as $universidad)
                              <option value="{{$universidad->id}}">{{$universidad->nombre}}</option>                             
                              @endforeach    
		                      </select>
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Seleccione el periodo
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  id="campus" class="form-control" required>
			                      <option selected disabled>Seleccion un periodo</option>
			                      <option >I periodo</option>
			                      <option >II periodo</option>
			                      <option >III periodo</option>
			                      <option >IV periodo</option>

			                    </select>
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Selecione fecha de inicio:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" id="last-name" name="fecha_inicio" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Selecione fecha final:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" id="last-name" name="fecha_final" required="required" class="form-control col-md-7 col-xs-12">
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