@extends('partials.apps')

 @section ('meta_title')
    <title>{{$page_seo->meta_title}}</title>

    @endsection

    @section ('meta_desc')

    <meta name="description" content="{{$page_seo->meta_desc}} ">
    
    @endsection

    @section ('meta_key')


<meta name="keywords" content="{{$page_seo->meta_key}} ">

@endsection

@section('content')



  <div class="inner-bannr-sec">
  
  
  <img src="{{asset('assets/img/banner/co-banner.jpg')}}" alt="" width="100%">
  </div>
     
 <div class="inner-pagesconatct-sec">
 <div class="container">
 
 
 
 
 
   <div class="row justify-content-center  align-items-center">
   
     <div class="col-lg-7">
	 <form action="#" method="POST" class="Contactpage-form contact-formnew">
		@csrf
		<div class="title-area    mb-20">
      <h2 class="sec-title  ">Send Us a Message</h2>
    </div>
          <div class="row">
            <div class="form-group col-lg-6 col-md-6 col-sm-6">
              <input type="text" class="form-control" name="name" placeholder="Enter Your Name" required="">
              <i class="fal fa-user"></i></div>
          
             <div class="form-group col-lg-6 col-md-6 col-sm-6">
              <input type="number" class="form-control" name="phone" placeholder="Phone No" required="">
              <i class="fal fa-phone"></i></div>
			   <div class="form-group col-lg-12 col-md-12 col-sm-12">
              <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
              <i class="fal fa-envelope"></i></div>
            <div class="form-group col-12">
              <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Message"></textarea>
              <i class="fal fa-comment"></i></div>
            <div class="form-btn col-12 mt-10 text-center">
              <button class="th-btn     ">Submit Now</button>
            </div>
          </div>
        
        </form>
	 </div>
    <div class="col-lg-5 ">
      <div class="row justify-content-center ">
                             <div class=" col-lg-12 col-md-12 col-sm-12  d-flex">
                                <div class="contact-item">
                                    <span class="contact-icon">
                                        <i class="far fa-map-marker-alt"></i>
                                    </span>
                                    <div class="contact-info">
                                        <h3>Locate Us</h3>
                                        {!!$contact->address!!}
                                    </div>
                                </div>
                            </div>
							       <div class=" col-lg-12 col-md-12 col-sm-12  d-flex">
                                <div class="contact-item">
                                    <span class="contact-icon">
                                        <i class="fas fa-phone"></i>
                                    </span>
                                    <div class="contact-info">
                                        <h3>Call Us</h3>
                                        <a href="tel:{{$contact->phone}}"> {{$contact->phone}}</a>
                                       
                                    </div>
                                </div>
                            </div>
                               <div class=" col-lg-12 col-md-12 col-sm-12  d-flex">
                                <div class="contact-item">
                                    <span class="contact-icon">
                                        <i class="fal fa-envelope"></i>
                                    </span>
                                    <div class="contact-info">
                                        <h3> Email Us</h3>
                                        <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                                      
                                    </div>
                                </div>
                            </div>
                          
                 

</div>
  </div>
  
  

  </div>
 </div>
 </div>
 
 
  <div class="mapsecs-inn">
                <div class="container">
 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.589201261856!2d76.40468597503406!3d10.21397648990262!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b0807651933454d%3A0x5bbd46d11e9bf20a!2sONENESS%20HOMEO%20%26%20ACUPUNCTURE%20CLINIC!5e0!3m2!1sen!2sin!4v1753445366869!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
 </div>
 
 </div>
    @endsection