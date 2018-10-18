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
                  <div >
                    <br/>









		            
                    
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
 					
 					   <div align="center"><h2>INFORMACIÓN DEL(LA) ESTUDIANTE</h2></div>	
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return valida(event)" maxlength="13" minlength="13" >
                            </div>
                      </div>

                       <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required"  onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de Nacimiento:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Departamento:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                        <select name="genero" id="heard" class="form-control" required>
		                          <option selected disabled >Seleccione un departamento </option>
		                          <option value="1">Municipio</option>
		                          <option value="2">municipio</option>
		                        </select> 
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Municipio:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                        <select name="genero" id="heard" class="form-control" required>
		                          <option selected disabled >Seleccione un municipio </option>
		                          <option value="1">Municipio</option>
		                          <option value="2">municipio</option>
		                        </select> 
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ciudad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" onkeypress="return soloLetras(event)">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Genero:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                        <select name="genero" id="heard" class="form-control" required>
		                          <option selected disabled >Seleccion el genero:</option>
		                          <option value="1">Masculino</option>
		                          <option value="2">Femenino</option>
		                        </select> 
                            </div>
                          </div>


                          <br>
                          <br>
                          <div align="center"><h2>CENTRO UNIVERSITARIO</h2></div>

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
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Universidad:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="heard" class="form-control">
		                      <option selected>Seleccion la universidad</option>
		                      <option value="1">UNIVERSIDAD NACIONAL AUTONOMA DE HONDURAS (UNAH)</option>
		                      <option value="2">UNIVERSIDAD METROPOLITANA DE HONDURAS (UMH)</option>
		                      <option value="3">UNIVERSIDAD CRISTIANA DE HONDURAS (UCRISH)</option>
		                      <option value="3">UNIVERSIDAD TECNOLOGICA (UNITEC) (CEUTEC)</option>
		                      <option value="3">UNIVERSIDAD NACIONAL DE AGRICULTURA (UNAG) </option>
		                      <option value="3">UNIVERSIDAD POLITECNICA DE HONDURAS (POLITECNICA) </option>
		                      <option value="3">UNIVERSIDAD TECNOLOGICA DE HONDURAS (UTH) </option>
		                      <option value="3">UNIVERSIDAD CRISTIANA EVANGELICA NUEVO MILENIO (UCENM) </option>
		                      <option value="3">CENTRO DE DISEÑO, ARQUITECTURA Y CONSTRUCCIÓN (CEDAC)</option>
		                      <option value="3">UNIVERSIDAD CATÓLICA DE HONDURAS (UNICAH) </option>
		                      <option value="3">UNIVERSIDAD JESÚS DE NAZARETH (UJN) </option>
		                      <option value="3">UNIVERSIDAD DE SAN PEDRO SULA (USAP) </option>
		                      <option value="3">UNIVERSIDAD PEDAGÓGICA NACIONAL FRANCISCO MORAZÁN (UPNFM) </option>
		                    </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Campus
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select  id="heard" class="form-control">
			                      <option selected>Seleccion el campus:</option>
			                      <option value="1">One</option>
			                      <option value="2">Two</option>
			                      <option value="3">Three</option>
			                    </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Carrera:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cuenta Universitaria:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" onkeypress="return soloLetras(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Indice del Periodo:
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                              <input type="text" id="last-name" name="last-name" required="required" onkeypress="return valida(event)" class="form-control col-md-3 col-xs-3">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Indice Global:
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                              <input type="text" id="last-name" name="last-name" required="required" onkeypress="return valida(event)" class="form-control col-md-3 col-xs-3">
                            </div>
                          </div>
						
						 <br>
                          <br>
                          <div align="center"><h2>PERSONA DEPENDIENTE</h2></div>
						 
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="last-name" name="last-name" onkeypress="return soloLetras(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text" id="last-name" name="last-name" maxlength="13" minlength="13" onkeypress="return valida(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Perentesco:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<select id="heard" class="form-control">
			                      <option selected disabled>Seleccion el parentesco</option>
			                      <option value="1">Amigo(a)</option>
			                      <option value="2">Padre</option>
			                      <option value="3">Tio(a)</option>
			                      <option value="3">Primo(a)</option>
			                      <option value="3">Veciono(a)</option>
			                      <option value="3">Esposo(a) </option>
			                      <option value="3">Abuelo(a) </option>
			                      <option value="3">Suegro(a) </option>
			                      <option value="3">Padrino/Madrina</option>
			                      <option value="3">Hermano(a)</option>
			                      <option value="3">Compañero de trabajo</option>
			                      <option value="3">Cuñado(a)</option>
			                      <option value="3">Hijo(a)</option>
			                      <option value="3">Hijastro(a)</option>
			                      <option value="3">Sobrino(a)</option>
			                      <option value="3">Nieto(a)</option>
			                      <option value="3">Nuero/Yerno</option>
			                      <option value="3">Compadre/Comadre</option>
			                      <option value="3">Madre</option>
			                    </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" maxlength="8" minlength="8" onkeypress="return valida(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
	
						 <br>
						 <br>
						 <div align="center"><h2>DATOS DEL PADRE</h2></div>
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo del padre: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="last-name" name="last-name" required="required" onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text" id="last-name" name="last-name" maxlength="13" minlength="13" onkeypress="return valida(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" maxlength="8" minlength="8" onkeypress="return valida(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
								<br>
								<br>	
                          <div align="center"><h2>DATOS DE LA MADRE</h2></div>
						  <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo de la madre: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="last-name" name="last-name" required="required" onkeypress="return soloLetras(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text" id="last-name" name="last-name" required="required" maxlength="13" minlength="13" onkeypress="return valida(event)" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" maxlength="8" minlength="8" onkeypress="return valida(event)" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
 						
















							
						
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>














                  </div>
                </div>
              </div>
            </div>

      
            

         
        </div>
        <!-- /page content -->




@endsection




@section('script')
	

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