<?php $__env->startSection('script-content'); ?>


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

<?php $__env->stopSection(); ?>







<?php $__env->startSection('content'); ?>
			 					



<?php $__currentLoopData = $becarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $becario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perfil del becario</h2>                    
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content">
					

                      <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <?php if($becario->genero==1): ?>
                  <div class="x_title"><img class="imagen-aspirantes " src="<?php echo e(asset('images/estudentM.png')); ?>">
                  <?php else: ?>
                  <div class="x_title"><img class="imagen-aspirantes " src="<?php echo e(asset('images/estudentF.png')); ?>">
                  <?php endif; ?>

                    <div align="center">
                  <h2 class="mt-3"><?php echo e($becario->nombre); ?></h2>
                  </div>
                  
                    <ul class="nav navbar-right panel_toolbox">
                     
                  
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">

                       

                        <li class="active"><a href="#home" data-toggle="tab">Actualizacón de documentos</a>
                        </li>
                        <li><a href="#profile" data-toggle="tab">Información Universitaria</a>
                        </li>
                        
                        <li><a href="#settings" data-toggle="tab">Datos Familiares</a>
                        </li>
                         <li><a href="#beca" data-toggle="tab">Datos Becas 20/20</a>
                        </li>
                        <li><a href="#doc" data-toggle="tab">Expediente</a>
                        </li>
                        <li><a href="#ficha" data-toggle="tab">Ficha 01</a>
                        </li>
                        <li><a href="#iden" data-toggle="tab">Identidad Digitalizada</a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">

                        <div class="tab-pane active" id="home">             
                         <p class="lead">Actualizacion Documentos</p>                            
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Actualizar Periodo </button>
                                 <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                    <th class="alinear" >Periodo</th>
                                    <th>año</th>
                                    <th>Indice Global</th>
                                    <th>Indice del periodo</th>
                                     <th>Observación</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php $__currentLoopData = $actualizacions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actualizacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>                                              
                                                <td class="center">                                                    
                                                   <?php echo e($actualizacion->periodo); ?> 
                                                </td>
                                                <td><?php echo e($actualizacion->anio); ?></td>
                                                <td><?php echo e($actualizacion->globals); ?></td>
                                                <td><?php echo e($actualizacion->periodos); ?></td>
                                                <?php if($actualizacion->globals<65 || $actualizacion->periodos<65 ): ?>
                                                <td style="color: red;">Reprobado</td> 
                                                <?php else: ?>
                                                <td style="color: green;">Aprobado</td> 
                                                <?php endif; ?> 
                                                                                      
                                            </tr>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                                  </tbody>
                                </table>                              
                        </div>

                        <div class="tab-pane" id="profile">
                            <p class="lead">Información Universitaria</p>
                                <div class="col-md-6  ">
                                    <h2>Universidad: </h2><p><?php echo e($becario->universidad); ?></p>
                                    <h2>Campus: </h2><P><?php echo e($becario->campus); ?></P>
                                    <h2>Facultad: </h2><p><?php echo e($becario->facultad); ?></p>
                                    <h2>Carrera: </h2><p><?php echo e($becario->carrera); ?></p>
                                    <h2>Cuenta: </h2> <p><?php echo e($becario->cuenta_universitaria); ?></p>                           
                                  </div>
                        </div>
                        <div class="tab-pane" id="beca">
                            <p class="lead">Información de la Beca</p>
                                <div class="col-md-6  ">
                                    <h2>Tipo de becario: </h2><p><?php echo e($becario->beca); ?></p>
                                    <h2>Cargo: </h2><P><?php echo e($becario->cargo); ?></P>
                                    <h2>otros: </h2><p>otro tipo de informacion</p>                                                         
                                  </div>
                        </div>
                        <div class="tab-pane" id="doc">
                            <p class="lead">Documentos Digitales</p>
                        </div>
                        <div class="tab-pane" id="messages">
                            <p class="lead">Actualizacion Documentos</p>                            
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Actualizar Periodo </button>
                                 <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                    <th class="alinear" >Imagen</th>
                                    <th>Nombre</th>
                                    <th>Periodo</th>
                                    <th>año</th>
                                    <th>Observación</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                            <tr>
                                                <td class="center">                                                    
                                                    <img class="center-imagen" width="50" height="50" src="<?php echo e(asset('img/pdf.png')); ?>">
                                                </td>
                                                <td>forma 03</td>
                                                <td>I Periodo</td>
                                                <td>2018</td>
                                                <td>Aprobado</td>                                        
                                            </tr>
                                  </tbody>
                                </table>                        </div>
                        <div class="tab-pane" id="ficha">
                            <p class="lead">Ficha de Información del Solicitante</p>
                            
                            <div class="container mt-3">                      
                              <h2>  Ficha 01: <img class="center-imagen" width="50" height="50" src="<?php echo e(asset('img/pdf.png')); ?>">
                                año:  2018
                              </h2>                          
                             </div>
                        </div>
                        <div class="tab-pane" id="iden">
                            <p class="lead">Identidad digitalizada</p>                            
                            <div class="container mt-3">                               
                                <h2>Identidad: <img class="center-imagen" width="50" height="50" src="<?php echo e(asset('img/pdf.png')); ?>"><h2>                        
                             </div>
                        </div>
                        <div class="tab-pane" id="settings">
                            <p class="lead">Datos Familiares</p>
                            <div class="padre">
                            Padre
                            <hr>
                                Nombre Completo: <p><?php echo e($becario->nombrePadre); ?></p>
                                Identidad: <p><?php echo e($becario->identidadPadre); ?></p>
                                celular: <p><?php echo e($becario->celularPadre); ?></p> 
                                </div> 
                        <div class="madre">
                            Madre
                            <hr>
                        Nombre Completo: <p><?php echo e($becario->nombreMadre); ?></p>
                        Identidad: <p><?php echo e($becario->identidadMadre); ?></p>
                        celular: <p><?php echo e($becario->celularMadre); ?></p>
                        </div>
                        </div>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                  </div>
                </div>
              </div>

                    

                	
                
                  </div>
                </div>
</div>
</div>




<?php echo Form::open(['route' => ['actualizacion.store'], 'method'=>'POST', 'files'=>true,'data-parsley-validate','class'=>'form-horizontal form-label-left']); ?>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" align="center">
        <h5 class="modal-title" id="exampleModalLabel">Actualización de Documentos</h5>
        <h3><?php echo e($becario->universidad); ?></h3>
     
      </div>
      <div class="modal-body">
            <input type="text" name="id_datos_personales" style="display: none;" value="<?php echo e($becario->id); ?>" class="form-control" style="width: 60px;">
           <div class="form-group">
                            <label for="recipient-name" class="col-form-label" >Seleccione un periodo: 
                            </label>                           
                               <select name="calendario_universidad_id"  class="form-control" required>
                                 <option selected disabled>Seleccione un periodo</option>
                                <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <option value="<?php echo e($periodo->id); ?>"><?php echo e($periodo->periodo); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                  
                              </select>                           
            </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Indice Global:</label>
            <input onkeypress="return valida(event)" maxlength="2" type="text" name="promedio_global" class="form-control" style="width: 60px;" required>
          </div>
          <div class="form-group" >
            <label for="message-text" class="col-form-label">Indice del periodo:</label>
            <input onkeypress="return valida(event)" maxlength="2" type="text" name="promedio_periodo" class="form-control " style="width: 60px;" required>
          </div>
        </form>
      </div>
      <div  class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         <?php echo Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnEmpty' ]); ?>  
      </div>
    </div>
  </div>
</div>

       
            <?php echo e(Form::close()); ?>


 
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>


    <script type="text/javascript" src="<?php echo e(asset('template/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')); ?>"></script>
    <!-- bootstrap-wysiwyg -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/jquery.hotkeys/jquery.hotkeys.js')); ?>"></script> 
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/google-code-prettify/src/prettify.js')); ?>"></script>    
    <!-- jQuery Tags Input -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/jquery.tagsinput/src/jquery.tagsinput.js')); ?>"></script>
    <!-- Switchery -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/switchery/dist/switchery.min.js')); ?>"></script>
    <!-- Select2 -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/select2/dist/js/select2.full.min.js')); ?>"></script>
    <!-- Parsley -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/parsleyjs/dist/parsley.js')); ?>"></script>
    <!-- Autosize -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/autosize/dist/autosize.min.js')); ?>"></script>   
    <!-- jQuery autocomplete -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')); ?>"></script>
    <!-- starrr -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/starrr/dist/starrr.js')); ?>"></script> 



 <!-- Datatables -->
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net/js/jquery.dataTables.min.js')); ?>"></script>  
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/net-buttons/js/buttons.print.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/jszip/dist/jszip.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('template/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('sidebar.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>