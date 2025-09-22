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


<style>

	.lazyload {
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.6s ease, transform 0.6s ease;
	}

	.lazyload.loaded {
		opacity: 1;
		transform: translateY(0);
	}

</style>






        <div class="th-hero-wrapper hero-1" id="hero">
            <div class="hero-slider-1 th-carousel number-dots" data-autoplay="true" data-autoplay-speed="3500" data-adaptive-height="true" data-fade="true" data-slide-show="1" data-md-slide-show="1" data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true">
                
			
			@foreach($home_banner as $val)
			<div class="th-hero-slide">
                   <img src="{{ asset('uploads/banner/') }}/{{ $val->image }}" class="bann-img" alt="" width="100%">
				    <img src="{{ asset('uploads/banner/') }}/{{ $val->image }}" class="bann-mobile-img" alt="" width="100%">
                    <div class="Banner-slide ba-1" >

				   <div class="container">
                        <div class="hero-style1">
                           
                            <h1 class="hero-title" > {{$val->title}} </h1>
					@if(trim($val->content) !== '')
    <p class="hero-text" >{!! $val->content !!}</p>
@endif

                        </div>
                    </div>
                        </div>
                </div>
				@endforeach
				
             
               
            </div>
			
			
			
        </div>
     
     <div class="Aboutt-ma-sec"  data-bg-src="{{asset('assets/img/pattern__logo.webp')}}">
	 <div class="container">
	 <div class="row align-items-center">
	 
	 <div class="col-lg-6">
	 <div class="abu-left">
	 	  	 <div class="title-area mb-15 ">
                            
                            <h2 class="sec-title  ">	{{$home_about->cms_title}}</h2>
                        </div>
						
				{!!$home_about->content!!}
						<a href="https://www.youtube.com/@healingpower" target="_blank" class="th-btn  ">Read More</a>
						
						
	 
	 </div>
	 
	 </div>
	 
	  <div class="col-lg-6">
	 <div class="abu-right">
	 
	 <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_about->image }}" alt="" width="100%">
	   
	  <div class="aatag"><span class="counter-number">10</span>+ years Experience</div>
	 </div>
	  </div>
	 </div>
	 
	 </div>
	 
	 </div>
	 
	 
	 </div>
	 
	@if(!empty($courses_all))
<div class="Coursemsec">
  <div class="container ">
    <div class="title-area mb-50 text-center">
      <h2 class="sec-title">Courses</h2>
      <p>Empower Your Future. Your Journey to Excellence Begins Here.</p>
    </div>
  </div>

  <style>

	.coo-1, .coo-2 {
  	flex: 1;              
  	padding: 1rem;
	}

  </style>

  @foreach($courses_all as $home_course)

  <div class="container-fluid ">
    <div class="row align-items-stretch">
      <div class="col-lg-6 d-flex coo-1">
        <div class="cou-left">
		@if(!empty($home_course->image))
          <img class="lazyload" data-src="{{ asset('uploads/course/') }}/{{ $home_course->image }}" alt="" width="100%">
		@else
		  <img class="lazyload" data-src="{{ asset('assets/img/sabu-joseph.jpg') }}" alt="" width="100%">
		@endif
        </div>
      </div>

      <div class="col-lg-6 d-flex coo-2">
        <div class="cou-right">
		  @if(!empty($home_course->expiring_soon_text))
          <div class="blink-me ending-soon">{{$home_course->expiring_soon_text}}</div>
		  @endif

          <h2>{{ $home_course->title }}</h2>
          <h3>{{ $home_course->duration_text }}</h3>
          {!! $home_course->description !!}
          <div class="tour-listing__card-inner-content">
            <div class="ttpricesec">
				@php
    preg_match('/\d+/', $home_course->duration, $matches);
    $days = $matches[0] ?? '';
@endphp

<p>{{ $days }} Days course Fees</p>
              <!-- <p>7 Days course Fees</p> -->
              <h4 class="tour-listing__card-price">{{ !empty($home_course->fees) ? $home_course->fees : 'Free' }}</h4>
            </div>
            <div class="tour-listing__card-review-box">
              <a href="{{ url('course-detail', $home_course->slug) }}">Buy Now</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endforeach


</div>
@endif

	     
	 
	      <div class="Feturesec" >
		  <div class="container">
		  
		    	 <div class="title-area mb-35 text-center">
                            
                            <h2 class="sec-title  ">	Why Choose Our Courses</h2>
                        </div>
		  	  <div class="row">
		  <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
		  
		  <div class="feturebox">
		   <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_why1->image }}">
		   <h3>{{$home_why1->cms_title}}</h3>
		 {!!$home_why1->content!!}
		  
		  </div>
		  
		  </div>
		  	  <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
		  
		  <div class="feturebox">
		   <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_why2->image }}">
		   <h3>{{$home_why2->cms_title}}</h3>
		   {!!$home_why2->content!!}
		  </div>
		  
		  </div>
		  
		  	  <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
		  
		  <div class="feturebox-img">
		  
		  <img class="lazyload" data-src="{{asset('assets/img/features/f3.jpg')}}">
		  </div>
		  
		  </div>
		  
		  	  <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
		  
		  <div class="feturebox">
		   <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_why3->image }}">
		   <h3>{{$home_why3->cms_title}}</h3>
		   {!!$home_why3->content!!}
		  </div>
		  
		  </div>
		  
		  	  <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
		  
		  <div class="feturebox">
		   <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_why4->image }}">
		   <h3>{{$home_why4->cms_title}}</h3>
		  {!!$home_why4->content!!}
		  </div>
		  
		  </div>
		  	  	  <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
		  
		  <div class="feturebox-img">
		  
		  <img class="lazyload" data-src="{{asset('assets/img/features/f5.jpg')}}">
		  </div>
		  
		  </div>
		  	  <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
		  
		  <div class="feturebox">
		   <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_why5->image }}">
		   <h3>{{$home_why5->cms_title}}
 </h3>
		    {!!$home_why5->content!!}
		  </div>
		  
		  </div>
		  	  <div class="col-lg-3 col-md-4 col-sm-6 d-flex">
		  
		  <div class="feturebox">
		   <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_why6->image }}">
		  <h3>{{$home_why6->cms_title}}</h3>
		  {!!$home_why6->content!!}
		  </div>
		  
		  </div>
		  	   
		  </div>
		  	  </div>
		  </div>
		  
		  
		  
		   <div class="abb-sec"  >
	 
	 <div class="container">
	 
	 	 
	<div class="title-area mb-30 text-center">
                            
                            <h2 class="sec-title">Oneness Homoeo & Acupuncture Clinic</h2>
							<h3>Natural Solutions for your good health</h3>		
                        </div>
	 <div class="row  align-items-center">
	 
	 <div class="col-lg-4">
	 
	 <div class="abb-left">
	  <div class="abb-left-ii">
	 <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_content->image }}" alt="" width="100%">
	  <div class="sstag"><span class="counter-number">15</span>+ years Experience</div>
</div>
	 <div class="MsgBox">
	
	 	 
                            <div class="Name"> Dr.Nanditha Sabu BHMS, DAsc</div>
                          
                        </div>
	 </div>
	 </div>
	 	 <div class="col-lg-5">
	 
	 <div class="abb-right">

				
	{!!$home_content->content!!}

<a href="#oneness-clinic"   class="th-btn">Read More</a>
	 </div>
	 </div>
	 
	 
	 <div class="col-lg-3">
	 <div class="about-22">
 	 <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_content->image2 }}" alt="" width="100%">
</div>

</div>
	 </div>
	 
	 
	 
	 </div>
	 
	 
	 </div>
	 
	 <div class="New-featuresec">
	 
	 <div class="container">
	 
	 <div class="row justify-content-between">
	 
	 <div class="col-lg-4 col-md-4 d-flex">
	 
	 <div class="new-ffsec">
	 
	 <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_content9->image }}" alt="">
	  <div class="new-ffsec-sub">
	 <h3> {{$home_content9->cms_title}}</h3>
	 
	{!!$home_content9->content!!}
	 </div>
	  </div>
	 </div>
	  <div class="col-lg-4 col-md-4 d-flex">
	 
	 <div class="new-ffsec">
	 
	 <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_content10->image }}" alt="">
	  <div class="new-ffsec-sub">
	 <h3> {{$home_content10->cms_title}}</h3>
	 
		{!!$home_content10->content!!}
	 </div>
	  </div>
	 </div>
	  <div class="col-lg-4 col-md-4 d-flex">
	 
	 <div class="new-ffsec">
	 
	 <img class="lazyload" data-src="{{ asset('uploads/pages/') }}/{{ $home_content11->image }}" alt="">
	  <div class="new-ffsec-sub">
	    <h3>{{ $home_content11->cms_title }}</h3>
	 	{!!$home_content11->content!!}
	 </div>
	  </div>
	 </div>
	 
	 
	 </div>
	 
	 </div>
	 
	 </div>
	 
	  <div class="Reviewsec">
	  <div class="container">
	  
	  <div class="title-area mb-0 text-center">
                            
                            <h2 class="sec-title">Our Clinic Testimonials</h2>
						 
                        </div>

			@php /*			
		 	<div class="tagembed-widget" style="width:100%;height:100%;overflow:auto;" data-widget-id="293017" website="1"></div><script src="https://widget.tagembed.com/embed.min.js" type="text/javascript"></script>
			*/ @endphp

			<style>
				.es-main-container a:last-of-type {
				display: none !important;
				}
			</style>

			<!-- Elfsight Google Reviews | Untitled Google Reviews -->
			<script src="https://elfsightcdn.com/platform.js" async></script>
			<div class="elfsight-app-33e0611f-7bef-474a-a72a-7c9af01d93d8" data-elfsight-app-lazy></div>
		 	
 </div>
	 </div>
	  


	     <div class="Vidoetestimonial-sec" id="oneness-clinic">
            
            <div class="container"  data-aos="zoom-in" data-aos-duration="800">
                <div class="title-area mb-30 text-center">
                   
                    <h2 class="sec-title"> Our Clinic  Video Testimonials</h2>
					
					 
                </div>
			  <div class="row">

			  @foreach($home_clinicvideo as $val)
			     @php
        // Extract video ID from URL
        $vid = '';
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $val->video, $match);
        $vid = !empty($match[1]) ? $match[1] : '';
    @endphp
      <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
        <div class=" text-center media-box fbox-bg">
								<div class="fbox-media">
                                 <div class="wrapper">
  <div class="youtube" data-embed="{{$vid}}">
    <div class="play-button"></div>
  </div>
</div>
                                 
                                 </div>
								<div class="fbox-content">
									<h3>{{$val->title}} </h3>
								</div>
							</div>
      </div>
	  @endforeach
      
    
     
 
      
      
        </div>
  </div>
</div>
	 	<div class="sechedulesec">
		<div class="container">
		<div class="row justify-content-center">
		<div class="col-xl-8 col-lg-12"  data-aos="zoom-in" data-aos-duration="800">
		 <div class="ccosec">
		<div class="title-area mb-0 text-center">
                 
                    <h2 class="sec-title"> Contact    us with  today! </h2>
				 
					<h3>Call Us: <a href="tel:{{$contact->phone}}">{{$contact->phone}}</a> | Email Us: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></h3>
                </div>
		 </div>
		</div>
		
		</div>
		
		</div>
		
		</div>
 

	 
	 
	
       
   
    
	
    <section class="testimonial-sec">
            <div class="shape-mockup" data-top="1%" data-right="0"><img src="{{asset('assets/img/shape/earth_1.png')}}" alt="shape" /></div>
            <div class="container"  data-aos="zoom-in" data-aos-duration="800">
                <div class="title-area mb-30 text-center">
                   
                    <h2 class="sec-title">What Our Student's Says</h2>
					
					<p>Success stories  From Those who transformed. ..</p>
                </div>
                <div class="row slider-shadow th-carousel" data-autoplay="true" data-autoplay-speed="1000" data-infinite="true" data-speed="1500" data-ani-delay="500" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2" >


				@foreach($home_testimonial as $val)
                    <div class="col-lg-6">
                        <div class="testi-box">
                            <div class="testi-box_img">
                                <img src="{{ asset('uploads/testimonial/') }}/{{ $val->image }}" alt="Avater" />
                                <div class="play-btn"><i class="fa-solid fa-quote-right"></i></div>
                            </div>
                            <div class="testi-box_content">
                               {!!$val->content!!}
                                 <h3 class="testi-box_name">{{$val->title}}</h3>
                                <p class="testi-box_desig">{{$val->designation}}</p>
								
								<div class="testi-grid_review"><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i><i class="fa-sharp fa-solid fa-star"></i></div>
                            </div>
                        </div>
                    </div>
					@endforeach




                    
                   
                  
                </div>
            </div>
        </section>
		          <div class="container">
	         <div class="Countersec"   >
  
                <div class="counter-card-wrap">
                    <div class="counter-card style2"  data-aos="zoom-in" data-aos-duration="800">
					<div class="co-icon"><img src="{{asset('assets/img/c1.png')}}" alt=""></div>
                        <h2 class="counter-card_number"><span class="counter-number">10,000</span>+</h2>
                        <span class="counter-card_text">Happy Customers</span>
                    </div>
                    <div class="counter-card style2"  data-aos="zoom-in" data-aos-duration="800">
					<div class="co-icon"><img src="{{asset('assets/img/c2.png')}}" alt=""></div>
                        <h2 class="counter-card_number"><span class="counter-number">10,000</span>+</h2>
                        <span class="counter-card_text">Happy Families</span>
                    </div>
                   
                    <div class="counter-card style2"  data-aos="zoom-in" data-aos-duration="800">
					<div class="co-icon"><img src="{{asset('assets/img/c3.png')}}" alt=""></div>
                        <h2 class="counter-card_number"><span class="counter-number">10,000</span>+</h2>
                        <span class="counter-card_text">Students</span>
                    </div>
					 <div class="counter-card style2"  data-aos="zoom-in" data-aos-duration="800">
					 <div class="co-icon"><img src="{{asset('assets/img/c4.png')}}" alt=""></div>
                        <h2 class="counter-card_number"><span class="counter-number">100</span>%</h2>
                        <span class="counter-card_text"> Satisfaction</span>
                    </div>
                </div>
            </div>
        </div>
		
		
			
    <div class="Vidoetestimonial-sec">
            
            <div class="container"  data-aos="zoom-in" data-aos-duration="800">
                <div class="title-area mb-30 text-center">
                   
                    <h2 class="sec-title">  Student's  Video Testimonials</h2>
					
					 
                </div>
			  <div class="row">


			@foreach($home_video as $val)  
			     @php
        // Extract video ID from URL
        $vid = '';
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/", $val->video, $match);
        $vid = !empty($match[1]) ? $match[1] : '';
    @endphp
      <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
        <div class=" text-center media-box fbox-bg">
								<div class="fbox-media">
                                 <div class="wrapper">
  <div class="youtube" data-embed="{{$vid}}">
    <div class="play-button"></div>
  </div>
</div>
                                 
                                 </div>
								<div class="fbox-content">
									<h3>{{$val->title}}</h3>
								</div>
							</div>
      </div>
	  @endforeach
     
    
   
     
 
      
      
        </div>
  </div>
</div>


<script>

	document.addEventListener("DOMContentLoaded", function() {
    const images = document.querySelectorAll("img.lazyload");
    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.getAttribute("data-src");
                img.onload = () => {
                    img.classList.add("loaded");
                };
                obs.unobserve(img);
            }
        });
    }, {
        threshold: 0.1
    });

    images.forEach(img => {
        observer.observe(img);
    });
});

</script>



       @endsection