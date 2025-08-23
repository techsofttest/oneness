 <div class="col-lg-3 col-md-4">
  <div class="mainlinkall">
    <div>
      <div class="proimageemp">
        <img src="<?php echo e(asset('assets/img/user.jpg')); ?>">
      </div>
      <p><?php echo e(auth()->user()->name ?? 'User Name'); ?></p>
    </div>

    <ul class="tab">
      <li><a class="tablinks <?php echo e(Request::is('my-account') ? 'active' : ''); ?>" href="<?php echo e(url('/my-account')); ?>"><i class="fa fa-cog"></i> Dashboard</a></li>
      <li><a class="tablinks <?php echo e(Request::is('course-videos') ? 'active' : ''); ?>" href="<?php echo e(url('course-videos')); ?>"><i class="fa fa-video"></i> Course Videos</a></li>
      <li><a class="tablinks <?php echo e(Request::is('change-password') ? 'active' : ''); ?>" href="<?php echo e(url('/change-password')); ?>"><i class="fa fa-key"></i> Change Password</a></li>
      <li><a class="tablinks" href="<?php echo e(url('/')); ?>"><i class="fa fa-file"></i> Logout</a></li>
    </ul>

  </div>
</div><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/profile-sidebar.blade.php ENDPATH**/ ?>