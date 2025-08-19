



<?php $__env->startSection('title', 'Dashboard'); ?>



<?php $__env->startSection('content_header'); ?>

<h1>Course</h1>

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

        <h3 class="card-title">View Course</h3>

      </div>

      <!-- /.card-header -->

      <div class="card-body">

        <table id="datatable" class="table table-bordered table-striped">

          <thead>

            <tr>

              <th>Sl No</th>

              <th>Title</th>

              <th>Duration</th>

              <th>Image</th>

              <th>Ending Soon Badge</th>

              <th>Actions</th>

            </tr>

          </thead>





       <tbody>
        
<?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $now = \Carbon\Carbon::now();
        $start = $course->access_start ? \Carbon\Carbon::parse($course->access_start) : null;
        $end = $course->access_end ? \Carbon\Carbon::parse($course->access_end) : null;
        $isExpired = $end && $now->greaterThanOrEqualTo($end);
    ?>

    <tr class="<?php echo e($isExpired ? 'expired' : ''); ?>">
        <td><?php echo e($loop->iteration); ?></td>
        <td><?php echo e($course->title); ?></td>

        
      <td>
    <?php if($course->duration): ?>
        <?php
            $durationDays = (int) filter_var($course->duration, FILTER_SANITIZE_NUMBER_INT);
            $createdAt = \Carbon\Carbon::parse($course->created_at);
            $expiresAt = $createdAt->copy()->addDays($durationDays);
            $now = \Carbon\Carbon::now();
        ?>

        <span><strong>Duration:</strong> <?php echo e($course->duration); ?> Days</span><br>
        <!-- <small class="text-muted">Created on: <?php echo e($createdAt->format('d M Y')); ?></small><br>
        <small class="text-muted">Expires on: <?php echo e($expiresAt->format('d M Y')); ?></small><br> -->

        <?php else: ?>
        <span class="text-muted">Duration Not Set</span>
        <?php endif; ?>
</td>


        
        <td>
            <img src="<?php echo e(asset('/uploads/course/' . $course->image)); ?>" width="100" alt="No Image">
        </td>


         <td>
        <?php if($course->expiring_soon == 0): ?>
          <a href="<?php echo e(url('admin/course/expire-status/'.$course->id.'')); ?>" onclick="return confirm('Enable expiring soon badge?')" class="btn">Hidden</a>
        <?php elseif($course->expiring_soon == 1): ?>
          <a href="<?php echo e(url('admin/course/expire-status/'.$course->id.'')); ?>" onclick="return confirm('Disable expiring soon badge?')" class="btn btn-danger">Shown</a>
        <?php endif; ?>
      </td>



        
        <td>
            <a class="btn btn-primary" href="<?php echo e(route('course.edit', $course->id)); ?>">
                <i class="fas fa-pencil-alt"></i>
            </a>

            <?php /*
            <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this record?');">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>
            */ ?>


        </td>
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
<?php echo $__env->make('adminlte::page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\xampp\htdocs\oneness_homeo\resources\views/admin/course/index.blade.php ENDPATH**/ ?>