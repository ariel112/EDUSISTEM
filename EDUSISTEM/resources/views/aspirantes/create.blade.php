@extends('sidebar.sidebar')

@section('script-content')


/*evento para las teclas solo numeros*/
function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}


/*Evento para evento de letras */
 
   function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

@endsection


@section('content')

      <!-- page content -->
        <div class="right_col" role="main">
        
         
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formulario Aspirante</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="fondo-beca" >
                    <br/>


                    
                
 			 {!! Form::open(['route' => 'aspirantes.store', 'method'=>'POST', 'files'=>true, 'id'=>'formAspi','data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}
  		
 					   <div align="center"><h2>INFORMACIÓN DEL(LA) ESTUDIANTE </h2> </div>	
                    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Numero de identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input style="float: left!important;" type="text" id="respuesta_id"  name="identidad" onkeypress="return valida(event)" maxlength="13" minlength="13" required="required" class="form-control col-md-7 col-xs-12">
                              <span id="sp_si" style="color: #3edc3e; display: none;"><i class="fa fa-check-circle"></i></span>
                              <span id="sp_id" style="color: red; display: none;"><i class="fa fa-close"> </i> La Identidad ya existe</span>
                            </div>
                          </div>

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text"  name="nombre_completo" required  onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de Nacimiento:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date"  name="fecha_nacimiento" required class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estado civil:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
                    
                            <select name="estado_civil" id="estado_civil" class="form-control"  required>                              
                              <option selected disabled >Seleccione el estado civil </option>                              
                              @foreach($estado_civils as $estado_civil)
                              <option value="{{$estado_civil->id_estado_civil}}">{{$estado_civil->estado_civil}}</option>                             
                              @endforeach                              
                            </select>                    
                            </div>
                          </div>

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="telefono_aspirante" maxlength="8" minlength="8" required  onkeypress="return valida(event)"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div> 
                          

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Departamento:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                
                            <select name="departamento" id="departamentos" required class="form-control" >                              
		                          <option selected disabled >Seleccione un departamento </option>                              
                              @foreach($departamentos as $departamento)
		                          <option value="{{$departamento->id_depto}}">{{$departamento->departamento}}</option>		                         
                              @endforeach                              
		                        </select> 
                    
                            </div>
                          </div>

  
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Municipio:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                        <select name="id_municipio" id="municipio" required class="form-control" >
                                 <option selected disabled >Seleccione un municipio </option>      
		                        </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <input type="text"  name="ciudad" required class="form-control col-md-7 col-xs-12" onkeypress="return soloLetras(event)">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Genero:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                        <select name="id_genero" required class="form-control" >
		                          <option selected disabled >Seleccion el genero:</option>
		                          <option value="1">Masculino</option>
		                          <option value="2">Femenino</option>
		                        </select> 
                            </div>
                          </div>


                          <br>
                          <br>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Universidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="universidad" class="form-control"  required  >
		                      <option selected disabled>Seleccion la universidad</option>
                              @foreach($universidades as $universidad)
                              <option value="{{$universidad->id}}">{{$universidad->nombre}}</option>                             
                              @endforeach    
		                      </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Campus
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  id="campus" class="form-control"  required >
			                      <option selected disabled>Seleccion un campus</option>		                      
			                    </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Facultad
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  id="facultad" class="form-control"  required >
                            <option selected disabled>Seleccione la facultad</option>                          
                          </select>
                            </div>
                          </div>
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Carrera
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  id="carrera" name="carrera_id" class="form-control"  required >
                            <option selected disabled>Seleccione la carrera</option>                          
                          </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Cuenta Universitaria:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text"  name="cuenta_universitaria" required  onkeypress="return valida(event)" maxlength="11" minlength="11"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>                         
                            <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
                    
                            <select name="becas_id" id="beca" class="form-control" required>                              
                              <option selected disabled >Seleccione la beca </option>                              
                              @foreach($becas as $beca)
                              <option value="{{$beca->id}}">{{$beca->nombre}}</option>                             
                              @endforeach                              
                            </select> 
                    
                            </div>
                          </div>
						
						              <br>
                          <br>
                          <div align="center"><h2>PERSONA DEPENDIENTE</h2></div>
						 
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre Completo: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text"  name="nombre_dependiente" onkeypress="return soloLetras(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text"  name="id_dependiente" maxlength="13" minlength="13" onkeypress="return valida(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Parentesco: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="parentesco" id="parentesco" class="form-control" required>
                                  <option selected disabled>Seleccion el parentesco</option>
                                  <option value="Amigo(a)">Amigo(a)</option>
                                  <option value="Padre">Padre</option>
                                  <option value="Tio(a)">Tio(a)</option>
                                  <option value="Primo(a)">Primo(a)</option>
                                  <option value="Vecino(a)">Vecino(a)</option>
                                  <option value="Esposo(a)">Esposo(a)</option>
                                  <option value="Abuelo(a)">Abuelo(a)</option>
                                  <option value="Suegro(a)">Suegro(a)</option>
                                  <option value="Padrino/Madrina">Padrino/Madrina</option>
                                  <option value="Hermano(a)">Hermano(a)</option>
                                  <option value="Compañero de trabajo">Compañero de trabajo</option>
                                  <option value="Cuñado(a)">Cuñado(a)</option>
                                  <option value="Hijo(a)">Hijo(a)</option>
                                  <option value="Hijastro(a)">Hijastro(a)</option>
                                  <option value="Sobrino(a)">Sobrino(a)</option>
                                  <option value="Nieto(a)">Nieto(a)</option>
                                  <option value="Nuero/Yerno">Nuero/Yerno</option>
                                  <option value="Compadre/Comadre">Compadre/Comadre</option>
                                  <option value="Madre">Madre</option>
                              </select> 
                            </div>
                          </div>
                          
                     
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text"  name="telefono_dependiente" required="required" maxlength="8" minlength="8" onkeypress="return valida(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
	
						 <br>
						 <br>
             <div id="padre">
						 <div align="center"><h2>DATOS DEL PADRE</h2></div>
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre Completo del padre: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text"  name="nombre_padre"  onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text"  name="id_padre" maxlength="13" minlength="13" onkeypress="return valida(event)"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="telefono_padre" maxlength="8" minlength="8" onkeypress="return valida(event)"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>    
                </div>

                <br>
                <br>
                <div id="madre"> 	
                          <div align="center"><h2>DATOS DE LA MADRE</h2></div>
						              <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Completo de la madre: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text"  name="nombre_madre"  onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text"  name="id_madre"  maxlength="13" minlength="13" onkeypress="return valida(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="telefono_madre" name="telefono_madre" maxlength="8" minlength="8" onkeypress="return valida(event)"  class="form-control col-md-7 col-xs-12">
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


@section('script')


	    
    <!--Este script es para las peticiones con ajax -->
    <script src="{{ asset('js/script.js')}}"></script> 

    <script type="text/javascript" src="{{asset('template/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script type="text/javascript" src="{{asset('template/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script> 
    <script type="text/javascript" src="{{asset('template/vendors/google-code-prettify/src/prettify.js')}}"></script>    
    <!-- jQuery Tags Input -->
    <script type="text/javascript" src="{{asset('template/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>

    

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