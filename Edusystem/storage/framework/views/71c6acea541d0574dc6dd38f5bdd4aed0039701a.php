<?php $__env->startSection('link'); ?>
 



<?php $__env->stopSection(); ?>    
<?php $__env->startSection("content"); ?>
<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Becas Creadas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>


                  <div class="x_content" >
                
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>                       
                        <th>Nombre</th>
                        <th>Monto</th>
                        <th>Descripcion</th>                      
                        <th class="alinear"> Editar</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php $__currentLoopData = $becas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                <tr>                                    
                                    <td><?php echo e($beca->nombre); ?></td>
                                    <td><?php echo e($beca->monto); ?></td>
                                    <td><?php echo e($beca->descripcion); ?></td>                                    
                                    <td class="alinear">
                                        <a href="<?php echo e(route('becas.edit',$beca->id)); ?>"><img class="center-imagen" src="<?php echo e(asset('images/edit.png')); ?>"></a>
                                    </td>                       
                                </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

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