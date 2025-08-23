

 <?php $__env->startSection('meta_title'); ?>
    <title><?php echo e($page_seo->meta_title); ?></title>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('meta_desc'); ?>

    <meta name="description" content="<?php echo e($page_seo->meta_desc); ?> ">
    
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('meta_key'); ?>


<meta name="keywords" content="<?php echo e($page_seo->meta_key); ?> ">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="inner-bannr-sec">
  
  
  <img src="<?php echo e(asset('assets/img/banner/about-banner.jpg')); ?>" alt="" width="100%">
  </div>
     
 <div class="inner-pagesabout-sec">
 <div class="container">
	 <div class="row align-items-center">
	  <div class="col-lg-6">
	 <div class="agg-right">
	 
	 <img src="<?php echo e(asset('uploads/pages/')); ?>/<?php echo e($home_about->image); ?>" alt="" width="100%">
	   
	  <div class="agtag"><span class="counter-number">10</span>+ years Experience</div>
	 </div>
	  </div>
	 <div class="col-lg-6">
	 <div class="adu-left">
	 	  	 <div class="title-area mb-15 ">
                            
                            <h2 class="sec-title  ">		<?php echo e($home_about->cms_title); ?></h2>
                        </div>
						
					<?php echo $home_about->content; ?>

						 
						
						
	 
	 </div>
	 
	 </div>
	 
	 
	 </div>
	 
	 </div>
    </div>
	<div class="sechedulesec">
		<div class="container">
		<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12"  data-aos="zoom-in" data-aos-duration="800">
		 <div class="ccosec">
		<div class="title-area mb-0 text-center">
                 
                    <h2 class="sec-title"> Contact    us with  today! </h2>
				 
					<h3>Call Us: <a href="tel:<?php echo e($contact->phone); ?>"><?php echo e($contact->phone); ?></a> | Email Us: <a href="mailto:<?php echo e($contact->email); ?>"><?php echo e($contact->email); ?></a></h3>
                </div>
		 </div>
		</div>
		</div>
		</div>
		
		</div>
		
	
	<div class="inner-onenss-clinic"  data-bg-src="<?php echo e(asset('assets/img/pattern__logo.webp')); ?>">
	
	
	<div class="container">
	
	<div class="row  align-items-center">
	  <div class="col-lg-6">
	 
	 <div class="obb-right">
<div class="title-area mb-20  ">
                            
                            <h2 class="sec-title"><?php echo e($home_content->cms_title); ?></h2>
							<h3>Natural Solutions for your good health</h3>		
                        </div>
				
<?php echo $home_content->content; ?>

	 </div>
	 </div>
	 <div class="col-lg-6">
	 
	 <div class="occ-left">
	 	 <div class="occMsgBox">
	
	 	 
                            <div class="Name"> Dr.Nanditha Sabu BHMS, DAsc</div>
                          
                        </div>
	  <div class="occ-left-ii">
	 <img src="<?php echo e(asset('uploads/pages/')); ?>/<?php echo e($home_content->image); ?>" alt="" width="100%">
	  <div class="obbtag"><span class="counter-number">15</span>+ years Experience</div>
</div>

	 </div>
	 </div>
	 	
	 
	 

	 </div>
	
	
	
	</div>
	</div>
	
		 
	 <div class="New-featuresec">
	 
	 <div class="container">
	 
	 <div class="row justify-content-between">
	 
	 <div class="col-lg-4 col-md-4 d-flex">
	 
	 <div class="new-ffsec">
	 
	 <img src="<?php echo e(asset('uploads/pages/')); ?>/<?php echo e($home_content9->image); ?>" alt="">
	  <div class="new-ffsec-sub">
	 <h3> <?php echo e($home_content9->cms_title); ?></h3>
	 
	<?php echo $home_content9->content; ?>

	 </div>
	  </div>
	 </div>
	  <div class="col-lg-4 col-md-4 d-flex">
	 
	 <div class="new-ffsec">
	 
	 <img src="<?php echo e(asset('uploads/pages/')); ?>/<?php echo e($home_content10->image); ?>" alt="">
	  <div class="new-ffsec-sub">
	 <h3> <?php echo e($home_content10->cms_title); ?></h3>
	 
		<?php echo $home_content10->content; ?>

	 </div>
	  </div>
	 </div>
	  <div class="col-lg-4 col-md-4 d-flex">
	 
	 <div class="new-ffsec">
	 
	 <img src="<?php echo e(asset('uploads/pages/')); ?>/<?php echo e($home_content11->image); ?>" alt="">
	  <div class="new-ffsec-sub">
	    <h3><?php echo e($home_content11->cms_title); ?></h3>
	 	<?php echo $home_content11->content; ?>

	 </div>
	  </div>
	 </div>
	 
	 
	 </div>
	 
	 </div>
	 
	 </div>
	 



 <?php $__env->stopSection(); ?>
<?php echo $__env->make('partials.apps', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/about.blade.php ENDPATH**/ ?>