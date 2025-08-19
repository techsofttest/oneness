@extends('adminlte::page')



@section('title', 'Dashboard')



@section('content_header')

<h1>Course</h1>

@stop



@section('content')
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
        
@foreach($courses as $course)
    @php
        $now = \Carbon\Carbon::now();
        $start = $course->access_start ? \Carbon\Carbon::parse($course->access_start) : null;
        $end = $course->access_end ? \Carbon\Carbon::parse($course->access_end) : null;
        $isExpired = $end && $now->greaterThanOrEqualTo($end);
    @endphp

    <tr class="{{ $isExpired ? 'expired' : '' }}">
        <td>{{ $loop->iteration }}</td>
        <td>{{ $course->title }}</td>

        {{-- Duration column --}}
      <td>
    @if($course->duration)
        @php
            $durationDays = (int) filter_var($course->duration, FILTER_SANITIZE_NUMBER_INT);
            $createdAt = \Carbon\Carbon::parse($course->created_at);
            $expiresAt = $createdAt->copy()->addDays($durationDays);
            $now = \Carbon\Carbon::now();
        @endphp

        <span><strong>Duration:</strong> {{ $course->duration }} Days</span><br>
        <!-- <small class="text-muted">Created on: {{ $createdAt->format('d M Y') }}</small><br>
        <small class="text-muted">Expires on: {{ $expiresAt->format('d M Y') }}</small><br> -->

        @else
        <span class="text-muted">Duration Not Set</span>
        @endif
</td>


        {{-- Image column --}}
        <td>
            <img src="{{ asset('/uploads/course/' . $course->image) }}" width="100" alt="No Image">
        </td>


         <td>
        @if ($course->expiring_soon == 0)
          <a href="{{url('admin/course/expire-status/'.$course->id.'')}}" onclick="return confirm('Enable expiring soon badge?')" class="btn btn-warning">Hidden</a>
        @elseif ($course->expiring_soon == 1)
          <a href="{{url('admin/course/expire-status/'.$course->id.'')}}" onclick="return confirm('Disable expiring soon badge?')" class="btn btn-danger">Shown</a>
        @endif
      </td>



        {{-- Actions column --}}
        <td>
            <a class="btn btn-primary" href="{{ route('course.edit', $course->id) }}">
                <i class="fas fa-pencil-alt"></i>
            </a>

           
            <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="d-inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this course?');">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </form>


        </td>
    </tr>
@endforeach
</tbody>







        </table>

      

      </div>

      <!-- /.card-body -->

    </div>

    <!-- /.card -->

  </div>

  <!-- /.col -->

</div>





@section('css')
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
@stop



@stop



@section('js')

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



@stop