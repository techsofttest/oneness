

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Contact</h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<style>
    a.brand-link img {
    display: none;
}
</style>

<div class="row">

          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Contact</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Whatsapp</th>
                    <th>Actions</th>
                  </tr>
                  </thead>


                  <tbody>

                  <?php ($i=0); ?>

                  <?php $__currentLoopData = $contact; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $con): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <tr>
                    <td><?php echo e(++$i); ?></td>
                    <td><?php echo $con->address; ?></td>
                    <td><?php echo e($con->phone); ?></td>
                    <td><?php echo e($con->email); ?></td>
                    <td><?php echo e($con->whatsapp); ?></td>

                    <td> <a class="btn btn-primary d-inline-block" href="<?php echo e(route('contact.edit',$con->id)); ?>"><i class="fas fa-pencil-alt"></i></a></td>
                  </tr>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  </tbody>


                 
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    
<?php $__env->stopSection(); ?>

      

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/admin/contact/index.blade.php ENDPATH**/ ?>