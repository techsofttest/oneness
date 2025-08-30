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
  
  
  <img src="{{asset('assets/img/banner/course-banner.jpg')}}" alt="" width="100%">
  </div>
     
 <div class="Coursemsec">
	  <div class="container ">
	  	 	  	 <div class="title-area mb-50 text-center">
                            
                            <h2 class="sec-title  ">	Courses</h2>
							
							<p>Empower Your Future. Your Journey to Excellence Begins Here. </p>
                        </div>
	  </div>
	 <div class="container-fluid ">
	 
	


     @foreach($courses as $val)
	  <div class="row my-3">
	   <div class="col-lg-6 d-flex coo-1">
	 <div class="cou-left">
	 
	 @if(!empty($val->image))
          <img class="lazyload" src="{{ asset('uploads/course/') }}/{{ $val->image }}" alt="" width="100%">
		@else
		  <img class="lazyload" src="{{ asset('assets/img/sabu-joseph.jpg') }}" alt="" width="100%">
	@endif

	 </div>
	  </div>
	 	 <div class="col-lg-6 d-flex coo-2">
	 <div class="cou-right">
	 	   

                        @if(!empty($val->expiring_soon_text))
          				<div class="blink-me ending-soon">{{$val->expiring_soon_text}}</div>
		  				@endif

					
                        <h2  >	{{$val->title}}</h2>
                       
						
						<h3>{{$val->duration_text}}</h3>
						
					{!!$val->description!!}
	 
	 			<div class="tour-listing__card-inner-content">
							<div class="ttpricesec">
							
							<p>Course Fee</p>
						
    						<h4 class="tour-listing__card-price"> {{ !empty($val->fees) ? $val->fees : 'Free' }}</h4>

								</div>
                                    <div class="tour-listing__card-review-box">
									<a  href="{{ url('course-detail', $val->slug)}}">Buy Now</a>
                                       
                                       
                                    </div><!-- /.tour-listing__card-review-box -->
                              
                                  
                                
                                </div>
	 
	 </div>
	 
	 </div>
	 
	  </div>

     @endforeach
	
	 
	
	 
	 </div>
	 
	 
	 </div>



      @endsection