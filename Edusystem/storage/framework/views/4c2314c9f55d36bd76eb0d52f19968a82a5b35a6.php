<?php $__env->startSection('content'); ?>

   <!-- page content -->
        <div class="right_col" role="main">
        
         
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PAGOS CONVENIOS CORRESPONDIENTES A UNIVERSIDADES <i class="fa fa-university"></i></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="fondo-beca" >
                    <br/>                    
                
 			      
   
                
                  <div class="x_content">

                    <table class="table table-bordered tablas">
                      <thead class="color-tablas">
                        <tr>
                          <th>UNIVERSIDAD</th>
                          <th>ABREVIATURA</th>
                          <th>ENERO</th>
                          <th>FEBRERO</th>
                          <th>MARZO</th>
                          <th>ABRIL</th>
                          <th>MAYO</th>
                          <th>JUNIO</th>
                          <th>JULIO</th>
                          <th>AGOSTO</th>
                          <th>SEPTIEMBRE</th>
                          <th>OCTUBRE</th>
                          <th>NOVIEMBRE</th>
                          <th>DICIEMBRE</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
  
  <?php $__currentLoopData = $general; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gene): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td><?php echo e($gene->universidad); ?></td>
                          <td><?php echo e($gene->abreviatura); ?></td>
                          <td><?php echo e($gene->enero); ?></td>
                          <td><?php echo e($gene->febrero); ?></td>
                          <td><?php echo e($gene->marzo); ?></td>
                          <td><?php echo e($gene->abril); ?></td>
                          <td><?php echo e($gene->mayo); ?></td>
                          <td><?php echo e($gene->junio); ?></td>
                          <td><?php echo e($gene->julio); ?></td>
                          <td><?php echo e($gene->agosto); ?></td>
                          <td><?php echo e($gene->septiembre); ?></td>                          
                          <td><?php echo e($gene->octubre); ?></td>
                          <td><?php echo e($gene->noviembre); ?></td>
                          <td><?php echo e($gene->diciembre); ?></td> 
                        </tr>
             
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                 </table>
                  </div>
					

                  </div>
                </div>
              </div>
            </div>
         
        </div>

   <?php echo e(Form::close()); ?>

        <!-- /page content -->
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