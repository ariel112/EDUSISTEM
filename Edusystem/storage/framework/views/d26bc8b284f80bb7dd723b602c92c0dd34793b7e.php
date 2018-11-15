<?php $__env->startSection('link'); ?>
 



<?php $__env->stopSection(); ?>    
<?php $__env->startSection("content"); ?>
<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Estatus en el sistema de los becarios</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                        <th class="alinear" >Imagen</th>
                        <th>Nombre</th>
                        <th>Identidad</th>
                        <th>Estado</th>
                        <th>Fecha del estado</th>
                        <TH>Observación</TH>                      
                        
                        </tr>
                      </thead>


                      <tbody>
                         <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if($dato->genero==1): ?>
                                    <td class="center">
                                        <a href="<?php echo e(route('estatus.perfil', $dato->id)); ?>">
                                            <img class="center-imagen" width="50" height="50" src="<?php echo e(asset('images/estudentM.png')); ?>">
                                        </a>    
                                    </td>
                                    <?php else: ?>
                                    <td class="center">
                                        <a href="<?php echo e(route('estatus.perfil',$dato->id)); ?>">
                                            <img class="center-imagen" width="50" height="50" src="<?php echo e(asset('images/estudentF.png')); ?>">
                                        </a>    
                                    </td>
                                    <?php endif; ?>
                                    <td><?php echo e($dato->nombre); ?></td>
                                    <td><?php echo e($dato->identidad); ?></td>
                                    <td><?php echo e($dato->estado); ?></td>
                                    <td><?php echo e($dato->fecha); ?></td>
                                    <?php if($dato->practica==null): ?>
                                    <td> </td>
                                    <?php else: ?>
                                    <td> 
                                        <p class="color-negro"><?php echo e($dato->practica); ?></p> 
                                        <p class="estilo-verde" ><i class="fa fa-star"></i> Inicio:<?php echo e($dato->practica_inicio); ?></p>
                                        <p class="estilo-anaranjado"><i class="fa fa-star-o"></i> Fin:<?php echo e($dato->practica_fin); ?></p>  
                                    </td>
                                    <?php endif; ?>
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