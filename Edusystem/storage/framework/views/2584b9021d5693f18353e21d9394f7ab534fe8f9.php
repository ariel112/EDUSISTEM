<?php $__env->startSection('content'); ?>

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
                
 			 <?php echo Form::open(['route' => 'calendario.store', 'method'=>'POST', 'files'=>true, 'id'=>'formAspi','data-parsley-validate','class'=>'form-horizontal form-label-left']); ?>


                          <div align="center"><h2>CENTRO UNIVERSITARIO</h2></div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Universidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select id="universidad" name="universidad_id" class="form-control" required>
    		                      <option selected disabled>Seleccion la universidad</option>
                                  <?php $__currentLoopData = $universidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $universidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($universidad->id); ?>"><?php echo e($universidad->nombre); ?></option>                             
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    		                      </select>
                            </div>
                          </div>                       
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Seleccione el periodo
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                            <select  id="periodo" name="periodo" class="form-control" required>
			                      <option selected disabled>Seleccion un periodo</option>
                            </select>
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="last-name">Descripción del periodo:
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                              <input type="text" name="descripcion" required="required" class="form-control col-md-3 col-xs-3">
                            </div>
                          </div>
                           <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-3" for="last-name">Selecione fecha de inicio:
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                              <input type="date" name="inicio" required="required" class="form-control col-md-3 col-xs-3">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Selecione fecha final:
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                              <input type="date" id="last-name" name="final" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                            <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Solicitud del convenio:
                            </label>
                            <div class="col-md-2 col-sm-2 col-xs-2">
                              <input type="date"  name="solicitud_convenio" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>                          
                          </div>
							
						          <div align="center">
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">                      
                             <button class="btn btn-primary" type="reset">Limpiar Formulario</button>
                               <?php echo Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnEmpty' ]); ?>                           
                          </div>
                        </div>    
                      </div>
                    <?php echo e(Form::close()); ?>

                  </div>
                </div>
              </div>
            </div>
             
        </div>
        <!-- /page content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <!--Este script es para las peticiones con ajax -->
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('sidebar.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>