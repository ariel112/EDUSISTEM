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

      <!-- page content -->
        <div class="right_col" role="main">
        
         
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Creacion de las planillas Complementarias</h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="fondo-beca" >
                    <br/>


                    
                
 			 <?php echo Form::open(['route' => 'Cnombre.store', 'method'=>'POST', 'files'=>true, 'id'=>'formAspi','data-parsley-validate','class'=>'form-horizontal form-label-left']); ?>

  		
 					   <div align="center"><h2>Nombre de la complementaria </h2> </div>	
            <input type="text" name="users_id" style="display: none;" value="<?php echo e(Auth::user()->id); ?>" class="form-control" style="width: 60px;">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre Complementaria:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input style="float: left!important;" type="text"   name="nombre"   required="required" class="form-control col-md-7 col-xs-12">                              
                            </div>
                          </div>               
        
                        <div align="center">
                        	<?php echo Form::submit('Registrar',['class'=>'btn btn-success','id'=>'btnEmpty' ]); ?>

                         
                        </div>   
              		
                           
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