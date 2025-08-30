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
  
  
  <img src="{{asset('assets/img/banner/course-d-banner.jpg')}}" alt="" width="100%">
  </div>
     
 <div class="Coursemsec-book">
 
	   
	   
	   
	   
	   <div class="container">

 
	 
<div class="row ">

<div class="col-lg-4 col-md-6 ">
<div class="Booking-left">
 
<div class="booki-box2">
<h3>Your booking details</h3>

<h4>Course </h4>
<h5>{{$course_detail->title}}</h5>
 
 <img src="{{ asset('uploads/course/') }}/{{ $course_detail->image }}" alt=""  class="book-class-img">
<hr>
<h4>Duration</h4>
<h5>{{ $course_detail->duration_text }}</h5>
 
 
 
</div>


<div class="booki-box3">
<h3>Your Fees price</h3>
<div class="price-bbg ">

<div class="pps-1">Price</div>
<div class="pps-2">
    {{ !empty($course_detail->fees) ? $course_detail->fees : 'Free' }}
</div>

 </div>
</div>

 
</div>

</div>

<div class="col-lg-8 col-md-6">
<div class="Booking-right">



@if(auth()->check())

<div class="Booking-right-ss">

@if(!empty($course_detail->fees))
<h3>Scan This QR Code to make payment</h3>

<div class="qr-code">

<img src="{{asset('assets/img/QR.jpg')}}" alt="QR Code">

</div>

@endif

<h3>Enter your details</h3>
 <form method="post" id="submit-button" enctype="multipart/form-data">
  @csrf
<div class="row   Guest pay-form">

        <div class="col-lg-12 col-md-12 form-group col-sm-12">
		    <label>Phone No</label>
            <input type="number" class="form-control" placeholder=" " value="{{ !empty($latest_booking->phone) ? $latest_booking->phone : '' }}" name="phone" required="">
        </div>


        @if(!empty($course_detail->fees))
		    <div class="col-lg-12 col-md-12 form-group col-sm-12">
		   <label>Payment Slip</label>
            <input type="file" class="form-control" placeholder=" " name="slip" required="">
        </div>
        @endif
  
         
      <div class="col-lg-12 col-md-12 col-sm-12 form-group ">
      <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
		 	</div>
		        <div class="col-lg-12  ">
              <button class="th-btn " name="submit">Book Now</button>
            </div>
      </div>
		
		</form>
</div>


@else


<h3>Login or signup</h3>

<div id="login-sec">

    <form id="loginForm2" action="{{route('UserAuth')}}" method="POST">
    @csrf
<div class="row   Guest pay-form">

          <div class="col-lg-12 col-md-12 form-group col-sm-12">
		      <label>Email Address</label>
            <input type="email" class="form-control" placeholder=" " name="email" required="">
          </div>

          <div class="col-lg-12 col-md-12 form-group col-sm-12">
		      <label>Password</label>
            <input type="password" class="form-control" placeholder=" " name="password" required="">
          </div>

          <div class="col-lg-12 col-md-12 form-group col-sm-12">
          <a href="{{url('password/reset')}}" class="ms-2">Forgot password?</a>
          </div>

		      <div class="col-lg-12  ">
            <button class="th-btn " name="submit">Login</button>
            <a id="signup-sec-show" href="javascript:void(0);" class="ms-2" name="submit">Don't have an account?</a>
          </div>

</div>

</form>

</div>


<div id="signup-sec"style="display:none;">

<form id="registerForm" action="{{route('UserRegister')}}" method="POST">
    @csrf
<div class="row   Guest pay-form">


           <div class="col-lg-12 col-md-12 form-group col-sm-12">
		      <label>Name</label>
            <input type="text" class="form-control" placeholder=" " name="name" required="">
          </div>


          <div class="col-lg-12 col-md-12 form-group col-sm-12">
		      <label>Email Address</label>
            <input type="email" class="form-control" placeholder=" " name="email" required="">
          </div>

          <div class="col-lg-12 col-md-12 form-group col-sm-12">
		      <label>Password (Min 6 Characters)</label>
            <input type="password" class="form-control" placeholder=" " minlength="6" name="password" required="">
          </div>

		      <div class="col-lg-12  ">
            <button class="th-btn " name="submit">Create Account</button>
            <a id="login-sec-show" href="javascript:void(0);" class="ms-2" name="submit">Have an account?</a>
          </div>

</div>

</form>


</div>


@endif



</div>
</div>
</div>
</div>
 
 </div>
	   
 
			 
	 </div>


   <script>

    document.addEventListener('DOMContentLoaded', function() {

    $('#login-sec-show').click(function(){

      $('#login-sec').show();

      $('#signup-sec').hide();

    })


    $('#signup-sec-show').click(function(){

      $('#login-sec').hide();

      $('#signup-sec').show();

    })


    });

   </script>


  @endsection