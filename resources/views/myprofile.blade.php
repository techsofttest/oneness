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

   <h3>  My Profile</h3>
  </div>
</div>
</div>
  <section class="Myaccountsec">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-3 col-md-4">
      <div class="mainlinkall ">
      
        <div >
         <div class="proimageemp"> <img src="assets/img/user.jpg">  </div>
   @if(isset($course_booking) && $course_booking->course)
    <p>{{ $course_booking->course->name }}</p>
@endif
        </div>
       
         <ul class="tab">
    <li>
        <a class="tablinks" href="{{ url('/my-account') }}">
            <i class="fa fa-cog"></i> Dashboard
        </a>
    </li>
    <li>
        <a class="tablinks" href="{{ url('/course-videos') }}">
            <i class="fa fa-video"></i> Course Videos
        </a>
    </li>
    <li>
        <a class="tablinks active" href="{{ url('/myprofile') }}">
            <i class="fa fa-cog"></i> My Profile
        </a>
    </li>
    <li>
        <a class="tablinks" href="{{ url('/change-passwords') }}">
            <i class="fa fa-key" aria-hidden="true"></i> Change Password
        </a>
    </li>
   <li>
    <a class="tablinks" href="{{ url('/') }}" onclick="return confirmLogout();">
        <i class="fa fa-file" aria-hidden="true"></i> Logout
    </a>
</li>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</ul>

        </div>
          </div>
  
    
    <div class="col-lg-9 col-md-8">
        <div id="General" class="tabcontent profile">
          <div class="Address">
          <div class="col-lg-12">
          
          <div class="row">
          
           <div class="col-lg-12">
           <div class="Dasdd-board">
    <h5>{{$course_booking->name}}</h5>
		  	 
 
<div class="row">
                        <div class="col-lg-12">
                          <div class="row">
                            <div class="col-lg-6 col-md-12">
                              <div class="otherproDiv_odd">
                                <div class="row">
                                  <div class="col-lg-12"><span class="title">Phone No</span> </div>
                                  <div class="col-lg-12"><div class="profile-form-area">	<input type="text" class="form-control" name="" readonly value="{{$course_booking->phone}}" placeholder=""></div></div>
                                </div>
                              </div>
                            </div>
							   <div class="col-lg-6 col-md-12">
                              <div class="otherproDiv_odd">
                                <div class="row">
                                 <div class="col-lg-12"><span class="title">Email Id</span> </div>
                                 <div class="col-lg-12"><div class="profile-form-area">	<input type="text" class="form-control" name="" readonly value=" {{$course_booking->email}}" placeholder=""></div></div>
                                </div>
                              </div>
                            </div>
								   <div class="col-lg-12">
                              <div class="otherproDiv_odd">
                                <div class="row">
                                 <div class="col-lg-12"><span class="title">Message</span> </div>
                                 <div class="col-lg-12"><div class="profile-form-area"><textarea name="message" id="message" cols="30" rows="3" readonly class="form-control" placeholder="Message">{{$course_booking->message}}</textarea></div></div>
                                </div>
                              </div>
                            </div>
  <div class="col-lg-6 col-md-6">
    <div class="otherproDiv_odd">
      <div class="row">
        <div class="col-lg-12"><span class="title">Payment Slip</span></div>
        <div class="col-lg-4">
          <div class="profile-form-area">	
            <a class="popup-image" href="{{ asset('uploads/slip/' . $course_booking->slip) }}">
              <img src="{{ asset('uploads/slip/' . $course_booking->slip) }}" alt="Slip" width="100%">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

					 
					
                      </div>
                    </div>
                  </div>
 
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
     



<script>
    function confirmLogout(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
</script>

  
      @endsection