@extends('sidebar.sidebar')

@section('content')

  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Formulario de aspirantes</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Formularios aspirantes </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li> 
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <!-- Smart Wizard -->
                    <p>Por favor llene toda la informacion solicitada.</p>
                    <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps">
                        <li>
                          <a href="#step-1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Paso 1<br />
                                              <small>Paso 1 INFORMACION DEL(LA) ESTUDIANTE</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Paso 2<br />
                                              <small>Paso 2 CENTRO UNIVERSITARIO</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Paso 3<br />
                                              <small>Paso 3 PERSONAS DEPENDIENTES</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a href="#step-4">
                            <span class="step_no">4</span>
                            <span class="step_descr">
                                              Paso 4<br />
                                              <small>Paso 4 DATOS FAMILIARES</small>
                                          </span>
                          </a>
                        </li>
                      </ul>
                      <div id="step-1">
                        <!-- <form data-parsley-validate class="form-horizontal form-label-left"> -->
						{!! Form::open(['route' => 'aspirantes.store', 'method'=>'POST', 'files'=>true, 'id'=>'formEmpty','class'=>'form-horizontal form-label-left']) !!}			
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Numero de identidad: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Fecha de Nacimiento<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="date" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Departamento<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="heard" class="form-control"">
			                      <option selected>Seleccion el departamento:</option>
			                      <option value="1">One</option>
			                      <option value="2">Two</option>
			                      <option value="3">Three</option>
			                    </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Municipio<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <select id="heard" class="form-control">
			                      <option selected>Seleccione el Municipio:</option>
			                      <option value="1">One</option>
			                      <option value="2">Two</option>
			                      <option value="3">Three</option>
			                    </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Ciudad<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Seleccione un genero:</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">                                                         
		                        <select name="genero" id="heard" class="form-control"required>
		                          <option selected disabled >Seleccion el genero:</option>
		                          <option value="1">Masculino</option>
		                          <option value="2">Femenino</option>
		                        </select> 
                            </div>
                          </div>

                       

                      </div>






                      <div id="step-2">
                        
                        <div class="form-horizontal form-label-left">
                        <h2 class="StepTitle">Centro Universitario</h2>  
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Campus<span class="required">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Carrera:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            	<input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Cuenta Universitaria<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Indice del Periodo:<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-3 col-xs-3">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Indice Global<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-3 col-xs-3">
                            </div>
                          </div>
                       
						</div>	
                      </div>





                      <div id="step-3">
                       
                         <div class="form-horizontal form-label-left">
                      
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. Identidad:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Perentesco:<span class="required">*</span>
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
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefono:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						</div>

                      </div>







                      <div id="step-4">
                        
                        <div class="form-horizontal form-label-left">
                      
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo del padre: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						</div>


						<div class="form-horizontal form-label-left">
                      
                         <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Completo de la madre: 
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No. Identidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                             	  <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                        
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Telefono:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
						</div>
								
						

                      </div>

                    </div>
                    <!-- End SmartWizard Content -->

        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
{!! Form::close()!!}    
        





@endsection




@section('script')
	<!-- jQuery Smart Wizard -->
    <script src="{{asset('template/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>


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