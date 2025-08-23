



<?php $__env->startSection('meta_title'); ?>

    <title><?php echo e($page_seo['meta_title']); ?></title>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('meta_desc'); ?>

    <meta name="description" content="<?php echo e($page_seo['meta_desc']); ?>">

<?php $__env->stopSection(); ?>



<?php $__env->startSection('meta_key'); ?>

    <meta name="keywords" content="<?php echo e($page_seo['meta_key']); ?>">

<?php $__env->stopSection(); ?>







<?php $__env->startSection('content'); ?>
  <div class="inner-bannr-sec">
  
  
  <img src="assets/img/banner/profile-banner.jpg" alt="" width="100%">
  </div>
  
  
  <div class="ibm-bcrms-main">
	<div class="ibm-bcrms">
 <div class="container">

   <h3>My Account</h3>
  </div>
</div>
</div>
  <section class="Myaccountsec">
  <div class="container">
    <div class="row">
      
 
      <?php echo $__env->make('profile-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  
    
    <!-- Main Content -->
<div class="col-lg-9 col-md-8">
  <div id="General" class="tabcontent profile">
    <div class="Address">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">

            <div class="Dasdd-board">
              
              <h5>Hello <?php echo e(auth()->user()->name ?? 'User Name'); ?></h5>

                <table class="table table-bordered">

                  <tr>
                  <th>Purchased On</th>  
                  <th>Course</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Status</th>
                  </tr>


                  <?php if(!$courses->isEmpty()): ?>

                  <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                  <tr>

                  <td><?php echo e(date('d-M-Y',strtotime($course->created_at))); ?></td>

                  <td><?php echo e($course->title); ?></td>

                  <td><?php echo e(date('d-M-Y',strtotime($course->access_start))); ?></td>

                  <td><?php echo e(date('d-M-Y',strtotime($course->access_end))); ?></td>

                  <td><?php echo e($course->status == 'blocked' ? 'Pending' : 'Active'); ?></td>

                  </tr>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                  <?php else: ?>

                  <tr>

                  <td colspan="5">No Courses Purchased</td>

                  </tr>

                  <?php endif; ?>

                </table>


            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>



    </div>
  </div>
</section>
     
  
     <?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.apps', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/my-account.blade.php ENDPATH**/ ?>