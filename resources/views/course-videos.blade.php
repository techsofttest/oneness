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

   <h3> Course Videos</h3>
  </div>
</div>
</div>
  <section class="Myaccountsec">
  <div class="container">
    <div class="row">
      
      @include('profile-sidebar')

  
    
    <div class="col-lg-9 col-md-8">
     <div id="General" class="tabcontent profile">
          <div class="Address">
          
		  
		  
		  
		      <div class="woocommerce-cart-form">
      <table class="cart_table mb-10">
        <thead>
          <tr>
            <th class="cart-col-image">No</th>
            <th class="cart-col-productname">Title</th>
			 <th class="cart-col-price">Video</th>
			
           
         
           
            
          </tr>
        </thead>
        <tbody>


        @php $i=1; @endphp

        @if(!empty($courses))

        @foreach($courses as $course)

         <tr class="cart_item">

         <td></td>
			   <td ><b>{{ $course->title }}</b></td>

         <td >{{ date('d-M-Y',strtotime($course->access_start)) }} to {{ date('d-M-Y',strtotime($course->access_end)) }}</td>
         
        </tr>

        @foreach($course->videos as $video)

          <tr class="cart_item">
            <td>{{$i}}</td>
            <td><div class="pp-pdf">{{ $video->c_title ?? 'Untitled' }}</div></td>
			 
			  <td>
			
			<div class="download-video">
      <video width="100%" controls oncontextmenu="return false;" controlsList="nodownload">
      <source src="{{ route('course.video.stream', [$course->id, $video->video]) }}" type="video/mp4">
      <source src="mov_bbb.ogg" type="video/ogg">
      </video>
      @php /*
      <div class="d-video-hover">
      <a href="{{ route('course.video.stream', [$course->id, $video['url']]) }}" class="play-btn style3 popup-video" tabindex="-1"><i class="fas fa-play"></i></a></div>
      
      */ @endphp

      </div>


			</td>
            
          </tr>

          @php $i++ @endphp
          @endforeach
          @endforeach

          @else


          <tr class="cart_item">

          <td class="text-center" colspan="3" align="center">No Courses Currently Available</td>

          </tr>


          @endif

        
        </tbody>
      </table>
    </div>
          </div>
          
          
         
        </div>

        
      </div>
    </div>
  </div>
</section>

<script>
document.addEventListener('contextmenu', event => event.preventDefault());
</script>
     
  
  @endsection