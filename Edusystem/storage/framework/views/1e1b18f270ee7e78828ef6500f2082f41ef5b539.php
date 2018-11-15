<?php $__env->startSection('link'); ?>
 

 <link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>    
<?php $__env->startSection("content"); ?>
<div class="right_col" role="main">

<?php echo Form::open(['route' => 'pre_planilla.store', 'method'=>'POST', 'files'=>true, 'id'=>'formAspi','data-parsley-validate','class'=>'form-horizontal form-label-left']); ?>


 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Pre Planilla</h2> 
                    <div align="center" class="
                     container">                           
                            <div class="col-md-3 col-sm-3 col-xs-3">
                              <?php if($nuevo=='NO'): ?>
                              Seleccione la fecha: <input id="mesPrePlanilla"  name="fechaPrePlanilla" class="form-control"  type="date" required >
                              <?php else: ?> 
                              Seleccione la fecha: <input id="mesPrePlanilla" name="fechaPrePlanilla" class="form-control" value="<?php echo e($date); ?>" type="date" required>
                              <?php endif; ?>                             
                            </div>
                            <br>
                    </div>
   <?php echo Form::submit('Generar ',['class'=>'btn btn-success','id'=>'btnEmpty' ]); ?>

      <?php if($nuevo=='NO'): ?>
      <?php else: ?>      
<<<<<<< HEAD:Edusystem/resources/views/pre_planillas/index.blade.php
      <a href="<?php echo e(url("preplanilla/descarga/$date")); ?>" class="btn btn-success">Descargar excel</a>
=======
      <a href="<?php echo e(url("decargar/$date/preplanilla")); ?>" class="btn btn-success">Descargar excel</a>
>>>>>>> 037ff3e0173f25a3fe9d014ec860b33c6bbdae2c:EDUSISTEM/resources/views/pre_planillas/index.blade.php
      <?php endif; ?>     
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">                
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th class="alinear" >Imagen</th>
                        <th>Identidad</th>
                        <th>Nombre</th>
                        <th>Celular</th>
                        <th>Abreviatura</th>
                        <th>Departamento</th>
                        <th>Mes</th>
                        </tr>
                      </thead>
                      <tbody >
                      <?php if($nuevo=='NO'): ?>
                       <?php else: ?>  
                         <?php $__currentLoopData = $nuevo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $becario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                           <?php if($becario->genero==1): ?>
                                    <td class="center">
                                        <a href="<?php echo e(route('aspirantes.perfil', $becario->id_datos_personales)); ?>">
                                            <img class="center-imagen" width="50" height="50" src="<?php echo e(asset('images/estudentM.png')); ?>">
                                        </a>    
                                    </td>
                                    <?php else: ?>
                                    <td class="center">
                                        <a href="<?php echo e(route('aspirantes.perfil',$becario->id_datos_personales)); ?>">
                                            <img class="center-imagen" width="50" height="50" src="<?php echo e(asset('images/estudentF.png')); ?>">
                                        </a>    
                                    </td>
                                    <?php endif; ?>
                           <td><?php echo e($becario->identidad); ?></td>
                           <td><?php echo e($becario->nombre); ?></td>
                           <td><?php echo e($becario->celular); ?></td>
                           <td><?php echo e($becario->abreviatura); ?></td>
                           <td><?php echo e($becario->departamento); ?></td>
                           <td><?php echo e($mesP); ?></td>
                         </tr> 
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                        <?php endif; ?> 

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

   
    <!--Este script es para las peticiones con ajax -->
    <script src="<?php echo e(asset('js/script.js')); ?>"></script> 

 <!-- Datatables -->
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net/js/jquery.dataTables.js')); ?>"></script>  
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-buttons/js/buttons.flash.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-buttons/js/buttons.html5.min.js')); ?>"></script>

<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/jszip/dist/jszip.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/pdfmake/build/pdfmake.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('template/vendors/pdfmake/build/vfs_fonts.js')); ?>"></script>

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