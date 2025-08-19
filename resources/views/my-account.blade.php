@extends('partials.apps')



@section('meta_title')

    <title>{{ $page_seo['meta_title'] }}</title>

@endsection



@section('meta_desc')

    <meta name="description" content="{{ $page_seo['meta_desc'] }}">

@endsection



@section('meta_key')

    <meta name="keywords" content="{{ $page_seo['meta_key'] }}">

@endsection







@section('content')
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
      
 
      @include('profile-sidebar')
  
    
    <!-- Main Content -->
<div class="col-lg-9 col-md-8">
  <div id="General" class="tabcontent profile">
    <div class="Address">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">

            <div class="Dasdd-board">
              
              <h5>Hello {{ auth()->user()->name ?? 'User Name' }}</h5>

                <table class="table table-bordered">

                  <tr>
                  <th>Purchased On</th>  
                  <th>Course</th>
                  <th>Start</th>
                  <th>End</th>
                  <th>Status</th>
                  </tr>


                  @if(!empty($courses))

                  @foreach($courses as $course)

                  <tr>

                  <td>{{ date('d-M-Y',strtotime($course->created_at))}}</td>

                  <td>{{$course->title}}</td>

                  <td>{{date('d-M-Y',strtotime($course->access_start))}}</td>

                  <td>{{date('d-M-Y',strtotime($course->access_end))}}</td>

                  <td>{{ $course->status == 'blocked' ? 'Pending' : 'Active' }}</td>

                  </tr>

                  @endforeach

                  @else

                  <tr>

                  <td colspan="3">No Courses Purchased</td>

                  </tr>

                  @endif

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
     
  
     @endsection