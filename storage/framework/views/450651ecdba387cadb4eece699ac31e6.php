



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

   <h3> Course Videos</h3>
  </div>
</div>
</div>
  <section class="Myaccountsec">
  <div class="container">
    <div class="row">
      
      <?php echo $__env->make('profile-sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  
    
    <div class="col-lg-9 col-md-8">
     <div id="General" class="tabcontent profile">
          <div class="Address">
          
		  
		  
		  
		      <div class="woocommerce-cart-form">
      <table class="cart_table mb-10">
        <thead>
          <tr>
            <th class="cart-col-image">No</th>
            <th class="cart-col-productname">Title</th>
			 <th class="cart-col-price">Video</th>
			
           
         
           
            
          </tr>
        </thead>
        <tbody>


        <?php $i=1; ?>

        <?php if(!$courses->isEmpty()): ?>


        <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        

         <tr class="cart_item">

         <td></td>
			   <td ><b><?php echo e($course->title); ?></b></td>

         <td ><?php echo e(date('d-M-Y',strtotime($course->access_start))); ?> to <?php echo e(date('d-M-Y',strtotime($course->access_end))); ?></td>
         
        </tr>

        <?php $__currentLoopData = $course->videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <tr class="cart_item">
            <td><?php echo e($i); ?></td>
            <td><div class="pp-pdf"><?php echo e($video->c_title ?? 'Untitled'); ?></div></td>
			 
			  <td>
			
			<div class="download-video">
      
       <?php echo $video->iframe; ?>

      
      <?php /*
      <div class="d-video-hover">
      <a href="{{ route('course.video.stream', [$course->id, $video['url']]) }}" class="play-btn style3 popup-video" tabindex="-1"><i class="fas fa-play"></i></a></div>
      
      */ ?>

      </div>


			</td>
            
          </tr>

          <?php $i++ ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <?php else: ?>


          <tr class="cart_item">

          <td class="text-center" colspan="3" align="center">No Courses Currently Available</td>

          </tr>


          <?php endif; ?>

        
        </tbody>
      </table>
    </div>
          </div>
          
          
         
        </div>

        
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
     
  
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.apps', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/course-videos.blade.php ENDPATH**/ ?>