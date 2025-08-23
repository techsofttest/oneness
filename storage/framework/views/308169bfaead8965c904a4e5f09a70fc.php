


<?php $__env->startSection('title', 'Dashboard'); ?>


<?php $__env->startSection('content_header'); ?>

<h1>Course Purchases</h1>

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

        <h3 class="card-title">View Course Purchases</h3>

      </div>

      <!-- /.card-header -->

      <div class="card-body">

        <table id="datatable" class="table table-bordered table-striped">

          <thead>

              <tr>
                <th>Sl No</th>
                <th>User</th>
                <th>Course</th>
                <th>Status</th>
                <th>Slip</th>
                <th>Message</th>
                <th>Purchased At</th>
                <th>Validity</th>
            </tr>

          </thead>





       <tbody>
  <?php $__currentLoopData = $purchases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($purchase->id); ?></td>
                    <td><?php echo e($purchase->user->name ?? 'N/A'); ?> <br> <?php echo e($purchase->user->email ?? 'N/A'); ?><br><?php echo e($purchase->phone); ?></td>
                    
                    <td><?php echo e($purchase->course->title ?? 'N/A'); ?></td>
                    <td>
                        <form action="<?php echo e(route('admin.purchases.update', $purchase->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="pending" hidden <?php echo e($purchase->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
                                <option value="active" <?php echo e($purchase->status == 'active' ? 'selected' : ''); ?>>Active</option>
                                <option value="blocked" <?php echo e($purchase->status == 'blocked' ? 'selected' : ''); ?>>Blocked</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        <?php if($purchase->slip): ?>
                            <a href="<?php echo e(asset('uploads/slip/' . $purchase->slip)); ?>" target="_blank">View</a>
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td><?php echo e($purchase->message); ?></td>
                    <td><?php echo e($purchase->created_at->format('d M Y')); ?></td>

                    <td><?php echo e(empty($purchase->activation_date) ? $purchase->activation_date  : ''); ?> - <?php echo e(empty($purchase->ending_date) ? $purchase->ending_date  : ''); ?></td>
                   
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





<?php $__env->startSection('css'); ?>
<style>
    .blinking {
        animation: blink 1s infinite;
        background-color: #fff3cd !important;
    }

    .expired {
        background-color: #f8d7da !important;
        color: #721c24 !important;
    }

    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0.3; }
        100% { opacity: 1; }
    }

    .blinking-alert {
    animation: blink 1s infinite;
}

@keyframes blink {
    0%   { opacity: 1; }
    50%  { opacity: 0; }
    100% { opacity: 1; }
}

    .blinking {
        animation: blink 1s linear infinite;
        color: red;
        font-weight: bold;
    }

    @keyframes blink {
        0% { opacity: 1; }
        50% { opacity: 0; }
        100% { opacity: 1; }
    }
</style>
<?php $__env->stopSection(); ?>



<?php $__env->stopSection(); ?>



<?php $__env->startSection('js'); ?>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const videos = document.querySelectorAll('.youtube-video');

        videos.forEach(video => {
            const videoId = video.dataset.youtubeId;

            if (videoId) {
                video.innerHTML = `
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/${videoId}"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen>
                    </iframe>
                `;
            } else {
                video.innerHTML = `<p class="text-danger">Video ID not available.</p>`;
            }
        });
    });
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\nutrition\resources\views/admin/course_purchases/index.blade.php ENDPATH**/ ?>