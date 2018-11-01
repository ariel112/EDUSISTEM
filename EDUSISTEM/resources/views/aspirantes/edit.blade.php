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


                    
                
 			 {!! Form::open(['route' => ['aspirantes.update',$aspirante->id], 'method'=>'PUT', 'files'=>true, 'id'=>'formAspi','data-parsley-validate','class'=>'form-horizontal form-label-left']) !!}
  		
 					   <div align="center"><h2>INFORMACIÓN DEL(LA) ESTUDIANTE </h2> </div>	
                    
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Numero de identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="identidad" value="{{$aspirante->identidad}}"   onkeypress="return valida(event)" maxlength="13" minlength="13" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" value="{{$aspirante->nombre}}"  name="nombre_completo" required  onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de Nacimiento:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" value="{{$aspirante->fecha_nacimiento}}"  name="fecha_nacimiento" required class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                           <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Estado civil:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
                    
                            <select name="estado_civil" id="estado_civil" class="form-control"  required>   
                              @foreach($estado_civils as $estado_civil)
                              @if($aspirante->estado_civil==$estado_civil->id_estado_civil)
                              <option selected value="{{$estado_civil->id_estado_civil}}">{{$estado_civil->estado_civil}}</option>
                              @else
                               <option value="{{$estado_civil->id_estado_civil}}">{{$estado_civil->estado_civil}}</option>
                              @endif
                                                          
                              @endforeach                              
                            </select>                    
                            </div>
                          </div>

                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" value="{{$aspirante->celular}}" name="telefono_aspirante" maxlength="8" minlength="8" required  onkeypress="return valida(event)"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div> 
                          

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Departamento:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                
                            <select name="departamento" id="departamentos" required class="form-control" >  
                              @foreach($departamentos as $departamento)
                              @if($variable_depa==$departamento->id_depto)
		                          <option selected value="{{$departamento->id_depto}}">{{$departamento->departamento}}</option>
                              @else
                              <option value="{{$departamento->id_depto}}">{{$departamento->departamento}}</option>		                         
                              @endif
                              @endforeach                              
		                        </select> 
                    
                            </div>
                          </div>

  
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Municipio:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                        <select name="id_municipio" id="municipio" required class="form-control" >
                                 <option selected value="{{$id_municipio}}" >{{$nombre_municipio}} </option>      
		                        </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Ciudad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <input type="text" value="{{$aspirante->ciudad}}"  name="ciudad" required class="form-control col-md-7 col-xs-12" onkeypress="return soloLetras(event)">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Genero:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                        <select name="id_genero" required class="form-control" >
		                           @foreach($generos as $genero)
                              @if($aspirante->genero==$genero->id_genero)
                              <option selected value="{{$genero->id_genero}}">{{$genero->genero}}</option>
                              @else
                               <option value="{{$genero->id_genero}}">{{$genero->genero}}</option>
                              @endif
                                                          
                              @endforeach
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
                            <select id="universidad" class="form-control"  required>		                      
                              @foreach($universidades as $universidad)
                              @if($listUnivesidad==$universidad->id)
                              <option selected value="{{$universidad->id}}">{{$universidad->nombre}}</option>
                              @else
                               <option value="{{$universidad->id}}">{{$universidad->nombre}}</option>
                              @endif                                                          
                              @endforeach    
		                      </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Campus
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  id="campus" class="form-control"  required >
			                      <option selected value="{{$id_campus}}">{{$nombre_campus}}</option>		                      
			                    </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Facultad
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  id="facultad" class="form-control"  required >
                            <option selected value="{{$id_facultad}}">{{$nombre_facultad}}</option>                          
                          </select>
                            </div>
                          </div>
                          <input type="text" name="idd_carrera" style="display: none;" value="{{$idd_carrera}}">
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Carrera
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  id="carrera" name="carrera_id" class="form-control"  required >
                            <option selected value="{{$id_carrera}}">{{$nombre_carrera}}</option>                          
                          </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Cuenta Universitaria:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" value="{{$aspirante->cuenta_universitaria}}"  name="cuenta_universitaria" required  onkeypress="return valida(event)" maxlength="11" minlength="11"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                            <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
                    
                            <select name="becas_id" id="beca" class="form-control" required>                              
                              <option selected disabled >Seleccione la beca </option>                              
                              @foreach($becas as $beca)
                              @if($aspirante->becas_id==$beca->id)
                              <option value="{{$beca->id}}" selected>{{$beca->nombre}}</option>
                              @else
                              <option value="{{$beca->id}}">{{$beca->nombre}}</option>
                              @endif                                                           
                              @endforeach                              
                            </select> 
                    
                            </div>
                          </div>
						
						              <br>
                          <br>
                          <div align="center"><h2>PERSONA DEPENDIENTE</h2></div>
						            @foreach($dependientes as $dependiente)
                        <input type="text" name="idd_dependiente" style="display: none;" value="{{$depenID}}">
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre Completo: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text"  name="nombre_dependiente" value="{{$dependiente->nombre_completo}}" onkeypress="return soloLetras(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text" value="{{$dependiente->identidad}}"  name="id_dependiente" maxlength="13" minlength="13" onkeypress="return valida(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Parentesco: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select name="parentesco" id="parentesco" class="form-control" required>
                                  <option selected value="{{$dependiente->parentesco}}">{{$dependiente->parentesco}}</option>
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
                              <input type="text" value="{{$dependiente->celular}}"  name="telefono_dependiente" required="required" maxlength="8" minlength="8" onkeypress="return valida(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          @endforeach
	
						 <br>
						 <br>
             <div id="padre">
						 @foreach($padres as $padre)
             <div align="center"><h2>DATOS DEL PADRE</h2></div>
              <input type="text" name="idd_padre" style="display: none;" value="{{$padre->id}}">
                        
						              <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Nombre Completo del padre: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text"  name="nombre_padre" value="{{$padre->nombre_completo}}"  onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text"  name="id_padre" value="{{$padre->identidad}}" maxlength="13" minlength="13" onkeypress="return valida(event)"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="telefono_padre" value="{{$padre->celular}}" maxlength="8" minlength="8" onkeypress="return valida(event)"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>    
                </div>
                @endforeach

                <br>
                <br>
                <div id="madre">
                @foreach($madres as $madre)
                <input type="text" name="idd_madre" style="display: none;" value="{{$madre->id}}"> 	
                          <div align="center"><h2>DATOS DE LA MADRE</h2></div>
						              <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Nombre Completo de la madre: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" value="{{$madre->nombre_completo}}"  name="nombre_madre"  onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text"  name="id_madre" value="{{$madre->identidad}}"  maxlength="13" minlength="13" onkeypress="return valida(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="telefono_madre" value="{{$madre->celular}}" name="telefono_madre" maxlength="8" minlength="8" onkeypress="return valida(event)"  class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                    @endforeach      
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