



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
  
  
  <img src="<?php echo e(asset('assets/img/banner/course-banner.jpg')); ?>" alt="" width="100%">
  </div>
     
 <div class="Coursemsec">
	  <div class="container ">
	  	 	  	 <div class="title-area mb-50 text-center">
                            
                            <h2 class="sec-title  ">	Courses</h2>
							
							<p>Empower Your Future. Your Journey to Excellence Begins Here. </p>
                        </div>
	  </div>
	 <div class="container-fluid ">
	 
	


     <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  <div class="row my-3">
	   <div class="col-lg-6 d-flex coo-1">
	 <div class="cou-left">
	 
	 <img src="<?php echo e(asset('uploads/course/')); ?>/<?php echo e($val->image); ?>" alt="" width="100%">
	 </div>
	  </div>
	 	 <div class="col-lg-6 d-flex coo-2">
	 <div class="cou-right">
	 	   

                        <?php if($val->expiring_soon==1): ?>
          				<div class="blink-me ending-soon">Ending Soon</div>
		  				<?php endif; ?>

					
                        <h2  >	<?php echo e($val->title); ?></h2>
                       
						
						<h3><?php echo e($val->duration); ?> Days Validity</h3>
						
					<?php echo $val->description; ?>

	 
	 			<div class="tour-listing__card-inner-content">
							<div class="ttpricesec">
							
							<p>7 Days course Fees</p>
						
    						<h4 class="tour-listing__card-price"> <?php echo e(!empty($val->fees) ? $val->fees : 'Free'); ?></h4>

								</div>
                                    <div class="tour-listing__card-review-box">
									<a  href="<?php echo e(url('course-detail', $val->slug)); ?>">Buy Now</a>
                                       
                                       
                                    </div><!-- /.tour-listing__card-review-box -->
                              
                                  
                                
                                </div>
	 
	 </div>
	 
	 </div>
	 
	  </div>

     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
	 
	
	 
	 </div>
	 
	 
	 </div>



      <?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.apps', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/courses.blade.php ENDPATH**/ ?>