@extends('adminlte::page')


@section('title', 'Dashboard')


@section('content_header')

<h1>Course Purchases</h1>

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

        <h3 class="card-title">View Course Purchases</h3>

      </div>

      <!-- /.card-header -->

      <div class="card-body">

        @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        @endif

        <div class="row">

        <div class="col-3">

          <select class="form-control">

          <option value="">Select</option>

          </select>

        </div>

        <div class="col-3">

          <select class="form-control">

          <option value="">Select</option>

          </select>

        </div>

        </div>

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
  @foreach($purchases as $purchase)
                <tr>
                    <td>{{ $purchase->id }}</td>
                    <td>{{ $purchase->user->name ?? 'N/A' }} <br> {{ $purchase->user->email ?? 'N/A' }}<br>{{ $purchase->phone }}</td>
                    
                    <td>{{ $purchase->course->title ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('admin.purchases.update', $purchase->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-control" onchange="this.form.submit()">
                                <option value="pending" hidden {{ $purchase->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="active" {{ $purchase->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="blocked" {{ $purchase->status == 'blocked' ? 'selected' : '' }}>Blocked</option>
                            </select>
                        </form>
                    </td>
                    <td>
                        @if($purchase->slip)
                            <a href="{{ asset('uploads/slip/' . $purchase->slip) }}" target="_blank">View</a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $purchase->message }}</td>
                    <td>{{ $purchase->created_at->format('d M Y') }}</td>

                    <td>{{ !empty($purchase->activation_date) ? date('d-m-y',strtotime($purchase->activation_date))  : '' }} <br>-<br> {{ !empty($purchase->ending_date) ? date('d-m-y',strtotime($purchase->ending_date))  : '' }}</td>
                   
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