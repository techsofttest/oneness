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
  
  
  <img src="{{asset('assets/img/banner/testi-banner.jpg')}}" alt="" width="100%">
  </div>
     
 <div class="inner-pagestesti-sec">
 <div class="container">
   <div class="title-area mb-30 text-center">
                   
                    <h2 class="sec-title"> Our Testimonials</h2>
					
					 
                </div>
		<div class="row ">
		<div class="col-lg-12 ">
	<ul class="Rbout-menu mtab">

                
            <li><a href="javascript:void();" onclick="openprofile(event, 'G1')" id="defaultOpen" class="tablink mtablinks active"> Student's   Testimonials</a></li>      
             <li><a href="javascript:void();" onclick="openprofile(event, 'G2')" class="tablink mtablinks ">Student's Video Testimonials </a></li>
			<li><a href="javascript:void();" onclick="openprofile(event, 'G3')" class="tablink mtablinks ">Clinic Testimonials</a></li>
                 <li><a href="javascript:void();" onclick="openprofile(event, 'G4')" class="tablink mtablinks ">Clinic Video Testimonials</a></li>
				  
				   
				  
             
       
          </ul>
	 </div>
	  </div>
	  
	  
	     <div class="row">

<div class="col-lg-12">

 <div class="tabmain produc-rightsec aucc-tab">
				
				
				 <!----------- Start  --------->
<div id="G1" class="mtabcontent  "   style="display: block;">
	  <div class="row justify-content-center">
	  



      @foreach($home_testimonial as $val)
	  
	  <div class="col-lg-4 col-md-6 col-sm-6 d-flex">
	
 
                        <div class="testimonials-card-three">
                            <div class="testimonials-card-three__image">
                                <img src="{{ asset('uploads/testimonial/') }}/{{ $val->image }}" alt=" ">
                            </div>
                            <div class="testimonials-card-three__inner">
                                <div class="testimonials-card-three__quote-icon">
                                    <span class="trevlo-one-icon-quote"></span>
                                </div> 
                             
                                <div class="testimonials-card-three__quote">     
 {!!$val->content!!}

</div>
                                  <div class="testimonials-card-three__identity">
                                    <h5 class="testimonials-card-three__identity__name">{{$val->title}}</h5>
                                    <p class="testimonials-card-three__identity__designation">{{$val->designation}}</p>
                                </div> 

							   <div class="trevlo-ratings">
                                    <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                </div>
                            </div> 
                        </div> 
                    </div>
@endforeach



						
					
				
				
	  
	  </div>
	   </div>
	   
	   	 <!----------- Start  --------->
<div id="G2" class="mtabcontent  "    >
 
			  <div class="row justify-content-center">

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
									<h3>{{$val->title}} </h3>
								</div>
							</div>
      </div>
@endforeach



    
     
 
      
      
        </div>
	   </div>
	   	 <!----------- Start  --------->
<div id="G3" class="mtabcontent  "    >
  
        @php /*
			 	<div class="tagembed-widget" style="width:100%;height:100%;overflow:auto;" data-widget-id="293017" website="1"></div><script src="https://widget.tagembed.com/embed.min.js" type="text/javascript"></script>
        */ @endphp

        <!-- Elfsight Google Reviews | Untitled Google Reviews -->
			<script src="https://elfsightcdn.com/platform.js" async></script>
			<div class="elfsight-app-33e0611f-7bef-474a-a72a-7c9af01d93d8" data-elfsight-app-lazy></div>
		 
			<br>
			<br> 
	   </div> 
	   	 <!----------- Start  --------->
<div id="G4" class="mtabcontent  "    >
	  
			  <div class="row justify-content-center">


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
									<h3>{{$val->title}}</h3>
								</div>
							</div>
      </div>
@endforeach


      
        </div>
	   </div>
	   
 </div>
  </div>
 </div>
	  
  </div>
 </div>


 <script>
	function openprofile(evt, profileName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("mtabcontent");
 
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("mtablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
	
  }
  document.getElementById(profileName).style.display = "block";
  evt.currentTarget.className += " active";
   AOS.refresh();
 
}
document.getElementById("defaultOpen").click();

	</script>


       @endsection