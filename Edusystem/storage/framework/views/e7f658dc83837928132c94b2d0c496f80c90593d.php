<?php $__env->startSection("content"); ?>


<div class="right_col" role="main">

 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Perfil Universidad</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                
                  	<div align="center">
                  		<h2><?php echo e($universidad->nombre); ?></h2>
                 		<h4><?php echo e($universidad->abreviatura); ?></h4>
                 		<img class="center-imagen" width="100" height="100" src="/logo-universidades/<?php echo e($universidad->url_imagen); ?>">
                  	</div>
				<br>
				<br>
               <div  class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Convenios <small><?php echo e($universidad->abreviatura); ?> </small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>Periodo</th>
                          <th>Observación</th>
                          <th>Inicio</th>
                          <th>Final</th>
                          <th>Solicitud Convenio</th>
                          <th>Acción</th>
                        </tr>
                      </thead>
                      <tbody>
					<?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <th scope="row"><?php echo e($periodo->periodo); ?></th>
                          <td><?php echo e($periodo->observacion); ?></td>
                          <td><?php echo e($periodo->inicio); ?></td>
                          <td><?php echo e($periodo->final); ?></td>
                          <td><?php echo e($periodo->solicitud); ?></td>
                       	  <th><a href="<?php echo e(route('calendario.edit',$periodo->id)); ?>"><button type="button" class="btn btn-round btn-warning">Editar</button></a></th>		
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

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('sidebar.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>