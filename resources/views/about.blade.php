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
  
  
  <img src="{{asset('assets/img/banner/about-banner.jpg')}}" alt="" width="100%">
  </div>
     
 <div class="inner-pagesabout-sec">
 <div class="container">
	 <div class="row align-items-center">
	  <div class="col-lg-6">
	 <div class="agg-right">
	 
	 <img src="{{ asset('uploads/pages/') }}/{{ $home_about->image }}" alt="" width="100%">
	   
	  <div class="agtag"><span class="counter-number">10</span>+ years Experience</div>
	 </div>
	  </div>
	 <div class="col-lg-6">
	 <div class="adu-left">
	 	  	 <div class="title-area mb-15 ">
                            
                            <h2 class="sec-title  ">		{{$home_about->cms_title}}</h2>
                        </div>
						
					{!!$home_about->content!!}
						 
						
						
	 
	 </div>
	 
	 </div>
	 
	 
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
		
	
	<div class="inner-onenss-clinic"  data-bg-src="{{asset('assets/img/pattern__logo.webp')}}">
	
	
	<div class="container">
	
	<div class="row  align-items-center">
	  <div class="col-lg-6">
	 
	 <div class="obb-right">
<div class="title-area mb-20  ">
                            
                            <h2 class="sec-title">{{$home_content->cms_title}}</h2>
							<h3>Natural Solutions for your good health</h3>		
                        </div>
				
{!!$home_content->content!!}
	 </div>
	 </div>
	 <div class="col-lg-6">
	 
	 <div class="occ-left">
	 	 <div class="occMsgBox">
	
	 	 
                            <div class="Name"> Dr.Nanditha Sabu BHMS, DAsc</div>
                          
                        </div>
	  <div class="occ-left-ii">
	 <img src="{{ asset('uploads/pages/') }}/{{ $home_content->image }}" alt="" width="100%">
	  <div class="obbtag"><span class="counter-number">15</span>+ years Experience</div>
</div>

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
	 
	 <img src="{{ asset('uploads/pages/') }}/{{ $home_content9->image }}" alt="">
	  <div class="new-ffsec-sub">
	 <h3> {{$home_content9->cms_title}}</h3>
	 
	{!!$home_content9->content!!}
	 </div>
	  </div>
	 </div>
	  <div class="col-lg-4 col-md-4 d-flex">
	 
	 <div class="new-ffsec">
	 
	 <img src="{{ asset('uploads/pages/') }}/{{ $home_content10->image }}" alt="">
	  <div class="new-ffsec-sub">
	 <h3> {{$home_content10->cms_title}}</h3>
	 
		{!!$home_content10->content!!}
	 </div>
	  </div>
	 </div>
	  <div class="col-lg-4 col-md-4 d-flex">
	 
	 <div class="new-ffsec">
	 
	 <img src="{{ asset('uploads/pages/') }}/{{ $home_content11->image }}" alt="">
	  <div class="new-ffsec-sub">
	    <h3>{{ $home_content11->cms_title }}</h3>
	 	{!!$home_content11->content!!}
	 </div>
	  </div>
	 </div>
	 
	 
	 </div>
	 
	 </div>
	 
	 </div>
	 



 @endsection