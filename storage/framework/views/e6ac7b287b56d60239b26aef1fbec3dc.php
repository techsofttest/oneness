

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content_header'); ?>
    <h1>Manage Users</h1>
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
        <h3 class="card-title">User List</h3>
      </div>

      <div class="card-body">
        <?php if(session('success')): ?>
            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

       <table id="datatable" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Sl No</th>
      <th>Name</th>
      <th>Email</th>
      <th>Status</th>
      <th>Actions</th> 
    </tr>
  </thead>

  <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr>
      <td><?php echo e($loop->iteration); ?></td>
      <td><?php echo e($user->name); ?></td>
      <td><?php echo e($user->email); ?></td>

      <td>
      <?php if($user->status == 'active'): ?>
          <a href="<?php echo e(url('admin/users/update-status/'.$user->id.'')); ?>" onclick="return confirm('Update user status?')" class="btn btn-success">Active</a>
      <?php elseif($user->status == 'inactive'): ?>
          <a href="<?php echo e(url('admin/users/update-status/'.$user->id.'')); ?>" onclick="return confirm('Update user status?')" class="btn btn-danger">Inactive</a>
      <?php endif; ?>
      </td>


      <td>
      <a onclick="return confirm('Reset user device?')" class="btn btn-warning" href="<?php echo e(url('admin/users/reset-device/'.$user->id.'')); ?>">
          <i class="fas fa-clock"></i> Reset Device
      </a>
      </td>
      
      
      <?php /*
      <td>

        <a class="btn btn-primary" href="{{ route('users.viewusers', $user->id) }}">
          <i class="fas fa-eye"></i>
        </a>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure you want to delete this user?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">
            <i class="fas fa-trash-alt"></i>
          </button>
        </form>
      </td>

        */ ?>


    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>


        <div class="mt-3">
          <?php echo e($users->links()); ?>

        </div>

      </div>
    </div>
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<style>
.blinking {
  animation: blinkingText 1s infinite;
}

@keyframes blinkingText {
  0% { opacity: 1; }
  50% { opacity: 0; }
  100% { opacity: 1; }
}
</style>
    <!-- DataTables CSS (optional) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- DataTables JS (optional) -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(function () {
          $('#datatable').DataTable();
      });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/admin/users/index.blade.php ENDPATH**/ ?>